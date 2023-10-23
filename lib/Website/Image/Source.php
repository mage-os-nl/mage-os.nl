<?php declare(strict_types=1);

namespace MageOsNl\Website\Image;

use RuntimeException;

class Source
{
    public function __construct(
        private string $filename
    ) {}

    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getSize(): int
    {
        return filesize($this->filename);
    }

    public function getMimetype(): string
    {
        if (preg_match('/\.webp/', $this->getFilename())) {
            return 'image/webp';
        }

        if (preg_match('/\.avif/', $this->getFilename())) {
            return 'image/avif';
        }

        if (preg_match('/\.png/', $this->getFilename())) {
            return 'image/png';
        }

        return 'image/jpg';
    }

    public function getUrl(): string
    {
        return str_replace($_ENV['image_folder'], '/images/', $this->filename);
    }
}