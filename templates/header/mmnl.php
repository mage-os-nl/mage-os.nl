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
        <div class="text-center bg-green px-8 py-16 rounded-xl">
            <h2 class="text-1xl md:text-3xl sm:text-5xl text-orange font-extrabold uppercase text-center">
                Meet Magento Netherlands 2025
            </h2>
            <h3 class="text-1xl md:text-2xl lg:text-4xl text-blue text-center pt-8">
                6th of November 2025<br/>
                LIEF, Amsterdam
            </h3>
            <div class="mt-12">
                <a href="https://meetmagentonetherlands2025.eventbrite.com/"
                   class="button button-big button-orange">
                    Get your tickets
                </a>
            </div>
        </div>
    </div>
</div>
