<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;
use RuntimeException;

class SponsorProvider
{
    /**
     * @return string[]
     */
    public function getSponsorNames(): array
    {
        $filename = Registry::getInstance()->getContentDirectory() . '/data/sponsors.csv';
        if (false === file_exists($filename)) {
            throw new RuntimeException('File "'.$filename.'" is not found');
        }

        $sponsorNames = [];
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($item = fgetcsv($handle, 1000, ",", "\"", "\\")) !== false) {
                if (empty($item[0]) || $item[0] === 'name') {
                    continue;
                }

                $sponsorNames[] =  $item[0];
            }
        }

        if (empty($sponsorNames)) {
            throw new RuntimeException('No sponsor items loaded');
        }

        return $sponsorNames;
    }
}
