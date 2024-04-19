<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class DocumentProvider
{
    /**
     * @return Document[]
     */
    public function getDocuments(): array
    {
        $documentFolder = Registry::getInstance()->getContentDirectory() . '/../pub/documents/';
        if (!is_dir($documentFolder)) {
            return [];
        }

        $files = glob($documentFolder.'*');
        $documents = [];
        foreach ($files as $file) {
            $documents[] = new Document($file);
        }

        return $documents;
    }
}