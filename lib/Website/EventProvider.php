<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class EventProvider
{
    /**
     * @return Event[]
     */
    public function getEvents(): array
    {
        $filename = Registry::getInstance()->getContentDirectory() . '/data/events.json';
        if (!file_exists($filename)) {
            return [];
        }

        $items = json_decode(file_get_contents($filename), true);
        $events = [];
        foreach ($items as $item) {
            $events[] = new Event($item);
        }

        return $events;
    }

    public function getUpcomingEvents(): array
    {
        $activeEvents = [];
        foreach ($this->getEvents() as $event) {
            if ($event->isUpcoming()) {
                $activeEvents[] = $event;
            }
        }

        return $activeEvents;
    }

    public function getPastEvents(): array
    {
        $pastEvents = [];
        foreach ($this->getEvents() as $event) {
            if (false === $event->isUpcoming()) {
                $pastEvents[] = $event;
            }
        }

        return $pastEvents;
    }
}