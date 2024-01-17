<?php declare(strict_types=1);

namespace MageOsNl\Website;

class DirectoryValidator
{
    public function hasAllowedRole(DirectoryItem $directoryItem): bool
    {
        return in_array($directoryItem->getRole(), $this->getAllowedRoles());
    }

    public function getAllowedRoles(): array
    {
        return [
            'agency',
            'payment',
            'technology',
            'training',
            'security',
            'shipping',
        ];
    }
}