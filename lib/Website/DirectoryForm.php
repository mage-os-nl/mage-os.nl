<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;
use RuntimeException;

class DirectoryForm
{
    public function getSortOptions(): array
    {
        return [
            'name_asc' => __('By name'),
            'name_desc' => __('By name (reverse)'),
        ];
    }

    public function isCurrentSort(string $sort): bool
    {
        return (isset($_GET['sort']) && $_GET['sort'] === $sort);
    }

    public function getDefaultSort(): string
    {
        return 'name_asc';
    }

    public function getCurrentSort(): string
    {
        if (isset($_GET['sort']) && array_key_exists($_GET['sort'], $this->getSortOptions())) {
            return $_GET['sort'];
        }

        return $this->getDefaultSort();
    }

    public function hasSearch(): bool
    {
        return (bool)$this->getSearch();
    }

    public function getSearch(): string
    {
        if (!isset($_GET['search'])) {
            return '';
        }

        $search = trim((string)$_GET['search']);
        $search = preg_replace('#([^a-zA-Z0-9 \-_]+)#', '', $search);
        return $search;
    }
}