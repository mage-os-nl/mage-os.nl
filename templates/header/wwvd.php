<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

$image = ImageFactory::create('headers/mosnl-wwvd-nologo.png', 'Webwinkel Vakdagen 2024 Magento Community Drinks');
$image->setCssClass('w-full h-full object-cover');
?>
<div class="py-8 md:py-32 relative" id="banner-wwvd">
    <a href="https://www.eventbrite.nl/e/tickets-mage-os-wwvd-borrel-777521025317"
       title="Webwinkel Vakdagen 2024 Magento Community Drinks" target="_new">
        <div class="absolute top-0 left-0 right-0 bottom-0">
            <?= $image ?>
        </div>
        <div class="relative flex items-center justify-center">
            <div>
                <h2 class="text-1xl md:text-3xl sm:text-5xl text-white font-extrabold uppercase text-center">
                    Webwinkel Vakdagen<br/>Magento Community Drinks
                </h2>
                <h3 class="text-1xl md:text-2xl lg:text-4xl text-orange-400 text-center pt-8">
                    January 23rd, 2024 starting at 17:00<br/>
                    Cafe Uncle Jim, Utrecht
                </h3>
            </div>
        </div>
    </a>
</div>
