<?php declare(strict_types=1);

use MageOsNl\Website\EventProvider;

$upcomingEvents = (new EventProvider())->getUpcomingEvents();
$pastEvents = (new EventProvider())->getPastEvents();
?>
<h2>Aankomende events</h2>

<div class="not-prose">
    <ol class="m-0 p-0 divide-y divide-gray-100 text-sm/6 lg:col-span-7 xl:col-span-8">
        <?php foreach ($upcomingEvents as $event): ?>
            <?php require __DIR__ . '/agenda-item.php'; ?>
        <?php endforeach; ?>
    </ol>
</div>


<button id="past-events-toggler" class="cursor-pointer underline" onClick="togglePastEvents()">Toon events in het verleden</button>
<div id="past-events" class="hidden">
    <h2 class="mt-8">Events in het verleden</h2>

    <div class="not-prose">
        <ol class="m-0 p-0 divide-y divide-gray-100 text-sm/6 lg:col-span-7 xl:col-span-8">
            <?php foreach ($pastEvents as $event): ?>
                <?php require __DIR__ . '/agenda-item.php'; ?>
            <?php endforeach; ?>
        </ol>
    </div>
</div>

<script>
function togglePastEvents() {
    const container = document.getElementById('past-events');

    container.classList.toggle('hidden');
}
</script>