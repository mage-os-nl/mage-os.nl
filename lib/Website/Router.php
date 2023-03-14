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
        return (new PageRepository())->getPageByName($request);
    }
}
