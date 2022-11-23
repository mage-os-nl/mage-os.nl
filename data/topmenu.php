<?php declare(strict_types=1);

use MageOsNl\MenuItem;

return [
    new MenuItem('Initiatief', '#initiatief'),
    new MenuItem('Vereniging', '#vereniging'),
    new MenuItem('Agenda', '#agenda'),
    new MenuItem(
        'Nu lid worden',
        'https://docs.google.com/forms/d/1srPGVE5OLvAkPFGPpLXmJKzfORhR-V8exW8j9VBTkA4/prefill',
        'block py-4 hover:text-primary p-4 text-white bg-orange-600 transition-colors text-center'
    ),
];