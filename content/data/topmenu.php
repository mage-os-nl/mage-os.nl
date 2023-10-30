<?php declare(strict_types=1);

use MageOsNl\Website\MenuItem;

return [
    new MenuItem('Association', '/vereniging'),
    new MenuItem('Newsletter', 'http://eepurl.com/iusMg2'),
    new MenuItem('Agenda', '/agenda'),
    new MenuItem('Blog', '/blog'),
    new MenuItem('FAQ', '/faq'),
    new MenuItem('Become member', '/lid-worden',
        'block py-1 hover:text-primary p-2 text-white bg-orange-600 transition-colors text-center'
    ),
];