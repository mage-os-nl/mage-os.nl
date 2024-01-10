<?php
declare(strict_types=1);

use MageOsNl\Website\DirectoryProvider;

require_once __DIR__ .'/../vendor/autoload.php';
require_once __DIR__.'/../lib/functions.php';

$items = (new DirectoryProvider())->getDirectoryItems();
foreach ($items as $item) {
    // @todo: Check if role is set something common
    if ($item->getUrl()) {
        // @todo: If a local image, make sure it exists
        // @todo: If a remote image, make sure it does not generate a 404 error
    }
}

// @todo: Implement exit(1)

exit(0);
