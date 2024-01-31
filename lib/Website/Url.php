<?php declare(strict_types=1);

namespace MageOsNl\Website;

class Url
{
    public function __construct(
        private string $url
    ) {
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if (str_starts_with($this->url, 'http')) {
            return $this->url;
        }

        $url = ltrim($this->url, '/');

        return '/' . Translation::getLanguage() . '/' . $url;
    }

    public function isActive(): bool
    {
        if (stristr($_SERVER['REQUEST_URI'], $this->url)) {
            return true;
        }

        return false;
    }
}
