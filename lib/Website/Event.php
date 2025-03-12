<?php declare(strict_types=1);

namespace MageOsNl\Website;

class Event
{
    private string $title;
    private \DateTimeImmutable $timestamp;
    private string $date;
    private string $time = '';
    private string $description = '';
    private string $url = '';
    private string $location;

    public function __construct(array $data = [])
    {
        $this->title = $data['title'];
        $this->timestamp = new \DateTimeImmutable($data['timestamp']);
        $this->date = $data['date'] ?? '';
        $this->time = $data['time'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->url = $data['url'] ?? '';
        $this->location = $data['location'] ?? '';
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
        return $this->url;
    }

    public function isUpcoming(): bool
    {
        return $this->getTimestamp() > new \DateTimeImmutable();
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

    public function getFormattedDate(): string
    {
        if ($this->date) {
            return $this->date;
        }

        $formatter = new \IntlDateFormatter('nl_NL', \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
        return $formatter->format($this->timestamp);
    }
}