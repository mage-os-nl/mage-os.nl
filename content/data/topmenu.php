<?php declare(strict_types=1);

use MageOsNl\Website\MenuItem;

return [
    new MenuItem('Vereniging', '/vereniging'),
    new MenuItem('Nieuwsbrief', 'http://eepurl.com/iusMg2'),
    new MenuItem('Agenda', '/agenda'),
    new MenuItem('Blog', '/blog'),
    new MenuItem('FAQ', '/faq'),
    new MenuItem('Nu lid worden', '/lid-worden',
        'block py-4 hover:text-primary p-4 text-white bg-orange-600 transition-colors text-center'
    ),
];