<?php declare(strict_types=1);

use MageOsNl\Registry;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/lib/functions.php';

define('__ROOT__', __DIR__);
Registry::getInstance()->setContentDirectory(__ROOT__ . '/content');

error_reporting(E_ALL);