<?php declare(strict_types=1);

use MageOsNl\Website\EventProvider;

$upcomingEvents = (new EventProvider())->getUpcomingEvents();
$pastEvents = (new EventProvider())->getPastEvents();
?>
<h2>Aankomende events</h2>
<table class="table">
    <thead>
    <tr>
        <th colspan="1" width="15%">Datum</th>
        <th colspan="1" width="25%">Event</th>
        <th colspan="1">Omschrijving</th>
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
                <address>
                    <a href="https://www.google.nl/maps/search/<?= urlencode($event->getLocation()) ?>"><?= $event->getLocation() ?></a>
                </address>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<button id="past-events-toggler" onClick="togglePastEvents()">Toon events in het verleden</button>
<div id="past-events" style="display:none">
<h2>Events in het verleden</h2>
<table class="table">
    <thead>
    <tr>
        <th colspan="1" width="15%">Datum</th>
        <th colspan="1" width="25%">Event</th>
        <th colspan="1">Omschrijving</th>
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
</div>

<script>
function togglePastEvents() {
    const container = document.getElementById('past-events');
    const toggler = document.getElementById('past-events-toggler');

    if (container.style.display === 'none') {
        container.style.display = 'block';
    } else {
        container.style.display = 'none';
    }

}
</script>