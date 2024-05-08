<?php declare(strict_types=1);

use MageOsNl\Website\NewsletterProvider;

$newsletters = (new NewsletterProvider())->getNewsletters();
?>
<h2>Newsletters</h2>
<table class="table">
    <tbody>
    <?php foreach ($newsletters as $newsletter): ?>
        <tr>
            <td>
                <a href="<?= $newsletter->getUrl() ?>"><?= $newsletter->getTitle() ?></strong></a>
            </td>
            <td>
                <?= $newsletter->getDate() ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
