<?php declare(strict_types=1);

use MageOsNl\Website\ImageFactory;
use MageOsNl\Website\Router;

$page = (new Router)->getPage();

include_once __DIR__ . '/header/index.php';
echo $page->getHtml();
