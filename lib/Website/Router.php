<?php declare(strict_types=1);

namespace MageOsNl\Website;

class Router
{
    public function getPage(): Page
    {
        if (isset($_GET['page'])) {
            return (new PageRepository())->getPageByName($_GET['page']);
        }

        $request = trim($_SERVER['REQUEST_URI'], '/');
        $request = preg_replace('/\?(.*)/', '', $request);
        return (new PageRepository())->getPageByName($request);
    }
}
