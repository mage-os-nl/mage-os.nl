<?php declare(strict_types=1);

namespace MageOsNl\Website;

class DirectoryItem
{
    public function __construct(
        private string $name,
        private string $role,
        private string $url,
        private string $logo,
        private bool $isSponsor = false
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
        return $this->hasLogo() ? $this->logo : '/images/placeholder.svg';
    }

    public function hasLogo(): bool
    {
        return strlen($this->logo) > 0;
    }

    public function isSponsor(): bool
    {
        return $this->isSponsor;
    }
}