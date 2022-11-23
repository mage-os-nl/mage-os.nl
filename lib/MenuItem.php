<?php declare(strict_types=1);

namespace MageOsNl;

class MenuItem {
    private string $label;
    private string $url;
    private string $class;

    public function __construct(
        string $label,
        string $url,
        string $class = 'block py-4 hover:text-primary transition-colors text-center'
    ) {
        $this->label = $label;
        $this->url = $url;
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        return $this->class;
    }
}
