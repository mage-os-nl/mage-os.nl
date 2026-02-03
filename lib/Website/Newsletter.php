<?php declare(strict_types=1);

namespace MageOsNl\Website;

use IntlDateFormatter;

class Newsletter
{
    private string $title;
    private int $timestamp;
    private string $url = '';

    public function __construct(array $data = [])
    {
        $this->title = $data['title'];
        $this->timestamp = strtotime($data['date']);
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
     * @return int
     */
    public function getTimestamp(): int
    {
        return $this->timestamp;
    }

    /**
     * @return int
     */
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

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

}