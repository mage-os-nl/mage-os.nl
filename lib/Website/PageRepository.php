<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class PageRepository
{
    const DEFAULT_PAGE = 'home';

    /**
     * @return Page[]
     */
    public function getPages(): array
    {
        $pageNames = $this->getPageNamesFromFiles();
        $pages = [];
        foreach ($pageNames as $pageName) {
            $pages[] = new Page($pageName);
        }

        return $pages;
    }

    /**
     * @param string $name
     * @return Page
     */
    public function getPageByName(string $name): Page
    {
        foreach ($this->getPages() as $page) {
            if ($page->getName() === $name) {
                return $page;
            }
        }

        return new Page(self::DEFAULT_PAGE);
    }

    private function getPageNamesFromFiles(): array
    {
        $pagesDir = Registry::getInstance()->getContentDirectory() . '/pages/';

        $pages = [];
        $files = glob($pagesDir . '/*.{md,php}', GLOB_BRACE);
        foreach ($files as $file) {
            $pages[] = preg_replace('/\.(md|php)/', '', basename($file));
        }

        $blogFiles = glob($pagesDir . '/blog/*.{md,php}', GLOB_BRACE);
        foreach ($blogFiles as $blogFile) {
            $pages[] = 'blog/' . preg_replace('/\.(md|php)/', '', basename($blogFile));
        }

        return $pages;
    }
}