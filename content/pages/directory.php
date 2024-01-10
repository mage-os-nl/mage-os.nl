<?php declare(strict_types=1);

use MageOsNl\Website\DirectoryProvider;

$items = (new DirectoryProvider())->getDirectoryItems();
?>
<h1>Directory</h1>
<?= markdownFile('directory') ?>

<div class="grid grid-cols-4 gap-8">
    <?php foreach ($items as $item): ?>
        <div class="shadow-lg ring-1 ring-black/5 p-8 text-center">
            <a class="no-underline " href="<?= $item->getUrl() ?>">
                <h3><?= $item->getName() ?></h3>
                <em><?= $item->getRole() ?></em>
                <div class="p-4">
                    <img class="w-auto max-h-48 inline" src="<?= $item->getLogo() ?>" title="<?= $item->getName() ?>">
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>