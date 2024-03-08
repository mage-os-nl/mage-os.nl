<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

$image = ImageFactory::create('headers/mosnl-meeting-2024-02.jpg', 'Become a member');
$image->setCssClass('w-full h-full object-cover');

if (strstr($_SERVER['REQUEST_URI'], 'lid-worden')) {
    return;
}
?>
<div class="py-8 md:py-32 relative" id="banner-wwvd">
    <div class="absolute top-0 left-0 right-0 bottom-0">
        <?= $image ?>
    </div>
    <div class="relative flex items-center justify-center">
        <div class="text-center">
            <h2 class="text-1xl md:text-3xl sm:text-5xl text-white font-extrabold uppercase text-center">
                Mage-OS Nederland
            </h2>
            <h3 class="text-1xl md:text-2xl lg:text-4xl text-orange-400 text-center pt-8">
                Een Nederlandse Magento community<br/> van en voor iedereen
            </h3>
            <div class="mt-12">
            <a href="/lid-worden"
               title="Lid worden" class="bg-orange-500 text-white text-xl p-4 rounded-md">
                Word nu lid
            </a>
            </div>
        </div>
    </div>
</div>