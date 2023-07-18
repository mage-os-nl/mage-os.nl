<?php declare(strict_types=1);

use MageOsNl\Website\Router;
use Michelf\MarkdownExtra;

$page = (new Router)->getPage();
?>

<div class="container mb-12 m-auto grid lg:grid-cols-3 md:grid-cols-1 gap-4 text-white">
    <div class=" bg-orange-600">
        <a class="block py-4 hover:text-primary p-4 transition-colors text-center" href="https://nl.meet-magento.com">
            <?php include __DIR__ . '/../resources/svg/link.svg' ?>
            Meet Magento NL (2 nov)
        </a>
    </div>
    <div class=" bg-orange-600">
        <a class="block py-4 hover:text-primary p-4 transition-colors text-center" href="http://eepurl.com/iusMg2">
            <?php include __DIR__ . '/../resources/svg/link.svg' ?>
            Nieuwsbrief
        </a>
    </div>
    <div class=" bg-orange-600">
        <a class="block py-4 hover:text-primary p-4 transition-colors text-center" href="/lid-worden">
            <?php include __DIR__ . '/../resources/svg/link.svg' ?>
            Nu lid worden
        </a>
    </div>
</div>

<div class="float-right pb-4">
    <div class="md:flex-none lg:flex content-end lg:pb-4">
    <a href="https://twitter.com/mage_os_nl" class="p-1">
        <?php include __DIR__ . '/../resources/svg/twitter.svg' ?>
    </a>
    <a href="https://www.linkedin.com/company/mageos-nederland/" class="p-1">
        <?php include __DIR__ . '/../resources/svg/linkedin.svg' ?>
    </a>
    <a href="https://github.com/mage-os-nl" class="p-1">
        <?php include __DIR__ . '/../resources/svg/github.svg' ?>
    </a>
    <a href="http://chat.mage-os.org" class="p-1">
        <?php include __DIR__ . '/../resources/svg/discord.svg' ?>
    </a>
    </div>
</div>

<main class="prose max-w-none break-words">
    <?php echo $page->getHtml(); ?>
</main>

<footer class="pb-8 pt-12">
    <hr/>
    <p class="pt-4 text-sm text-gray-500 clear-both">Mage OS Nederland - Vereniging - KvK 88186288 - <a
                href="https://github.com/yireo/mage-os.nl">GitHub source</a></p>
    <p class="pt-4 text-sm text-gray-500 clear-both">Zie je een foutje? Stuur een mail naar <a href="mailto:bestuur@nl.mage-os.org">bestuur@nl.mage-os.org</a> of maak een Pull Request aan op onze <a
                href="https://github.com/yireo/mage-os.nl">GitHub repository</a></p>
    <p class="pt-4 text-sm text-gray-500 clear-both">Magento™ is a registered trademark of Adobe Inc. Mage-OS is not
        affiliated with Adobe or Magento Open Source in any way.</p>
</footer>
