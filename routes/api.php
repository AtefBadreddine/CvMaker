<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APILanguagesController;
use App\Http\Controllers\StepsController;
use App\Http\Controllers\SetLanguageController;
use App\Utils\CV;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use ZanySoft\LaravelPDF\PDF;
use App\Http\Middleware\Language;
use App\Models\CV as CVModel;
use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\File;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get("test" , function(){
	return Cache::get('cv');
});

Route::get("test-token" , function(){
    return Auth::guard('sanctum')->check() ? 'ok' : 'no';
});

Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
Route::post('register', [\App\Http\Controllers\API\AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('my-cvs', function(){
        return response()->json(\App\Models\CV::where('user_id', '=', Auth::id())->get());
    });

    Route::post('saveCV', function (Request $request){

    });


});

Route::get('languages', [APILanguagesController::class, 'getLanguages']);
Route::get('languages/{lang}', [APILanguagesController::class, 'getTranslations']);

Route::get('react-languages', [APILanguagesController::class, 'getLanguagesReact']);
Route::get('react-languages/{lang}', [APILanguagesController::class, 'getTranslationsReact']);

Route::get('templates', function(){
	return [
      [
    	'name' => 'orbital',
      	'img' => 'https://cvmaker.getyourcv.net/assets/images/orbital.png'
      ],
      [
    	'name' => 'orbital-dev',
      	'img' => 'https://cvmaker.getyourcv.net/assets/images/orbital-dev.png'
      ],
      [
    	'name' => 'pillar',
      	'img' => 'https://cvmaker.getyourcv.net/assets/images/pillar.png'
      ],
      [
    	'name' => 'pillar-dev',
      	'img' => 'https://cvmaker.getyourcv.net/assets/images/pillar-dev.png'
      ],
      [
    	'name' => 'simple',
      	'img' => 'https://cvmaker.getyourcv.net/assets/images/simple.jpg'
      ],
      [
    	'name' => 'simple-dev',
      	'img' => 'https://cvmaker.getyourcv.net/assets/images/simple-dev.jpg'
      ],
    ];
});

 function darkenColor($originalColor, $percentage = 20)
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

function lightenColor($hexColor, $percent = 60)
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

Route::middleware(Language::class)->post('/preview', function () {
    $cv = new CV(request()->input('cv'));
  	if(!isset($cv->cv_text_size)) $cv->cv_text_size = 16;
  	if(isset($cv->cv_color))
    {
      $cv->darker_color = darkenColor($cv->cv_color, 20);
      $cv->lighter_color = lightenColor($cv->cv_color, 20);
    }
    $lang = $cv->selectedLang;
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
  	if(Cache::get('selectedTemplate') == "simple")
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
    $pdf->loadView('templates.' . Cache::get('selectedTemplate'), compact('cv'));
    $pdf->debug = true;
    $pdf->showImageErrors = true;
  	$name = ($cv->name ?? time()) . "_cv";
    Storage::delete(public_path('storage/cvs/' . $name . '.pdf'));
    CVModel::updateOrCreate([
        'uuid' => $cv->uuid
    ],
        [
            'user_id' => auth('sanctum')->id(),
            'title' => date('Y-m-d H:i a'),
            'cv_data' => json_encode($cv, JSON_UNESCAPED_UNICODE),
            'lang' => $lang
        ]);

    $pdf->output(public_path('storage/cvs/' . $name . '.pdf'), "F");
    return asset('storage/cvs/' . $name . '.pdf');
});
Route::post('setLang', SetLanguageController::class)->name("api.setLang");
Route::post('autoSave', [StepsController::class, 'autoSave'])->name("api.autoSave");
Route::post("setTemplate", [StepsController::class,"setTemplate"])->name("api.setTemplate");





















//react js api
Route::post('/upload', function (Request $request) {
    $base64File = $request->input('file');

    // decode the base64 file
    $fileData = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $base64File));

    // save it to temporary dir first.
    $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();
    file_put_contents($tmpFilePath, $fileData);

    // this just to help us get file info.
    $tmpFile = new File($tmpFilePath);

    $file = new UploadedFile(
        $tmpFile->getPathname(),
        $tmpFile->getFilename(),
        $tmpFile->getMimeType(),
        0,
        false // Mark it as test, since the file isn't from real HTTP POST.
    );

    $fileResult = $file->store('cv/pictures');
  return str_replace('cv/pictures/','',$fileResult);
});

//middleware(App\Http\Middleware\CORSAPI::class)
Route::middleware(Language::class)->post('/react-preview', function () {
    $cv = new CV(request()->input('cv'));
  	if(!isset($cv->cv_text_size)) $cv->cv_text_size = 16;
  	if(isset($cv->cv_color))
    {
      $cv->darker_color = darkenColor($cv->cv_color, 20);
      $cv->lighter_color = lightenColor($cv->cv_color, 20);
    }
    $lang = $cv->selectedLang;
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
  	if($cv->template == "simple")
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
    $pdf->loadView('templates.' . $cv->template, compact('cv'));
    $pdf->debug = true;
    $pdf->showImageErrors = true;
  	$name = ($cv->name . "_" . time() ?? time()) . "_cv";
    Storage::delete(public_path('storage/cvs/' . $name . '.pdf'));
    $pdf->output(public_path('storage/cvs/' . $name . '.pdf'), "F");
    return asset('storage/cvs/' . $name . '.pdf');
});
