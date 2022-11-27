<?php declare(strict_types=1);

require_once '../vendor/autoload.php';

function isLocalhost(): bool {
    if (empty($_SERVER['HTTP_HOST'])) {
        return true;
    }

    return str_starts_with($_SERVER['HTTP_HOST'], 'localhost');
}

function isRealhost(): bool {
    return $_SERVER['HTTP_HOST'] === 'mage-os.nl';
}

if (false === isRealhost() && false === isLocalhost()) {
    http_response_code(301);
    header('Location: https://mage-os.nl/');
    exit;
}

if ((!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] !== "on") && isRealhost()) {
    http_response_code(301);
    header('Location: https://mage-os.nl/');
    exit;
}

require_once '../templates/html.php';