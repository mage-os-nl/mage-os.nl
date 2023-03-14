<?php declare(strict_types=1);

use MageOsNl\Website\EventProvider;

$upcomingEvents = (new EventProvider())->getUpcomingEvents();
$pastEvents = (new EventProvider())->getPastEvents();
?>
<table class="table">
    <thead>
    <tr>
        <th colspan="3">Aankomende events</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($upcomingEvents as $event): ?>
        <tr>
            <td>
                <em><?= $event->getDate() ?></em>
            </td>
            <td>
                <?php if ($event->getUrl()): ?>
                    <a href="<?= $event->getUrl() ?>"><strong><?= $event->getTitle() ?></strong></a>
                <?php else: ?>
                    <strong><?= $event->getTitle() ?></strong>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($event->getDescription()): ?>
                    <?= $event->getDescription() ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <thead>
    <tr>
        <th colspan="3" style="padding-top:30px;">Events in het verleden</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($pastEvents as $event): ?>
        <tr>
            <td>
                <em><?= $event->getDate() ?></em>
            </td>
            <td>
                <?php if ($event->getUrl()): ?>
                    <a href="<?= $event->getUrl() ?>"><strong><?= $event->getTitle() ?></strong></a>
                <?php else: ?>
                    <strong><?= $event->getTitle() ?></strong>
                <?php endif; ?>
            </td>
            <td>
                <?php if ($event->getDescription()): ?>
                    <?= $event->getDescription() ?>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
