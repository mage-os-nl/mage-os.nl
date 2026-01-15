<?php declare(strict_types=1);

namespace MageOsNl\Website;

class MenuItem {
    public function __construct(
        private string $label,
        private string $url,
        private string $class = 'block py-1 hover:text-orange transition-colors text-center'
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
        return (new Url($this->url))->getUrl();
    }

    /**
     * @return string
     */
    public function getClass(): string
    {
        $class = $this->class;
        if ($_SERVER['REQUEST_URI'] == $this->url) {
            $class =  ' border-b-orange border-b-2 mt-1 inline-block';
        }

        return $class;
    }
}
