<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

$image = ImageFactory::create('headers/mosnl-wwvd-nologo.png', 'Webwinkel Vakdagen 2024 Magento Community Drinks');
$image->setCssClass('w-full h-auto');
?>
<div class="pb-8 relative">
    <a href="https://www.eventbrite.nl/e/tickets-mage-os-wwvd-borrel-777521025317"
       title="Webwinkel Vakdagen 2024 Magento Community Drinks" target="_new">
        <div class="absolute top-0 left-0 right-0 bottom-0 flex items-center justify-center">
            <div>
                <h2 class="text-5xl text-white font-extrabold uppercase text-center">
                    Webwinkel Vakdagen<br/>Magento Community Drinks
                </h2>
                <h3 class="text-4xl text-orange-400 text-center pt-8">
                    October 31st, 2024 starting at 18:00<br/>
                    Cafe Uncle Jim, Utrecht
                </h3>
            </div>
        </div>
        <?= $image ?>
    </a>
</div>
