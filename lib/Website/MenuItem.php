<?php declare(strict_types=1);

namespace MageOsNl\Website;

class MenuItem {
    public function __construct(
        private string $label,
        private string $url,
        private string $class = 'block py-1 hover:text-primary transition-colors text-center'
    ) {
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return __($this->label);
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        if (str_starts_with($this->url, 'http')) {
            return $this->url;
        }

        return '/' . Translation::getLanguage() . $this->url;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }
}
