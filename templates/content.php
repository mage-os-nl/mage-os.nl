<?php declare(strict_types=1);

use MageOsNl\Website\ImageFactory;
use MageOsNl\Website\Router;

$page = (new Router)->getPage();
?>
<?php //include_once __DIR__ . '/header/mmnl.php'; ?>
<?php include_once __DIR__.'/header/wwvd.php'; ?>

<div class="mx-auto md:max-w-6xl px-4 xl:px-0 pb-16">
    <div class="float-right pb-4">
        <div class="md:flex-none lg:flex content-end lg:pb-4">
            <a href="https://twitter.com/mage_os_nl" class="p-1">
                <?php include __DIR__.'/../resources/svg/twitter.svg' ?>
            </a>
            <a href="https://www.linkedin.com/company/mageos-nederland/" class="p-1">
                <?php include __DIR__.'/../resources/svg/linkedin.svg' ?>
            </a>
            <a href="https://github.com/mage-os-nl" class="p-1">
                <?php include __DIR__.'/../resources/svg/github.svg' ?>
            </a>
            <a href="http://chat.mage-os.org" class="p-1">
                <?php include __DIR__.'/../resources/svg/discord.svg' ?>
            </a>
        </div>
    </div>

    <main class="prose max-w-none break-words">
        <?php echo $page->getHtml(); ?>
    </main>
</div>