<?php declare(strict_types=1);

use MageOsNl\Registry;
use MageOsNl\Website\MenuItem;

/** @var MenuItem[] $menuItems */
$menuItems = include Registry::getInstance()->getContentDirectory(). '/data/topmenu.php';
?>
<header class="bg-white mb-8 flex flex-wrap items-center border-b border-gray-400" x-data="{open:false}">
    <div class="flex pt-4 pb-3 xs:w-1/3 max-width-xs mx-0">
        <a href="/" class="block pb-2 max-w-[90px] md:max-w-[180px]">
            <?php include __DIR__ . '/../resources/svg/mage-os-nl.svg' ?>
        </a>

        <div>
            <a href="/">
                <h1 class="hidden md:block pt-2 pb-2 text-3xl font-extrabold">Mage-OS Nederland</h1>
                <h1 class="block md:hidden pb-2 text-2xl font-extrabold">Mage-OS NL</h1>
            </a>
        </div>

        <button style="position:absolute; right:20px;" class="outline-none md:hidden" @click="open = ! open">
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

    <nav class="inline-flex w-full md:flex-grow md:w-auto">
        <ul class="flex flex-row w-full md:w-auto md:ml-auto justify-between gap-2 lg:gap-4 xl:gap-8 md:text-lg">
            <?php foreach ($menuItems as $menuItem): ?>
                <li class="flex-auto hidden lg:block">
                    <a class="<?= $menuItem->getClass() ?>"
                       href="<?= $menuItem->getUrl() ?>"><?= $menuItem->getLabel() ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</header>