<?php declare(strict_types=1);

use MageOsNl\Website\DirectoryProvider;

$items = (new DirectoryProvider())->getDirectoryItems();
?>
<h1>Directory</h1>
<p>Hieronder vindt je een lijst van bedrijven actief in het Nederlandse Magento ecosysteem. Ook hierbij vermeld worden? Maak een Pull Request aan op onze <a href="https://github.com/mage-os-nl/mage-os.nl">GitHub repository</a></p>

<div class="grid grid-cols-4 gap-4">
    <?php foreach ($items as $item): ?>
        <div class="p-4 text-center">
            <a class="no-underline" href="<?= $item->getUrl() ?>">
                <h3><?= $item->getName() ?></h3>
                <em><?= $item->getRole() ?></em>
                <div class="p-8">
                    <img class="max-w-48 max-h-48 inline" src="<?= $item->getLogo() ?>" />
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>