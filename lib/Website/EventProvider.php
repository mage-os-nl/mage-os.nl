<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class EventProvider
{
    private array $events = [];

    /**
     * @return EventGroup[]
     */
    public function getEventGroups(): array
    {
        if ($this->events !== []) {
            return $this->events;
        }

        $filename = Registry::getInstance()->getContentDirectory() . '/data/events.json';
        if (!file_exists($filename)) {
            return [];
        }

        $items = json_decode(file_get_contents($filename), true);
        $grouped = [];
        foreach ($items as $item) {
            $key = array_key_exists('group', $item) ? $item['group'] : $item['title'] . $item['timestamp'];
            $grouped[$key][] = new Event($item);
        }

        foreach ($grouped as $key => $childEvents) {
            $this->events[] = new EventGroup($key, $childEvents);
        }

        return $this->events;
    }

    /**
     * @return EventGroup[]
     */
    public function getUpcomingEventGroups(): array
    {
        $groups = [];
        foreach ($this->getEventGroups() as $group) {
            if ($group->isUpcoming()) {
                $groups[] = $group;
            }
        }

        return $groups;
    }

    /**
     * @return EventGroup[]
     */
    public function getPastEventGroups(): array
    {
        $groups = [];
        foreach ($this->getEventGroups() as $group) {
            if (!$group->isUpcoming()) {
                $groups[] = $group;
            }
        }

        usort($groups, function(EventGroup $a, EventGroup $b) {
            return $b->events[0]->getTimestamp() <=> $a->events[0]->getTimestamp();
        });

        return $groups;
    }
}