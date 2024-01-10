<?php
declare(strict_types=1);

use MageOsNl\Website\DirectoryProvider;

require_once '../vendor/autoload.php';
require_once '../lib/functions.php';

$items = (new DirectoryProvider())->getDirectoryItems();
foreach ($items as $item) {
    if ($item->getUrl()) {

    }
}
