<?php declare(strict_types=1);

namespace MageOsNl\Website;

use IntlDateFormatter;
use Michelf\MarkdownExtra;

class DirectoryItem
{
    public function __construct(
        private string $name,
        private string $description,
        private string $role,
        private string $url,
        private string $logo
    ) {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
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
    public function getRole(): string
    {
        return $this->role;
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
    public function getLogo(): string
    {
        return $this->logo;
    }
}