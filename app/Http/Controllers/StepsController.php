<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStepFour;
use App\Http\Requests\StoreStepOne;
use App\Http\Requests\StoreStepThree;
use App\Http\Requests\StoreStepTwo;
use App\Models\CV;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Cache;
use Spatie\LaravelPdf\Facades\Pdf as SpatiePDF;

use App\Utils\CV as MyCv;
use App\Http\Middleware\Language;
use App\Http\Middleware\IsAdmin;

class StepsController extends Controller
{
    private function darkenColor($originalColor, $percentage = 20)
    {
        // Validate and sanitize the input color (e.g., remove '#' from hex codes)
        $originalColor = ltrim($originalColor, '#');

        // Convert hex to RGB
        list($r, $g, $b) = sscanf($originalColor, "%02x%02x%02x");

        // Calculate the darker color
        $darkerR = max(0, $r - ($percentage / 100) * $r);
        $darkerG = max(0, $g - ($percentage / 100) * $g);
        $darkerB = max(0, $b - ($percentage / 100) * $b);

        // Format the darker color as hex
        $darkerColor = sprintf("#%02x%02x%02x", $darkerR, $darkerG, $darkerB);

        return $darkerColor;
    }

    private function lightenColor($hexColor, $percent = 60)
    {
        // Remove the '#' from the hex color
        $hexColor = str_replace('#', '', $hexColor);

        // Convert hex to RGB
        $r = hexdec(substr($hexColor, 0, 2));
        $g = hexdec(substr($hexColor, 2, 2));
        $b = hexdec(substr($hexColor, 4, 2));

        // Calculate the brightness adjustment
        $adjustment = $percent / 100;

        // Adjust RGB values
        $r = round($r + (255 - $r) * $adjustment);
        $g = round($g + (255 - $g) * $adjustment);
        $b = round($b + (255 - $b) * $adjustment);

        // Ensure values are in the valid range (0-255)
        $r = min(255, max(0, $r));
        $g = min(255, max(0, $g));
        $b = min(255, max(0, $b));

        // Convert back to hex
        $newHexColor = sprintf("#%02x%02x%02x", $r, $g, $b);

        return $newHexColor;
    }



    public function autoSave(Request $request)
    {
        try {
            Log::info('autoSave triggered');


            $request->validate([
                'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10240', // 10240 KB = 10MB
            ]);


            $safe = $request->input();

            // If picture was removed
            if ($request->input('remove_picture') === '1' && ! $request->hasFile('picture')) {
                Log::info('User removed the picture');

                $cv = Session::get('cv');
                if ($cv && $cv->picture) {
                    $path = public_path("storage/cv/pictures/" . $cv->picture);
                    if (file_exists($path)) {
                        unlink($path);
                        Log::info("Deleted old picture", ['filename' => $cv->picture]);
                    }
                    $safe['picture'] = null;
                }
            }

            // Handle picture upload
            if ($request->hasFile('picture')) {
                Log::info('Picture file received');
                try {
                    $path = public_path("storage/cv/pictures/");
                    $name = uniqid("pic-") . "." . $request->picture->extension();
                    Image::make($request->file('picture'))->resize(150, 150)->save($path . $name);
                    Log::info("Image saved", ['filename' => $name]);
                    $safe['picture'] = $name;
                } catch (\Exception $e) {
                    Log::error("Image upload failed", ['error' => $e->getMessage()]);
                    return response()->json(['error' => 'Image upload failed'], 500);
                }
            }

            // Handle CV color inputs
            if ($color = $request->input('cv_color')) {
                $safe['darker_color'] = $this->darkenColor($color, 20);
                $safe['lighter_color'] = $this->lightenColor($color, 90);
                Log::info('Color processed', ['cv_color' => $color]);

                if ($request->wantsJson() || $request->is('api/*')) {
                    return response()->json($safe);
                }
            }

            // JSON or API logic
            if ($request->wantsJson() || $request->is('api/*')) {
                $cv = Cache::has('cv') ? (object) array_merge((array)Cache::get('cv'), $safe) : (object) $safe;
                $cv->cv_text_size = $cv->cv_text_size ?? 16;

                Cache::put("cv", $cv, 600);

                return response()->json($cv);
            }

            // Session logic
            $cv = Session::has('cv') ? (object) array_merge((array)Session::get('cv'), $safe) : (object) $safe;
            $cv->cv_text_size = $cv->cv_text_size ?? 16;

            $request->session()->put("currentStep", 5);

            if (!isset($cv->uuid) || $cv->uuid == '') {
                $cv->uuid = Str::uuid();
            }

            $ids = Cookie::has('ids') ? json_decode(Cookie::get('ids')) : [];
            if (!in_array($cv->uuid, $ids)) {
                $ids[] = $cv->uuid;
                Cookie::queue('ids', json_encode($ids));
            }

            $request->session()->put("cv", $cv);
            $name = session()->get('fileName');

            CV::updateOrCreate([
                'uuid' => $cv->uuid
            ], [
                'user_id' => auth()->id(),
                'title' => date('Y-m-d H:i a'),
                'cv_data' => json_encode($cv, JSON_UNESCAPED_UNICODE),
                'lang' => session()->get('selectedLang'),
                'path' => $name . '1.pdf'
            ]);

            Log::info("CV saved/updated in DB", ['uuid' => $cv->uuid]);

            return redirect('/spatieTest');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'errors' => $e->errors(),
            ], 422);
        }
        catch (\Exception $e) {
            Log::error("autoSave error", [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }


    public function chooseWay()
    {
      return redirect()->route('step.template');
        if (Session::has("selectedLang"))
            return view('pages.steps.chooseWay');
        else return redirect('/');
    }

    public function readyMade()
    {
        if (Session::has("selectedLang"))
            return view('pages.steps.readymade')->with('examples', CV::where('user_id', '=', 1)->where('lang', '=', Session::get('selectedLang'))->get());
        else return redirect('/');
    }

    public function createTemplateStep()
    {
        if (Session::has("selectedLang"))
            return view('pages.steps.template');
        else return redirect('/');
    }

    public function setTemplate(Request $request)
    {
        $template = "";
        $safe = $request->validate([
            "orbital" => ['nullable', 'in:on'],
            "pillar" => ['nullable', 'in:on'],
            "pillar-dev" => ['nullable', 'in:on'],
            "orbital-dev" => ['nullable', 'in:on'],
          	"simple" => ['nullable', 'in:on'],
          	"simple-dev" => ['nullable', 'in:on'],
        ]);

        if (isset($safe['orbital'])) $template = "orbital";
        elseif (isset($safe['pillar'])) $template = "pillar";
        elseif (isset($safe['pillar-dev'])) $template = "pillar-dev";
        elseif (isset($safe['orbital-dev'])) $template = "orbital-dev";
      	elseif (isset($safe['simple'])) $template = "simple";
      	elseif (isset($safe['simple-dev'])) $template = "simple-dev";
        else return back()->withErrors([
            "error" => "يرجى إختيار قالب أولا"
        ]);


      	if ($request->wantsJson())
        {
          Cache::put('selectedTemplate', $template,600);
          return Cache::get('selectedTemplate');
        }
      	$request->session()->put("selectedTemplate", $template);
        $request->session()->put("currentStep", 1);

        return redirect()->action([StepsController::class, "createStepOne"]);
    }

    //Step One
    public function createStepOne()
    {
        $currentStep = Session::get("currentStep");
        $cv = Session::get("cv");
        $cv = (object) array_merge((array)$cv, ["fresh" => true] );

        Session::put("cv", $cv);

        if($currentStep >= 1)
            return view('pages.steps.one', compact('cv'));
        else return back();
    }

    public function processingStepOne(StoreStepOne $request)
    {
        $safe = $request->safe()->except('picture');
        $safe['fresh'] = false;
        if($request->hasFile('picture'))
        {
            //$safe['picture'] = $request->file('picture')->storePublicly("cv/pictures");
            $path = public_path("storage/cv/pictures/");
            //$path = "/cv/pictures/";
            $name = uniqid("pic-") . "." . $request->picture->extension();
            Image::make($request->file('picture'))->resize(150, 150)->save($path . $name);
            $safe['picture'] = $name;
        }

        if(Session::has('cv'))
        {
            $cv = Session::get('cv');
            $cv = (object) array_merge((array)$cv, $safe);

            $request->session()->put("cv", $cv);
        }
        else
        {

            $cv = (object) $safe;

            $request->session()->put("cv", $cv);
        }



        $request->session()->put("currentStep", 2);

        return redirect()->action([StepsController::class, "createStepTwo"]);
    }

    //Step Two
    public function createStepTwo()
    {
        $currentStep = Session::get("currentStep");
        if ($currentStep >= 2)
        {
            $cv = Session::get('cv');
            return view('pages.steps.two', compact('cv'));
        }
        else return back();
    }

    public function processingStepTwo(StoreStepTwo $request)
    {
        $safe = $request->safe()->all();
        $cv = Session::get('cv');

        if($cv)
        {
            if(isset($cv->educations)) unset($cv->educations);
            $cv = (object) array_merge((array)$cv, $safe);

            $request->session()->put("cv", $cv);

            $request->session()->put("currentStep", 3);

            return redirect()->action([StepsController::class, "createStepThree"]);
        }
        else
        {
            return redirect()->route('setLang');
        }
    }

    //Step Three
    public function createStepThree()
    {
        $currentStep = Session::get("currentStep");
        if ($currentStep >= 3)
        {
            $cv = Session::get('cv');
            return view('pages.steps.three', compact('cv'));
        }
        else return back();
    }

    public function processingStepThree(StoreStepThree $request)
    {
        $safe = $request->safe()->all();

        $cv = Session::get('cv');

        if ($cv) {
            if (isset($cv->jobs)) unset($cv->jobs);
            $cv = (object) array_merge((array)$cv, $safe);

            $request->session()->put("cv", $cv);

            $request->session()->put("currentStep", 4);
            return redirect()->action([StepsController::class, "createStepFour"]);
        } else {
            return redirect()->route('setLang');
        }
    }

    //Step Four
    public function createStepFour()
    {
        $currentStep = Session::get("currentStep");
        if ($currentStep >= 4)
        {
            $cv = Session::get('cv');
            return view('pages.steps.four', compact('cv'));
        }
        else return back();
    }

    public function processingStepFour(StoreStepFour $request)
    {
        $safe = $request->safe()->all();
        $cv = Session::get('cv');

        if ($cv) {
            unset($cv->language, $cv->level, $cv->languages, $cv->skill, $cv->skills, $cv->interest, $cv->interests, $cv->courses);
            $cv = (object) array_merge((array)$cv, $safe);

            $request->session()->put("cv", $cv);

            $request->session()->put("currentStep", 5);

            return redirect('spatieTest');
        } else {
            return redirect()->route('setLang');
        }
    }

    public function finish()
    {
        if (Session::has('cv'))
        {
            $cv = Session::get('cv');
            return view('pages.preview', compact('cv'));
        }
        else return back();
    }

    public function processingLastStep()
    {

    }

    public function showPdfPreview(Request $request)
    {
        $sessionFile = Session::get('fileName');
        $queryPdf = $request->query('pdf');

        $path = $queryPdf ?? asset('storage') . '/cvs/' . $sessionFile . '1.pdf';

        Log::info('Rendering PDF preview', [
            'query_pdf' => $queryPdf,
            'session_file' => $sessionFile,
            'final_path' => $path,
        ]);

        return view('pages.pdf-to-png', compact('path'));
    }

    public function test()
    {
        if(!Session::has('cv')) return redirect("/");
        $cv = new MyCv(Session::get('cv'));
        Session::put("currentStep", 5);
        $lang = Session::get('selectedLang');
        $pdf = new PDF(['mode' => 'utf-8', 'format' => 'A4-P']);
        $pdf->SetDirectionality($lang == 'ar' ? 'rtl' : 'ltr');
        if($lang == 'ar')
        {
            $font_data = array(
                'amiri' => [
                    'R' => 'Amiri-Regular.ttf',      // regular font
                    // 'B' => 'ExampleFont-Bold.ttf',         // optional: bold font
                    // 'I' => 'ExampleFont-Italic.ttf',       // optional: italic font
                    // 'BI' => 'ExampleFont-Bold-Italic.ttf', // optional: bold-italic font
                ]
                // ...add as many as you want.
            );
        }
        else
        {
            $font_data = array(
                'Roboto' => [
                    'R' => 'Roboto-Regular.ttf',      // regular font
                    // 'B' => 'ExampleFont-Bold.ttf',         // optional: bold font
                    // 'I' => 'ExampleFont-Italic.ttf',       // optional: italic font
                    // 'BI' => 'ExampleFont-Bold-Italic.ttf', // optional: bold-italic font
                ]
                // ...add as many as you want.
            );
        }


        //$pdf->addCustomFont($font_data, true);
        if(Session::get('selectedTemplate') == "simple")
            $pdf->AddPageByArray([
                'margin-left' => 5,
                'margin-right' => 5,
                'margin-top' => 5,
                'margin-bottom' => 5,
            ]);
        else
            $pdf->AddPageByArray([
                'margin-left' => 0,
                'margin-right' => 0,
                'margin-top' => 0,
                'margin-bottom' => 0,
            ]);
        $pdf->shrink_tables_to_fit = 1.4;
        $pdf->autoScriptToLang = true;
        $pdf->autoLangToFont = true;
        $pdf->useAdobeCJK = true;
        Log::info(Session::get('selectedTemplate'));
        $pdf->loadView('templates.' . Session::get('selectedTemplate'), compact('cv'));
        $pdf->debug = true;
        $pdf->showImageErrors = true;

        $name = session()->get('fileName');
        Storage::delete(public_path('storage/cvs/' . $name . '1.pdf'));

        $pdf->output(public_path('storage/cvs/' . $name . '1.pdf'), "F");
        if(request()->ajax())
        {
            //return $pdf->stream('document.pdf')->header('Content-Type', 'application/pdf');
            return TRUE;
        }
        return redirect()->route('step.finish');
    }

    public function spatieTest()
    {

        if(!Session::has('cv')) return redirect("/");
        $cv = new MyCv(Session::get('cv'));
        Session::put("currentStep", 5);
        $lang = Session::get('selectedLang');
        $name = session()->get('fileName');



        $pdf = SpatiePDF::view('templates.' . Session::get('selectedTemplate'), compact('cv'))
            ->format('A4')
            ->margins(0, 0, 0, 0) // top, right, bottom, left
            ->save(public_path('storage/cvs/' . $name . '1.pdf'));

        if(request()->ajax())
        {
            //return $pdf->stream('document.pdf')->header('Content-Type', 'application/pdf');
            return TRUE;
        }
        return redirect()->route('step.finish');
    }
}
