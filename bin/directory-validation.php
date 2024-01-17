<?php
declare(strict_types=1);

use MageOsNl\Website\DirectoryProvider;
use MageOsNl\Website\DirectoryValidator;

require_once __DIR__ . '/../app.php';

$directoryProvider = new DirectoryProvider();
$directoryValidator = new DirectoryValidator();

$items = $directoryProvider->getDirectoryItems();
if (count($items) < 10) {
    echo "Validation failed, there are less than 10 items: ".count($items);
    exit(1);
}

$exitCode = 0;
foreach ($items as $item) {
    if (false === $directoryValidator->hasAllowedRole($item)) {
        echo "Item has invalid role: ".$item->getName()."\n";
        $exitCode = 1;
    }

    if (empty($item->getUrl())) {
        echo "Item has empty URL: ".$item->getName()."\n";
        $exitCode = 1;
    }

    // @todo: If a local image, make sure it exists
    // @todo: If a remote image, make sure it does not generate a 404 error
}

// @todo: Implement exit(1)

exit($exitCode);
