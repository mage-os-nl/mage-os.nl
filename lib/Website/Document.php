<?php declare(strict_types=1);

namespace MageOsNl\Website;

use IntlDateFormatter;

class Document
{
    private int $timestamp = 0;
    private string $name = '';

    public function __construct(
        private string $absolutePath
    ) {
        $this->parse();
    }

    public function getName(): string
    {
        $fileExtensions = ['pdf', 'doc', 'odt', 'zip'];
        $fileExtensionsRegEx = implode('|', $fileExtensions);
        if (preg_match('#(.*)-([0-9]{4})-([0-9]{2})-([0-9]{2}).(' . $fileExtensionsRegEx . ')#', $this->getFilename(),
            $matches)) {
            $name = ucwords(str_replace('-', ' ', $matches[1]));
            return $name;
        }

        return preg_replace('#.(' . $fileExtensionsRegEx . ')#', '', $this->getFilename());
    }

    public function getFilename(): string
    {
        return basename($this->absolutePath);
    }

    public function getModificationTime(): int
    {
        return filemtime($this->absolutePath);
    }

    public function getDate(): string
    {
        $fmt = datefmt_create(
            'nl_NL',
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Europe/Amsterdam',
            IntlDateFormatter::GREGORIAN
        );

        return datefmt_format($fmt, $this->timestamp);
    }

    public function getDownloadUrl(): string
    {
        return '/documents/' . $this->getFilename();
    }

    private function parse()
    {
        $fileExtensions = ['pdf', 'doc', 'odt', 'zip'];
        $fileExtensionsRegEx = implode('|', $fileExtensions);
        if (!preg_match('#(.*)-([0-9]{4})-([0-9]{2})-([0-9]{2}).(' . $fileExtensionsRegEx . ')#', $this->getFilename(),
            $matches)) {
            $this->name = $this->getFilename();
            $this->timestamp = filemtime($this->absolutePath);
            return;
        }

        $this->name = ucwords(str_replace('-', ' ', $matches[1]));
        $this->timestamp = strtotime($matches[2].'-'.$matches[3].'-'.$matches[4]);
    }
}