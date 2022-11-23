<?php declare(strict_types=1);

use MageOsNl\MenuItem;

/** @var MenuItem[] $menuItems */
$menuItems = include __DIR__ . '/../data/topmenu.php';
?>
<header class="bg-white mb-8 flex flex-wrap items-center border-b border-gray-400" x-data="{open:false}">
    <div class="inline-flex pt-4 pb-3 md:py-8 xs:w-2/3  mx-auto md:mx-0">
        <a href="/">
            <span class="max-w-xs pb-2"><?php include __DIR__ . '/header/logo.php' ?></span>
        </a>
        <a href="/">
            <h1 class="md:pt-2 text-2xl md:text-4xl font-extrabold">Mage-OS Nederland</h1>
        </a>

        <button class="outline-none md:hidden" @click="open = ! open">
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