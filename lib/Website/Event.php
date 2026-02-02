<?php declare(strict_types=1);

namespace MageOsNl\Website;

class Event
{
    private string $title;
    private \DateTimeImmutable $timestamp;
    private ?\DateTimeImmutable $timestampEnd;
    private string $date;
    private string $time = '';
    private string $description = '';
    private string $url = '';
    private string $location;
    private string $address;
    private bool $mainEvent;
    private bool $mageOsNlEvent;


    public function __construct(array $data = [])
    {
        $this->title = $data['title'];
        $this->timestamp = new \DateTimeImmutable($data['timestamp']);
        $this->timestampEnd = isset($data['timestamp_end']) ? new \DateTimeImmutable($data['timestamp_end']) : null;
        $this->date = $data['date'] ?? '';
        $this->time = $data['time'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->url = $data['url'] ?? '';
        $this->location = $data['location'] ?? '';
        $this->address = $data['address'] ?? $this->location;
        $this->mainEvent = $data['main_event'] ?? false;
        $this->mageOsNlEvent = $data['mage_os_nl_event'] ?? false;
    }

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @return string
     */
    public function getTime(): string
    {
        return $this->time;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if (!$this->url) {
            return '';
        }

        $utm = 'utm_source=mage-os-nl&utm_medium=agenda&utm_campaign=mage-os-nl';

        if (strstr($this->url, '?') !== false) {
            return $this->url . '&' . $utm;
        }

        return $this->url . '?' . $utm;
    }

    public function isUpcoming(): bool
    {
        // Compare with start of today (00:00:00) so events happening today are still "upcoming"
        $startOfToday = new \DateTimeImmutable('today');

        // For multi-day events, use the end date if available
        $endDate = $this->timestampEnd ?? $this->timestamp;

        return $endDate >= $startOfToday;
    }

    public function getTimestamp(): \DateTimeImmutable
    {
        return $this->timestamp;
    }

    /**
     * @return string
     */
    public function getLocation(): string
    {
        return $this->location;
    }

    public function getAddress(): string
    {
        return $this->address;
    }

    public function isMainEvent(): bool
    {
        return $this->mainEvent;
    }

    public function isMageOsNlEvent(): bool
    {
        return $this->mageOsNlEvent;
    }

    public function getFormattedDate(): string
    {
        if ($this->date) {
            return $this->date;
        }

        $formatter = new \IntlDateFormatter('nl_NL', \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
        return $formatter->format($this->timestamp);
    }
}
