<?php

use App\Http\Controllers\SetLanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StepsController;
use App\Utils\CV;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use ZanySoft\LaravelPDF\PDF;
use App\Http\Middleware\Language;
use App\Http\Middleware\IsAdmin;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/mos', function(){
    dd(new CV(Session::get('cv')));
});
Route::get('/asem', function(){
    $cv = new CV(Session::get('cv'));
    return view('templates.simple-dev', compact('cv'));
});

Route::get('/flush',function () {
    session()->flush();
    return 'done';
});


Route::middleware(Language::class)->get("cv", [StepsController::class,'showPdfPreview']);

Route::middleware(App\Http\Middleware\CORSAPI::class)->get("react-cv-to-png", fn() => view('pages.pdf-to-png'));

Route::middleware(Language::class)->get('/test', [StepsController::class,'test']);
Route::middleware(Language::class)->get('/spatieTest', [StepsController::class,'spatieTest']);

Route::middleware(Language::class)->get('/', function () {
    if(session()->has("selectedLang"))
    {
        return redirect()->action([StepsController::class, 'chooseWay']);
    }
    session()->put("currentStep", 0);
    return view('pages.cvmake');
});

Route::controller(StepsController::class)->middleware(Language::class)->prefix("step")->name("step.")->group(function(){
    //Step: Select Template
    Route::get("template", "createTemplateStep")->name("template");
    Route::post("template", "setTemplate")->name("setTemplate");

    //Step: Choose ready made or blank cv
    Route::get("chooseWay", "chooseWay")->name("chooseWay");
    Route::get("readymade", "readyMade")->name("readymade");

    //Step One
    Route::get("one", "createStepOne")->name("one");
    Route::post("one", "processingStepOne")->name("processingOne");

    //Step Two
    Route::get("two", "createStepTwo")->name("two");
    Route::post("two", "processingStepTwo")->name("processingTwo");

    //Step Three
    Route::get("three", "createStepThree")->name("three");
    Route::post("three", "processingStepThree")->name("processingThree");

    //Step Four
    Route::get("four", "createStepFour")->name("four");
    Route::post("four", "processingStepFour")->name("processingFour");

    Route::get("finish", "finish")->name("finish");
    Route::post("finish", "processingLastStep")->name("processingLastStep");
});

Route::post('setLang', SetLanguageController::class)->name("setLang");
Route::post('autoSave', [StepsController::class, 'autoSave'])->name("autoSave");
Route::post('autoSave/photo', [StepsController::class, 'autoSavePhoto'])->name("autoSavePhoto");


Route::middleware(['auth', Language::class, IsAdmin::class])
    ->withoutMiddleware([\App\Http\Middleware\SetReadyMadeCV::class])
    ->prefix('dashboard')
    ->name('dashboard.')
    ->controller(\App\Http\Controllers\DashboardController::class)
    ->group(function(){
        Route::get('/', 'index')->name('home');
        Route::resource('cvs', \App\Http\Controllers\CVController::class);
    });

Route::controller(\App\Http\Controllers\ProfileController::class)->middleware(Language::class)->prefix("profile")->name("profile.")->group(function(){
    Route::get("/", "myCVs")->name("myCVs");
    Route::post("select", "selectCV")->name("selectCV");
});
