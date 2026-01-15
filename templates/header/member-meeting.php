<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

//$image = ImageFactory::create('headers/mosnl-wwvd-nologo.png', 'Mage-OS Nederland ledenvergadering');
$image = ImageFactory::create('headers/mosnl-meeting-2024-02.jpg', 'Mage-OS Nederland ledenvergadering');
$image->setCssClass('w-full h-full object-cover');

$url = 'https://www.eventbrite.com/e/tickets-mage-os-nederland-nieuwjaarsborrel-1975123005077?utm_source=mage-os-nl&utm_medium=agenda&utm_campaign=mage-os-nl';
$teaser = 'Beslis mee over de toekomst van Magento';
$subtitle = '29 januari 2026 in Utrecht';

if (strstr($_SERVER['REQUEST_URI'], 'lid-worden')) {
    return;
}
?>
<div class="py-8 md:py-32 relative" id="banner-mm">
    <div class="absolute top-0 left-0 right-0 bottom-0">
        <?= $image ?>
    </div>
    <div class="relative flex items-center justify-center">
        <div class="text-center bg-green px-8 py-16 rounded-xl">
            <h2 class="text-1xl md:text-3xl sm:text-5xl text-orange font-extrabold uppercase text-center">
                Mage-OS Nederland<br/>Ledenvergadering + borrel
            </h2>
            <h3 class="text-1xl md:text-2xl lg:text-4xl text-blue text-center pt-8">
                <?= $teaser ?>
            </h3>
            <h3 class="text-1xl md:text-2xl lg:text-4xl text-orange-400 text-center pt-8">
                <?= $subtitle ?>
            </h3>
            <div class="mt-12">
            <a href="<?= $url ?>"
               title="Mage-OS Nederland Ledenvergadering" target="_new" class="button button-big button-orange">
                Meld je aan
            </a>
            </div>
        </div>
    </div>
</div>
