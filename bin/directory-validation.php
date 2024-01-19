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
    $rowHasError = false;
    if (false === $directoryValidator->hasAllowedRole($item)) {
        echo outputError("Item has invalid role: ".$item->getName()) . "\n";
        $exitCode = 1;
        $rowHasError = true;
    }

    if (empty($item->getUrl())) {
        echo outputError("Item has empty URL: ".$item->getName()) . "\n";
        $exitCode = 1;
        $rowHasError = true;
    }

    if ($item->getLogo() &&
        !str_starts_with($item->getLogo(), 'https://') &&
        !file_exists(__DIR__ . '/../pub/' . $item->getLogo())
    ) {
        echo outputError("Item has invalid logo: ".$item->getName()) . "\n";
        $exitCode = 1;
        $rowHasError = true;
    }

    if (str_starts_with($item->getLogo(), 'https://') && !doesUrlExists($item->getLogo())) {
        echo outputError("Item has invalid logo: ".$item->getName()) . "\n";
        $exitCode = 1;
        $rowHasError = true;
    }

    if (!$rowHasError) {
        echo 'Item validated: ' . $item->getName() . "\n";
    }
}

exit($exitCode);

function outputError(string $text): string {
    return "\033[31m" . $text . "\033[0m";
}

function doesUrlExists(string $url): bool {
    $curl = curl_init($url);

    // Set cURL options
    curl_setopt($curl, CURLOPT_NOBODY, true); // We only need the header, not the full content
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, false); // Don't follow redirects
    curl_setopt($curl, CURLOPT_TIMEOUT, 5); // Set timeout to 5 seconds

    // Execute and get the response code
    curl_exec($curl);
    $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

    curl_close($curl);

    return $statusCode == 200;
}