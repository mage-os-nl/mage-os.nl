<?php declare(strict_types=1);

namespace MageOsNl;

class Registry
{
    private static $instance = null;

    private string $contentDirectory = '';

    public static function getInstance()
    {
        if (self::$instance == null)
        {
            self::$instance = new Registry();
        }

        return self::$instance;
    }

    /**
     * @return string
     */
    public function getContentDirectory(): string
    {
        return $this->contentDirectory;
    }

    /**
     * @param string $contentDirectory
     */
    public function setContentDirectory(string $contentDirectory): void
    {
        $this->contentDirectory = $contentDirectory;
    }
}