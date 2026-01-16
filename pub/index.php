<?php declare(strict_types=1);

use MageOsNl\Website\MembershipSubmit;

require_once '../app.php';

function getRealhost(): string
{
    if (str_ends_with($_SERVER['HTTP_HOST'], '.test')) {
        return $_SERVER['HTTP_HOST'];
    }

    return 'nl.mage-os.org';
}

function isLocalhost(): bool
{
    if (empty($_SERVER['HTTP_HOST'])) {
        return true;
    }

    if ($_SERVER['HTTP_HOST'] === 'nl.mage-os.orgdev') {
        return true;
    }

    if ($_SERVER['HTTP_HOST'] === 'nl.mage-os.test') {
        return true;
    }

    return str_starts_with($_SERVER['HTTP_HOST'], 'localhost');
}

function isRealhost(): bool
{
    return $_SERVER['HTTP_HOST'] === getRealhost();
}

// Redirect non-localhost and non-realhost to realhost
if (false === isRealhost() && false === isLocalhost()) {
    http_response_code(301);
    header('Location: https://' . getRealhost() . '/');
    exit;
}

// Redirect HTTP to HTTPS
$isHttps = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ||
           (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

if (!$isHttps && isRealhost()) {
    http_response_code(301);
    header('Location: https://' . getRealhost() . '/');
    exit;
}

$requestUri = $_SERVER['REQUEST_URI'];
if (preg_match('#^/(en|nl)(.*)$#', $requestUri, $match)) {
    $_GET['language'] = $match[1];
    $requestUri = $match[2];
    $_SERVER['REQUEST_URI'] = $requestUri;
}

if (strstr($requestUri, '/eventbrite') && !empty($_REQUEST['id'])) {
    $data = (new \MageOsNl\EventbriteExport())->getAttendeesByEventId($_REQUEST['id']);
    if (isset($_REQUEST['format']) && $_REQUEST['format'] === 'json') {
        header('Content-Type: application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
        exit;
    }

    require_once '../templates/eventbrite-export.php';
    exit;
}

if (strstr($_SERVER['REQUEST_URI'], '/lid-worden-post') && $_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    try {
        (new MembershipSubmit())->execute($_POST);
    } catch (UnexpectedValueException $unexpectedValueException) {
        header('Location: /lid-worden?msg=' . $unexpectedValueException->getMessage());
        exit;
    }
}

$_ENV['image_folder'] = dirname(__DIR__) . '/pub/images/';
require_once '../templates/html.php';
