<?php declare(strict_types=1);

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

return [
    new MenuItem('Home', '#home'),
    new MenuItem('Agenda', '#agenda'),
    new MenuItem(
        'Nu lid worden',
        'https://docs.google.com/forms/d/1srPGVE5OLvAkPFGPpLXmJKzfORhR-V8exW8j9VBTkA4/prefill',
        'block py-4 hover:text-primary p-4 text-white bg-orange-600 transition-colors text-center'
    ),
];