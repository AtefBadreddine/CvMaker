<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cache;
class SetLanguageController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $lang = "";

		$input = $request->except(['_token']);
      	$keys = array_keys($input);
      	$lang = str_replace("_lang","",$keys[0]);
        //else return back()->withErrors([
        //    "error" => "يرجى إختيار لغة أولا"
        //]);



      	if ($request->wantsJson())
        {
          Cache::put('selectedLang', $lang, 600);
          return Cache::get('selectedLang');
        }
      $request->session()->put("selectedLang", $lang);
       // if(!Session::has('currentStep'))
        $request->session()->put("currentStep", 0);

        return redirect()->action([StepsController::class, "chooseWay"]);
    }
}
