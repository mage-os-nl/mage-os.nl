<?php declare(strict_types=1);

namespace MageOsNl\Website;

use InvalidArgumentException;
use MageOsNl\Registry;
use Michelf\MarkdownExtra;

class Page
{
    public function __construct(
        private string $name
    ) {
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
        $html = 'No content';

        try {
            $markdown = $this->getMarkdownContent();
            $markdown = str_replace('---', '', $markdown);
            $html = MarkdownExtra::defaultTransform($markdown);
        } catch(InvalidArgumentException $e) {}

        try {
            $html = $this->getPhpContent();
        } catch(InvalidArgumentException $e) {}

        return $this->renderSnippets($html);
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    private function getMarkdownContent(): string
    {
        $file = Registry::getInstance()->getContentDirectory() . '/pages/' . $this->getName() . '.md';

        if (!file_exists($file)) {
            throw new InvalidArgumentException('No such file "' . $file . '"');
        }

        return file_get_contents($file);
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    private function getPhpContent(): string
    {
        $file = Registry::getInstance()->getContentDirectory() . '/pages/' . $this->getName() . '.php';

        if (!file_exists($file)) {
            throw new InvalidArgumentException('No such file "' . $file . '"');
        }

        ob_start();
        include($file);
        return ob_get_clean();
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
        $snippetFile = Registry::getInstance()->getContentDirectory() . '/snippets/' . $snippetName . '.php';
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
