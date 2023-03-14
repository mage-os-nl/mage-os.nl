<?php declare(strict_types=1);

namespace MageOsNl\Website;

class Event
{
    private string $title;
    private int $timestamp;
    private string $date;
    private string $time = '';
    private string $description = '';
    private string $url = '';

    public function __construct(array $data = [])
    {
        $this->title = $data['title'];
        $this->timestamp = strtotime($data['timestamp']);
        $this->date = $data['date'];
        $this->time = $data['time'] ?? '';
        $this->description = $data['description'] ?? '';
        $this->url = $data['url'] ?? '';
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
        return $this->getTimestamp() > time();
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }
}