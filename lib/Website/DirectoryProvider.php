<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class DirectoryProvider
{
    /**
     * @return DirectoryItem[]
     */
    public function getDirectoryItems(): array
    {
        $filename = Registry::getInstance()->getContentDirectory() . '/data/directory.csv';
        if (!file_exists($filename)) {
            return [];
        }

        $directoryItems = [];
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($item = fgetcsv($handle, 1000, ",")) !== false) {
                if (empty($item[0]) || $item[0] === 'name') {
                    continue;
                }

                $directoryItems[] = new DirectoryItem(
                    $item[0],
                    $item[1],
                    $item[2],
                    $item[3],
                );
            }
        }

        usort($directoryItems, function(DirectoryItem $a, DirectoryItem $b) {
            return strcmp($a->getName(), $b->getName());
        });

        return $directoryItems;
    }

    /**
     * @param string $filename
     * @return int
     */
    private function getTimestampFromFilename(string $filename): int
    {
        if (preg_match('/([0-9]{4})-([0-9]{2})-([0-9]{2})/', $filename, $match)) {
            return strtotime($match[0]);
        }

        return 0;
    }

    /**
     * @param string $filename
     * @return string
     */
    private function getContentFromFilename(string $filename): string
    {
        $content = file_get_contents($filename);
        $content = preg_replace('/# (.*)/', '', $content);
        $content = str_replace('#### ', '##### ', $content);
        $content = str_replace('### ', '#### ', $content);
        $content = str_replace('## ', '### ', $content);
        $content = str_replace('# ', '## ', $content);
        return trim($content);
    }

    private function getTitleFromFilename(string $filename): string
    {
        $content = file_get_contents($filename);
        if (preg_match('/^# (.*)/', $content, $match)) {
            return trim($match[1]);
        }

        return 'No title found';
    }
}