<?php declare(strict_types=1);

use MageOsNl\Website\Router;
use Michelf\MarkdownExtra;

$page = (new Router)->getPage();
?>

<div class="float-right flex pb-4">
    <a href="https://twitter.com/mage_os_nl" class="p-1">
        <?php include __DIR__ . '/../resources/svg/twitter.svg' ?>
    </a>
    <a href="https://www.linkedin.com/company/mageos-nederland/" class="p-1">
        <?php include __DIR__ . '/../resources/svg/linkedin.svg' ?>
    </a>
    <a href="https://github.com/mage-os-nl" class="p-1">
        <?php include __DIR__ . '/../resources/svg/github.svg' ?>
    </a>
    <a href="https://chat.mage-os.org" class="p-1">
        <?php include __DIR__ . '/../resources/svg/discord.svg' ?>
    </a>
</div>

<main class="prose max-w-none break-words">
    <?php echo $page->getHtml(); ?>
</main>

<footer class="pb-8">
    <hr/>
    <p class="pt-8 text-sm text-gray-400 clear-both">Mage OS Nederland - Vereniging - KvK 88186288 - <a
                href="https://github.com/yireo/mage-os.nl">GitHub source</a></p>
    <p class="pt-8 text-sm text-gray-400 clear-both">Magento™ is a registered trademark of Adobe Inc. Mage-OS is not
        affiliated with Adobe or Magento Open Source in any way.</p>
</footer>
