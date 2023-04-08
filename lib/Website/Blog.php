<?php declare(strict_types=1);

namespace MageOsNl\Website;

use IntlDateFormatter;
use Michelf\MarkdownExtra;

class Blog
{

    private string $title;
    private int $timestamp;
    private string $content;

    public function __construct(string $title, int $timestamp, string $content)
    {
        $this->title = $title;
        $this->timestamp = $timestamp;
        $this->content = $content;
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
    public function getContent(): string
    {
        return MarkdownExtra::defaultTransform($this->content);
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    public function getDate(): string
    {
        $fmt = datefmt_create(
            'nl_NL',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Europe/Amsterdam',
            IntlDateFormatter::GREGORIAN
        );
        return datefmt_format($fmt, $this->getTimestamp());
    }
}