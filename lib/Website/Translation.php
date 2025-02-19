<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class Translation
{
    const LANGUAGE_EN = 'en';
    const LANGUAGE_NL = 'nl';

    public static function getLanguage(): string
    {
        if (isset($_GET['language']) && $_GET['language'] === self::LANGUAGE_EN) {
            return self::LANGUAGE_EN;
        }

        return self::LANGUAGE_NL;
    }

    public function translate(string $text): string
    {
        $translations = self::loadTranslations();
        if (isset($translations[$text])) {
            return $translations[$text];
        }

        return $text;
    }

    private function loadTranslations(): array
    {
        $languageFile = Registry::getInstance()->getContentDirectory().'/data/'.self::getLanguage().'.csv';
        if (false === file_exists($languageFile)) {
            return [];
        }

        $translations = [];
        if (($handle = fopen($languageFile, "r")) !== false) {
            while (($item = fgetcsv($handle, 1000, ",", "\"", "\\")) !== false) {
                $translations[$item[0]] = $item[1];
            }
            fclose($handle);
        }

        return $translations;
    }
}
