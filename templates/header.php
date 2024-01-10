<?php declare(strict_types=1);

use MageOsNl\Registry;
use MageOsNl\Website\MenuItem;
use MageOsNl\Website\Router;
use MageOsNl\Website\Url;

/** @var MenuItem[] $menuItems */
$menuItems = include Registry::getInstance()->getContentDirectory(). '/data/topmenu.php';
?>
<header class="relative bg-white mb-8 flex flex-wrap items-center border-b border-gray-400" x-data="{open:false}">
    <div class=" flex pt-4 pb-3 xs:w-1/3 max-width-xs mx-0">
        <a href="/" class="block pb-2 max-w-[90px] md:max-w-[180px]">
            <?php include __DIR__ . '/../resources/svg/mage-os-nl.svg' ?>
        </a>

        <div>
            <a href="/">
                <h1 class="hidden md:block pt-2 pb-2 text-3xl font-extrabold"><?= __('Mage-OS Nederland') ?></h1>
                <h1 class="block md:hidden text-2xl font-extrabold">Mage-OS NL</h1>
                <h2 class="hidden md:block"><?= __('De Nederlandse Magento community') ?></h2>
                <h2 class="block md:hidden"><?= __('Magento in Nederland') ?></h2>
            </a>
        </div>

        <button class="absolute right-0 outline-none md:hidden" @click="open = ! open">
            <svg
                    class="w-6 h-6 text-gray-500"
                    fill="none"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
            >
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <nav class="md:hidden w-full items-center" x-show="open">
        <ul class="pt-4">
            <?php foreach ($menuItems as $menuItem): ?>
                <li class="pt-2 pb-1 border-t border-gray-300">
                    <a href="<?= $menuItem->getUrl() ?>"><?= $menuItem->getLabel() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <div class="absolute right-0 bottom-0 text-orange-600">
        <?php if (isset($_GET['language']) && $_GET['language'] === 'en'): ?>
            <a href="/nl<?= $_SERVER['REQUEST_URI'] ?>" title="Dutch language">NL</a><span class="hidden md:inline pl-2">| EN</span>
        <?php else: ?>
            <span class="hidden md:inline pr-2">NL |</span><a href="/en<?= $_SERVER['REQUEST_URI'] ?>" title="English language">EN</a>
        <?php endif; ?>
    </div>
</header>

<nav class="flex w-fullmd:w-auto">
    <div class="float-right">
        <a class="block py-1 hover:text-primary p-2 text-white bg-orange-600 transition-colors text-center"
           href="<?= (new Url('lid-worden'))->getUrl() ?>">
            <?= __('Become member') ?>
        </a>
    </div>
    <ul class="flex flex-row w-full md:w-auto md:ml-auto justify-between gap-2 xl:gap-4 md:text-lg">
        <?php foreach ($menuItems as $menuItem): ?>
            <li class="flex-auto hidden lg:block">
                <a class="<?= $menuItem->getClass() ?>" href="<?= $menuItem->getUrl() ?>">
                    <?= $menuItem->getLabel() ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>