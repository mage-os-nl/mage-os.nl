<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;
use Michelf\MarkdownExtra;

class Page
{
    public function __construct(
        private string $name
    )
    {
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    public function getHtml(): string
    {
        $markdown = $this->getMarkdownContent();
        $html = MarkdownExtra::defaultTransform($markdown);
        return $this->renderSnippets($html);
    }


    private function getMarkdownContent(): string
    {
        return file_get_contents(Registry::getInstance()->getContentDirectory() . '/pages/' . $this->getName() . '.md');
    }

    private function renderSnippets(string $content): string
    {
        if (preg_match_all('/{{snippet (.*)}}/', $content, $matches)) {
            foreach ($matches[0] as $index => $match) {
                $snippetTag = $matches[0][$index];
                $snippetName = $matches[1][$index];
                $snippetHtml = $this->renderSnippet($snippetName);
                $content = str_replace($snippetTag, $snippetHtml, $content);
            }
        }

        return $content;
    }

    private function renderSnippet(string $snippetName): string
    {
        $snippetName = preg_replace('/[\W\d_]/i', '', $snippetName);
        $snippetFile = Registry::getInstance()->getContentDirectory().'/snippets/'.$snippetName.'.php';
        if (!file_exists($snippetFile)) {
            return '';
        }

        ob_start();
        include $snippetFile;
        $snippetHtml = ob_get_contents();
        ob_end_clean();

        return $snippetHtml;
    }
}
