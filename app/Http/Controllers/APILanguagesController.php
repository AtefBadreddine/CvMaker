<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APILanguagesController extends Controller
{
    public function getLanguages()
    {
      //$dirs = scandir(base_path('lang'));
      //$langs = array_filter($dirs, fn($dir) => !in_array($dir,array(".","..")));
      return [
        ['code' => 'ar', 'flag' => 'sa', 'name' => 'العربية'],        // Arabic
        ['code' => 'en', 'flag' => 'us', 'name' => 'English'],        // English
        ['code' => 'fr', 'flag' => 'fr', 'name' => 'Français'],       // French
        ['code' => 'de', 'flag' => 'de', 'name' => 'Deutsch'],        // German
        ['code' => 'pt', 'flag' => 'pt', 'name' => 'Português'],      // Portuguese
        ['code' => 'es', 'flag' => 'es', 'name' => 'Español'],        // Spanish
        ['code' => 'tr', 'flag' => 'tr', 'name' => 'Türkçe'],         // Turkish
        ['code' => 'it', 'flag' => 'it', 'name' => 'Italiano'],       // Italian
        ['code' => 'nl', 'flag' => 'nl', 'name' => 'Nederlands'],     // Dutch
        ['code' => 'pl', 'flag' => 'pl', 'name' => 'Polski'],         // Polish
        ['code' => 'ro', 'flag' => 'ro', 'name' => 'Română'],         // Romanian
        ['code' => 'el', 'flag' => 'gr', 'name' => 'Ελληνικά'],       // Greek
        ['code' => 'uk-UA', 'flag' => 'ua', 'name' => 'Українська'],  // Ukrainian
        ['code' => 'id', 'flag' => 'id', 'name' => 'Bahasa Indonesia'], // Indonesian
        ['code' => 'hu', 'flag' => 'hu', 'name' => 'Magyar'],         // Hungarian
        ['code' => 'no', 'flag' => 'no', 'name' => 'Norsk'],          // Norwegian
        ['code' => 'sv', 'flag' => 'se', 'name' => 'Svenska'],        // Swedish
        ['code' => 'da', 'flag' => 'dk', 'name' => 'Dansk'],          // Danish
        ['code' => 'fi', 'flag' => 'fi', 'name' => 'Suomi'],          // Finnish
        ['code' => 'cs', 'flag' => 'cz', 'name' => 'Čeština'],        // Czech
    ];

    }
  
  public function getLanguagesReact()
    {
      //$dirs = scandir(base_path('lang'));
      //$langs = array_filter($dirs, fn($dir) => !in_array($dir,array(".","..")));
      return [
    ['flag' => 'uae', 'name' => 'العربية', 'value' => 'ar_lang', 'flag_code' => 'sa'],
    ['flag' => 'usa', 'name' => 'English', 'value' => 'en_lang', 'flag_code' => 'us'],
    ['flag' => 'france', 'name' => 'Français', 'value' => 'fr_lang', 'flag_code' => 'fr'],
    ['flag' => 'germany', 'name' => 'Deutsch', 'value' => 'de_lang', 'flag_code' => 'de'],
    ['flag' => 'portugal', 'name' => 'Português', 'value' => 'pt_lang', 'flag_code' => 'pt'],
    ['flag' => 'spain', 'name' => 'Español', 'value' => 'es_lang', 'flag_code' => 'es'],
    ['flag' => 'turkey', 'name' => 'Türkçe', 'value' => 'tr_lang', 'flag_code' => 'tr'],
    ['flag' => 'italy', 'name' => 'Italiano', 'value' => 'it_lang', 'flag_code' => 'it'],
    ['flag' => 'netherlands', 'name' => 'Nederlands', 'value' => 'nl_lang', 'flag_code' => 'nl'],
    ['flag' => 'poland', 'name' => 'Polski', 'value' => 'pl_lang', 'flag_code' => 'pl'],
    ['flag' => 'romania', 'name' => 'Română', 'value' => 'ro_lang', 'flag_code' => 'ro'],
    ['flag' => 'greece', 'name' => 'Ελληνικά', 'value' => 'el_lang', 'flag_code' => 'gr'],
    ['flag' => 'ukraine', 'name' => 'Українська', 'value' => 'uk_lang', 'flag_code' => 'ua'],
    ['flag' => 'indonesia', 'name' => 'Bahasa Indonesia', 'value' => 'id_lang', 'flag_code' => 'id'],
    ['flag' => 'hungary', 'name' => 'Magyar', 'value' => 'hu_lang', 'flag_code' => 'hu'],
    ['flag' => 'norway', 'name' => 'Norsk', 'value' => 'no_lang', 'flag_code' => 'no'],
    ['flag' => 'sweden', 'name' => 'Svenska', 'value' => 'sv_lang', 'flag_code' => 'se'],
    ['flag' => 'denmark', 'name' => 'Dansk', 'value' => 'da_lang', 'flag_code' => 'dk'],
    ['flag' => 'finland', 'name' => 'Suomi', 'value' => 'fi_lang', 'flag_code' => 'fi'],
    ['flag' => 'czech', 'name' => 'Čeština', 'value' => 'cs_lang', 'flag_code' => 'cz'],
];


    }
  
  
    public function getTranslations($lang)
    {
      // Get all language files
        $languages = [];
        $langPath = base_path('lang/'.$lang);
        //$directories = glob($langPath . '/*', GLOB_ONLYDIR);

        //foreach ($directories as $directory) {
            $langFiles = glob($langPath . '/*.php');
            foreach ($langFiles as $file) {
                $fileName = basename($file, '.php');
                $language = basename($langPath);
                $languages[$fileName] = include $file;
            }
        //}

        return response()->json(['translations' => $languages]);
    }
  
  public function getTranslationsReact($lang)
    {
      // Get all language files
        $languages = [];
        $langPath = base_path('lang/'.$lang);
        //$directories = glob($langPath . '/*', GLOB_ONLYDIR);

        //foreach ($directories as $directory) {
            $langFiles = glob($langPath . '/*.php');
            foreach ($langFiles as $file) {
                $fileName = basename($file, '.php');
                $language = basename($langPath);
                $languages[$fileName] = include $file;
            }
        //}

        return response()->json($languages);
    }
}
