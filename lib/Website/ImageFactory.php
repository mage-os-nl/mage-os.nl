<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Website\Image\Source;
use RuntimeException;

class ImageFactory
{
    public static function create(
        string $filename,
        string $alt = ''
    ): Image
    {
        $filename = $_ENV['image_folder']. $filename;
        return new Image($filename, $alt);
    }
}
