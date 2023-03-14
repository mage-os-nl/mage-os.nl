<?php declare(strict_types=1);

use MageOsNl\Website\MenuItem;

return [
    new MenuItem('Initiatief', '/'),
    new MenuItem('Vereniging', '/vereniging'),
    new MenuItem('Agenda', '/agenda'),
    new MenuItem('FAQ', '/faq'),
    new MenuItem(
        'Nu lid worden',
        'https://docs.google.com/forms/d/e/1FAIpQLSclanrbUJWqhB0kdUXT-mj8-o_8Y2QQ2pXKbe-knMHjPyas1Q/viewform',
        'block py-4 hover:text-primary p-4 text-white bg-orange-600 transition-colors text-center'
    ),
];