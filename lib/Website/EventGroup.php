<?php

namespace MageOsNl\Website;

readonly class EventGroup
{
    public function __construct(
        public string $name,
        /** @var Event[] */
        public array $events,
    ) {}

    public function isUpcoming(): bool
    {
        foreach ($this->events as $event) {
            if ($event->isUpcoming()) {
                return true;
            }
        }

        return false;
    }

    public function loop(): \Generator
    {
        $total = count($this->events);

        foreach ($this->events as $index => $event) {
            $first = $index === 0;
            $last = $index === ($total - 1);

            yield [
                'event' => $event,
                'first' => $first,
                'last' => $last
            ];
        }
    }
}