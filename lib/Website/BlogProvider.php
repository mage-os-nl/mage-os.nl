<?php declare(strict_types=1);

namespace MageOsNl\Website;

use MageOsNl\Registry;

class BlogProvider
{
    /**
     * @return Blog[]
     */
    public function getBlogs(): array
    {
        $files = glob(Registry::getInstance()->getContentDirectory() . '/pages/blog/*.md');

        $blogs = [];
        foreach ($files as $file) {
            $id = preg_replace('/\.md$/', '', basename($file));
            $timestamp = $this->getTimestampFromFilename($file);
            $content = $this->getContentFromFilename($file);
            $title = $this->getTitleFromFilename($file);
            $blogs[$timestamp] = new Blog($id, $title, $timestamp, $content);
        }

        krsort($blogs);

        return $blogs;
    }

    /**
     * @param string $filename
     * @return int
     */
    private function getTimestampFromFilename(string $filename): int
    {
        if (preg_match('/([0-9]{4})-([0-9]{2})-([0-9]{2})/', $filename, $match)) {
            return strtotime($match[0]);
        }

        return 0;
    }

    /**
     * @param string $filename
     * @return string
     */
    private function getContentFromFilename(string $filename): string
    {
        $content = file_get_contents($filename);
        $content = preg_replace('/# (.*)/', '', $content);
        $content = str_replace('#### ', '##### ', $content);
        $content = str_replace('### ', '#### ', $content);
        $content = str_replace('## ', '### ', $content);
        $content = str_replace('# ', '## ', $content);
        return trim($content);
    }

    private function getTitleFromFilename(string $filename): string
    {
        $content = file_get_contents($filename);
        if (preg_match('/^# (.*)/', $content, $match)) {
            return trim($match[1]);
        }

        return 'No title found';
    }
}