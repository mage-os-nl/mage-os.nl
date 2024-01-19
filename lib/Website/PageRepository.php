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
        $files = array_merge(
            glob($pagesDir . '/*.md'),
            glob($pagesDir . '/*.php')
        );

        foreach ($files as $file) {
            $file = preg_replace('/\.(md|php)/', '', basename($file));
            $file = preg_replace('/-(nl|en)/', '', $file);
            $pages[] = $file;
        }

        $blogFiles = array_merge(
            glob($pagesDir . '/blog/*.md'),
            glob($pagesDir . '/blog/*.php')
        );
        foreach ($blogFiles as $blogFile) {
            $pages[] = 'blog/' . preg_replace('/\.(md|php)/', '', basename($blogFile));
        }

        return $pages;
    }
}