<?php declare(strict_types=1);

namespace MageOsNl\Website;

use IntlDateFormatter;
use Michelf\MarkdownExtra;

class Blog
{
    private string $id;
    private string $title;
    private int $timestamp;
    private string $content;

    public function __construct(string $id, string $title, int $timestamp, string $content)
    {
        $this->id =$id;
        $this->title = $title;
        $this->timestamp = $timestamp;
        $this->content = $content;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
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
    public function getIntro(): string
    {
        $parts = explode('---', $this->content);
        return MarkdownExtra::defaultTransform($parts[0]);
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        $content = MarkdownExtra::defaultTransform($this->content);
        return implode('', explode('---', $content));
    }

    /**
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp ?? 0;
    }

    public function getDate(): string
    {
        $language = Translation::getLanguage();
        $locale = $language === 'en' ? 'en_GB' : 'nl_NL';

        $fmt = datefmt_create(
            $locale,
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Europe/Amsterdam',
            IntlDateFormatter::GREGORIAN
        );
        return datefmt_format($fmt, $this->getTimestamp());
    }
}