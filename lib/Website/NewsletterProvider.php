<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class NewsletterProvider
{
    /**
     * @return Newsletter[]
     */
    public function getNewsletters(): array
    {
        $filename = Registry::getInstance()->getContentDirectory() . '/data/newsletters.json';
        if (!file_exists($filename)) {
            return [];
        }

        $items = json_decode(file_get_contents($filename), true);
        $events = [];
        foreach ($items as $item) {
            $events[] = new Newsletter($item);
        }

        return $events;
    }
}