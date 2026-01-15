<?php
declare(strict_types=1);

use MageOsNl\Website\ImageFactory;

/**
 * Generic banner template
 *
 * Expected $config array structure:
 * [
 *     'id' => 'banner-id',                              // Banner HTML ID
 *     'image' => 'headers/image.jpg',                   // Image path
 *     'image_alt' => 'Alt text',                        // Image alt text
 *     'show_condition' => fn() => true,                 // Optional: Function to determine if banner should show
 *     'title' => 'Banner Title',                        // H2 title (can contain <br/> tags)
 *     'tagline' => 'Tagline text',                      // Optional: Tagline/description (can contain <br/> tags)
 *     'details' => 'Date/location details',             // Optional: Details like date/location (can contain <br/> tags)
 *     'button_url' => 'https://...',                    // Button URL
 *     'button_text' => 'Button text',                   // Button text
 *     'button_target' => '_blank',                      // Optional: Button target (default: _blank)
 * ]
 *
 * Styling is hardcoded:
 * - Container: bg-green px-8 py-16 rounded-xl
 * - Title: text-orange
 * - Tagline: text-blue
 * - Details: text-orange-400
 * - Button: button button-big button-orange
 */

if (!isset($config) || !is_array($config)) {
    return;
}

// Check show condition
if (isset($config['show_condition']) && is_callable($config['show_condition'])) {
    if (!$config['show_condition']()) {
        return;
    }
}

// Create image
$image = ImageFactory::create($config['image'], $config['image_alt'] ?? '');
$image->setCssClass('w-full h-full object-cover');

// Simple values
$bannerId = $config['id'] ?? 'banner';
$buttonTarget = $config['button_target'] ?? '_blank';
?>
<div class="py-8 md:py-32 relative" id="<?= htmlspecialchars($bannerId) ?>">
    <div class="absolute top-0 left-0 right-0 bottom-0">
        <?= $image ?>
    </div>
    <div class="relative flex items-center justify-center">
        <div class="text-center bg-green px-8 py-16 rounded-xl">
            <h2 class="text-1xl md:text-3xl sm:text-5xl text-orange font-extrabold uppercase text-center">
                <?= $config['title'] ?>
            </h2>
            <?php if (isset($config['tagline'])): ?>
                <h3 class="text-1xl md:text-2xl lg:text-4xl text-blue text-center pt-8">
                    <?= $config['tagline'] ?>
                </h3>
            <?php endif; ?>
            <?php if (isset($config['details'])): ?>
                <h3 class="text-1xl md:text-2xl lg:text-4xl text-orange-400 text-center pt-8">
                    <?= $config['details'] ?>
                </h3>
            <?php endif; ?>
            <?php if (isset($config['button_url']) && isset($config['button_text'])): ?>
                <div class="mt-12">
                    <a href="<?= htmlspecialchars($config['button_url']) ?>"
                       <?php if ($buttonTarget): ?>target="<?= htmlspecialchars($buttonTarget) ?>"<?php endif; ?>
                       class="button button-big button-orange">
                        <?= htmlspecialchars($config['button_text']) ?>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>