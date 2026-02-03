<?php declare(strict_types=1);

use MageOsNl\Website\DocumentProvider;

$documents = (new DocumentProvider())->getDocuments();
?><h2><?= __('Documents') ?></h2>
<table class="table">
    <thead>
    <tr>
        <th colspan="1"><?= __('Document') ?></th>
        <th colspan="1"><?= __('Date') ?></th>
        <th colspan="1"><?= __('Download') ?></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($documents as $document): ?>
        <tr>
            <td>
                <em><?= $document->getName() ?></em>
            </td>
            <td>
                <?= $document->getDate() ?>
            </td>
            <td>
                <a href="<?= $document->getDownloadUrl() ?>"><strong><?= $document->getFilename() ?></strong></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
