<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

$image = ImageFactory::create('headers/mosnl-wwvd-nologo.png', 'Webwinkel Vakdagen 2024 Magento Community Drinks');
$image->setCssClass('w-full h-full object-cover');
?>
<div class="py-8 md:py-32 relative" id="banner-wwvd">
    <div class="absolute top-0 left-0 right-0 bottom-0">
        <?= $image ?>
    </div>
    <div class="relative flex items-center justify-center">
        <div class="text-center">
            <h2 class="text-1xl md:text-3xl sm:text-5xl text-white font-extrabold uppercase text-center">
                Webwinkel Vakdagen<br/>Magento Community Drinks
            </h2>
            <h3 class="text-1xl md:text-2xl lg:text-4xl text-orange-400 text-center pt-8">
                April 2nd, 2025 starting at 16:00<br/>
                Beers & Barrels, Utrecht
            </h3>
            <div class="mt-12">
            <a href="https://www.eventbrite.com/e/tickets-mage-os-wwvd-2025-borrel-1106568990639"
               title="Webwinkel Vakdagen 2025 Magento Community Drinks" target="_new" class="bg-orange-500 text-white text-xl p-4 rounded-md">
                Reserve your seat
            </a>
            </div>
        </div>
    </div>
</div>