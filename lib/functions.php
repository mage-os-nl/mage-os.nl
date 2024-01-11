<?php

use MageOsNl\Website\Translation;
use Michelf\MarkdownExtra;

function __(string $text): string
{
    return (new Translation)->translate($text);
}

function markdown(string $text): string
{
    return MarkdownExtra::defaultTransform($text);
}

function markdownFile(string $file): string
{
    $language = Translation::getLanguage();
    $file = __ROOT__.'/content/markdown/'.$file.'-'.$language.'.md';
    if (!is_file($file)) {
        $file = __ROOT__.'/content/markdown/'.$file.'.md';
    }

    $text = file_get_contents($file);

    return MarkdownExtra::defaultTransform($text);
}