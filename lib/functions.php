<?php

use MageOsNl\Website\Translation;

function __(string $text) {
    return (new Translation)->translate($text);
}