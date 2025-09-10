<?php
/** @var array $item */
/** @var \MageOsNl\Website\Event $event */

$event = $item['event'];
$firstOfGroupClasses = 'rounded-t-lg';
$lastOfGroupClasses = 'rounded-b-lg border-b-0 mb-8';

$classes = '';
$classes .= $item['first'] ? $firstOfGroupClasses . ' ' : '';
$classes .= $item['last'] ? $lastOfGroupClasses . ' ' : '';
$classes .= $event->isMainEvent() ? 'bg-yellow-50 hover:bg-yellow-100' : 'bg-white hover:bg-gray-50';
?>
<li class="<?= $classes ?> relative py-4 border-gray-100 border-b-1 xl:static -ml-2 pl-2 shadow-sm dark:divide-white/10 dark:bg-gray-800/50 dark:shadow-none dark:outline dark:-outline-offset-1 dark:outline-white/10">
    <div class="flex-auto prose">
        <h3 class="pr-10 font-semibold text-gray-900 xl:pr-0">
            <?php if ($event->getUrl()): ?>
                <a class="no-underline" href="<?= $event->getUrl() ?>"><strong><?= $event->getTitle() ?></strong></a>
            <?php else: ?>
                <strong><?= $event->getTitle() ?></strong>
            <?php endif; ?>
        </h3>
        <?php if ($event->getDescription()): ?>
            <div>
                <?= $event->getDescription() ?>
            </div>
        <?php endif; ?>
        <dl class="mt-2 flex flex-col text-gray-500 xl:flex-row">
            <div class="flex items-start gap-x-3">
                <dt class="mt-0.5">
                    <span class="sr-only">Date</span>
                    <svg class="size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="M5.75 2a.75.75 0 0 1 .75.75V4h7V2.75a.75.75 0 0 1 1.5 0V4h.25A2.75 2.75 0 0 1 18 6.75v8.5A2.75 2.75 0 0 1 15.25 18H4.75A2.75 2.75 0 0 1 2 15.25v-8.5A2.75 2.75 0 0 1 4.75 4H5V2.75A.75.75 0 0 1 5.75 2Zm-1 5.5c-.69 0-1.25.56-1.25 1.25v6.5c0 .69.56 1.25 1.25 1.25h10.5c.69 0 1.25-.56 1.25-1.25v-6.5c0-.69-.56-1.25-1.25-1.25H4.75Z" clip-rule="evenodd" />
                    </svg>
                </dt>
                <dd>
                    <time datetime="<?= $event->getTimestamp()->format('Y-m-d') ?>">
                        <?= $event->getFormattedDate() ?>
                        <?php if ($event->getTime()): ?>
                            <div class="ml-2 hidden xl:inline-block">
                                <svg class="size-5 mr-1 text-gray-400 inline-block" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                                </svg>

                                <?= $event->getTime() ?>
                            </div>
                        <?php endif; ?>
                    </time>
                </dd>
            </div>
            <?php if ($event->getTime()): ?>
                <div class="mt-2 flex items-start gap-x-3 xl:ml-3.5 xl:mt-0 xl:border-l xl:border-gray-400/50 xl:pl-3.5 xl:hidden">
                    <dt class="mt-0.5">
                        <span class="sr-only">Time</span>
                        <svg class="size-5 text-gray-400 inline-block" data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                        </svg>
                    </dt>
                    <dd class="mt-0.5">
                        <time datetime="<?= $event->getTimestamp()->format('Y-m-d') ?>">
                            <?= $event->getTime() ?>
                        </time>
                    </dd>
                </div>
            <?php endif; ?>
            <?php if ($event->getLocation()): ?>
            <div class="mt-2 flex items-start gap-x-3 xl:ml-3.5 xl:mt-0 xl:border-l xl:border-gray-400/50 xl:pl-3.5">
                <dt class="mt-0.5">
                    <span class="sr-only">Location</span>
                    <svg class="size-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                        <path fill-rule="evenodd" d="m9.69 18.933.003.001C9.89 19.02 10 19 10 19s.11.02.308-.066l.002-.001.006-.003.018-.008a5.741 5.741 0 0 0 .281-.14c.186-.096.446-.24.757-.433.62-.384 1.445-.966 2.274-1.765C15.302 14.988 17 12.493 17 9A7 7 0 1 0 3 9c0 3.492 1.698 5.988 3.355 7.584a13.731 13.731 0 0 0 2.273 1.765 11.842 11.842 0 0 0 .976.544l.062.029.018.008.006.003ZM10 11.25a2.25 2.25 0 1 0 0-4.5 2.25 2.25 0 0 0 0 4.5Z" clip-rule="evenodd" />
                    </svg>
                </dt>
                <dd>
                    <address>
                        <a class="underline" target="_blank" rel="noreferrer noopener" href="https://www.google.com/maps/search/?api=1&query=<?= urlencode($event->getAddress()) ?>"><?= $event->getLocation() ?></a>
                    </address>
                </dd>
            </div>
            <?php endif; ?>
            <div class="mt-2 flex items-start gap-x-3 xl:ml-3.5 xl:mt-0 xl:border-l xl:border-gray-400/50 xl:pl-3.5">
                <dt class="mt-0.5">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>
                </dt>
                <dd>
                    <a class="underline" target="_blank" rel="noreferrer noopener" href="<?= $event->getUrl() ?>">Event link</a>
                </dd>
            </div>
        </dl>
    </div>
</li>