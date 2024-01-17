<?php

use MageOsNl\Website\Translation;
use Michelf\MarkdownExtra;

function __(string $text): string
{
    return (new Translation)->translate($text);
}

function markdown(string $text): string
{
    return '<div class="prose">'. MarkdownExtra::defaultTransform($text) . '</div>';
}

function markdownFile(string $fileId): string
{
    $language = Translation::getLanguage();
    $file = __ROOT__.'/content/markdown/'.$fileId.'-'.$language.'.md';
    if (!is_file($file)) {
        $file = __ROOT__.'/content/markdown/'.$fileId.'.md';
    }

    $text = file_get_contents($file);

    return markdown($text);
}