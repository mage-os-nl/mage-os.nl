<?php declare(strict_types=1);

/**
 * Load banner configuration from JSON
 *
 * To activate a banner, set "active": true in content/data/banners.json
 * Only one banner should be active at a time.
 */

// Load banners from JSON
$bannersFile = dirname(__DIR__, 2) . '/content/data/banners.json';
if (!file_exists($bannersFile)) {
    return;
}

$banners = json_decode(file_get_contents($bannersFile), true);
if (!is_array($banners)) {
    return;
}

// Find the active banner
$activeBanner = null;
foreach ($banners as $banner) {
    if (isset($banner['active']) && $banner['active'] === true) {
        $activeBanner = $banner;
        break;
    }
}

if (!$activeBanner) {
    return;
}

// Build config array for banner.php
$config = [
    'id' => $activeBanner['banner_id'] ?? 'banner',
    'image' => $activeBanner['image'],
    'image_alt' => $activeBanner['image_alt'] ?? '',
];

// Add show/hide conditions
if (isset($activeBanner['show_on_pages']) && is_array($activeBanner['show_on_pages'])) {
    $config['show_condition'] = fn() => in_array($_SERVER['REQUEST_URI'], $activeBanner['show_on_pages']);
} elseif (isset($activeBanner['hide_on_pages']) && is_array($activeBanner['hide_on_pages'])) {
    $config['show_condition'] = function() use ($activeBanner) {
        foreach ($activeBanner['hide_on_pages'] as $page) {
            if (str_contains($_SERVER['REQUEST_URI'], $page)) {
                return false;
            }
        }
        return true;
    };
}

// Add button target if specified
if (isset($activeBanner['button_target'])) {
    $config['button_target'] = $activeBanner['button_target'];
}

// Add content
$config['title'] = $activeBanner['title'];
if (isset($activeBanner['tagline'])) {
    $config['tagline'] = $activeBanner['tagline'];
}
if (isset($activeBanner['details'])) {
    $config['details'] = $activeBanner['details'];
}
if (isset($activeBanner['button_url'])) {
    $config['button_url'] = $activeBanner['button_url'];
}
if (isset($activeBanner['button_text'])) {
    $config['button_text'] = $activeBanner['button_text'];
}

// Include the generic banner template
include_once __DIR__ . '/banner.php';