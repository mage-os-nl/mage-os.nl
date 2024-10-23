<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

?>
<div class="pb-8 relative">
    <a href="https://nl.meet-magento.com" title="Meet Magento Nederland 2024" target="_new">
        <div class="absolute md:top-1/4 md:left-1/3 m-auto pl-4 md:pl-24">
            <h2 class="text-3xl md:text-7xl text-purple-950	 font-obviously-super leading-none uppercase">Meet Magento<br/>Netherlands</h2>
            <h3 class="text-2xl md:text-5xl text-orange-600 font-obviously-condensed uppercase">October 31st, 2024 - LIEF Amsterdam</h3>
        </div>
        <?= ImageFactory::create('headers/mmnl_x_cover_en.png', 'Meet Magento Nederland 2024') ?>
    </a>
</div>
