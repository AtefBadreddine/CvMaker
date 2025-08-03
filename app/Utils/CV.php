<?php

namespace App\Utils;

use stdClass;

class CV extends stdClass
{
    public const LANGUAGES = [
        [
            "code" => "ar",
            "name" => "العربية",
            "flag" => "sa"
        ],
        [
            "code" => "en",
            "name" => "English",
            "flag" => "us"
        ],
        [
            "code" => "fr",
            "name" => "Français",
            "flag" => "fr"
        ],
        [
            "code" => "de",
            "name" => "Deutsch",
            "flag" => "de"
        ],
        [
            "code" => "pt",
            "name" => "Português",
            "flag" => "pt"
        ],
        [
            "code" => "es",
            "name" => "Español",
            "flag" => "es"
        ],
        [
            "code" => "tr",
            "name" => "Türkçe",
            "flag" => "tr"
        ],
        [
            "code" => "it",
            "name" => "italiano",
            "flag" => "it"
        ],
        [
            "code" => "nl",
            "name" => "Nederlands",
            "flag" => "nl"
        ],
        [
            "code" => "pl",
            "name" => "Polski",
            "flag" => "pl"
        ],
        [
            "code" => "ro",
            "name" => "Română",
            "flag" => "ro"
        ],
        [
            "code" => "el",
            "name" => "Ελληνικά",
            "flag" => "gr"
        ],
        [
            "code" => "uk-UA",
            "name" => "українська мова",
            "flag" => "ua"
        ],
        [
            "code" => "id",
            "name" => "Bahasa Indonesia",
            "flag" => "id"
        ],
        [
            "code" => "hu",
            "name" => "Magyar",
            "flag" => "hu"
        ],
        [
            "code" => "no",
            "name" => "Norsk",
            "flag" => "no"
        ],
        [
            "code" => "sv",
            "name" => "Svenska",
            "flag" => "se"
        ],
        [
            "code" => "da",
            "name" => "Dansk",
            "flag" => "dk"
        ],
        [
            "code" => "fi",
            "name" => "Suomi",
            "flag" => "fi"
        ],
        [
            "code" => "cs",
            "name" => "Čeština",
            "flag" => "cz"
        ],
    ];
    public function __construct($object)
    {
        foreach ($object as $name => $value) {
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        return property_exists($this, $name) ? $this->$name : null;
    }
}
