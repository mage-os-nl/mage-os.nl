<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

$image = ImageFactory::create('headers/mosnl-meeting-2024-02.jpg', '');
$image->setCssClass('w-full h-full object-cover');
?>
<div class="py-8 md:py-32 relative" id="banner-bbq">
    <div class="absolute top-0 left-0 right-0 bottom-0">
        <?= $image ?>
    </div>
    <div class="relative flex items-center justify-center">
        <div class="text-center">
            <h2 class="text-1xl md:text-3xl sm:text-5xl text-white font-extrabold uppercase text-center">
                Algemene ledenvergadering<br/>+ zomer BBQ 2025!
            </h2>
            <h3 class="text-1xl md:text-2xl lg:text-4xl text-orange-400 text-center pt-8">
                5 June 2025, starting at 15:30<br/>
                De Hofvlietvilla, Zwolle
            </h3>
            <div class="mt-12">
                <a href="https://www.eventbrite.com/e/tickets-algemene-ledenvergadering-mage-os-nederland-zomer-bbq-2025-1318544154059"
                   target="_new" class="bg-orange-500 text-white text-xl p-4 rounded-md">
                    Get your tickets
                </a>
            </div>
        </div>
    </div>
</div>
