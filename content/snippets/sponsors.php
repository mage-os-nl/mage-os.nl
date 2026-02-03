<?php

declare(strict_types=1);

use MageOsNl\Website\DirectoryProvider;

$items = (new DirectoryProvider())->getDirectoryItems();
$sponsors = array_filter($items, function($item) {
    return $item->isSponsor();
});

if (empty($sponsors)) {
    return;
}
?>
<section class="py-8">
    <h2 class="text-3xl font-bold text-center mb-8">Sponsoren</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <?php foreach ($sponsors as $sponsor): ?>
            <div class="bg-white relative overflow-hidden shadow-lg ring-1 ring-black/5 p-6 text-center hover:shadow-xl transition-shadow flex flex-col">
                <a href="<?= $sponsor->getUrl() ?>" class="no-underline flex flex-col h-full">
                    <div class="relative h-[120px] flex items-center justify-center">
                        <?php if ($sponsor->hasLogo()): ?>
                            <img class="w-auto max-h-[100px] inline object-contain"
                                 src="<?= $sponsor->getLogo() ?>"
                                 alt=""
                                 loading="lazy"
                            />
                        <?php endif; ?>
                    </div>
                    <div class="mt-auto">
                        <h3 class="text-base font-semibold text-gray-900"><?= $sponsor->getName() ?></h3>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

    <p class="my-8">Wilt u ook sponsor worden van Mage-OS Nederland? Stuur een email naar <a class="hover:text-orange" href="mailto:bestuur@nl.mage-os.org?subject=Interesse in sponsorschap Mage-OS Nederland">bestuur@nl.mage-os.org</a></p>
</section>
