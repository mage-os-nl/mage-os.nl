<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;
use RuntimeException;

class DirectoryProvider
{
    /**
     * @return DirectoryItem[]
     */
    public function getDirectoryItems(): array
    {
        $sponsors = (new SponsorProvider())->getSponsorNames();

        $filename = Registry::getInstance()->getContentDirectory() . '/data/directory.csv';
        if (false === file_exists($filename)) {
            throw new RuntimeException('File "'.$filename.'" is not found');
        }

        $directoryItems = [];
        if (($handle = fopen($filename, "r")) !== FALSE) {
            while (($item = fgetcsv($handle, 1000, ",")) !== false) {
                if (empty($item[0]) || $item[0] === 'name') {
                    continue;
                }

                $isSponsor = in_array($item[0], $sponsors);
                $logoUrl = $item[3] ?? '';
                if (preg_match('/^([a-zA-Z0-9\-\_]+)\.([a-zA-Z0-9]+)$/', $logoUrl)) {
                    $logoUrl = '/images/directory/'.$logoUrl;
                }


                $directoryItems[] = new DirectoryItem(
                    $item[0],
                    $item[1],
                    $item[2],
                    $logoUrl,
                    $isSponsor
                );
            }
        }

        if (empty($directoryItems)) {
            throw new RuntimeException('No directory items loaded');
        }

        $form = new DirectoryForm();
        if ($form->hasSearch()) {
            $search = $form->getSearch();
            $directoryItems = array_filter($directoryItems, function(DirectoryItem $item) use($search) {
                return stristr($item->getName(), $search) || stristr($item->getRole(), $search);
            });
        }

        if ($form->getCurrentSort() === 'name_asc') {
            usort($directoryItems, function(DirectoryItem $a, DirectoryItem $b) {
                return strcmp($a->getName(), $b->getName());
            });
        }

        if ($form->getCurrentSort() === 'name_desc') {
            usort($directoryItems, function(DirectoryItem $a, DirectoryItem $b) {
                return strcmp($b->getName(), $a->getName());
            });
        }

        //usort($directoryItems, function(DirectoryItem $a, DirectoryItem $b) {
        //    return $b->isSponsor() ? 1 : -1;
        //});

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