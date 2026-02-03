<?php declare(strict_types=1);

/**
 * Load banner configuration from JSON
 *
 * Banner selection logic:
 * 1. Load events from events.json and find future events with a banner_id
 * 2. Find the matching banner configuration from banners.json
 * 3. Use the event's timestamp to determine if it's in the future
 * 4. The first future event (sorted by date) with a banner_id will be shown
 * 5. If no future events exist, fall back to become-member banner
 */

// Load events from JSON
$eventsFile = dirname(__DIR__, 2) . '/content/data/events.json';
$bannersFile = dirname(__DIR__, 2) . '/content/data/banners.json';

if (!file_exists($eventsFile) || !file_exists($bannersFile)) {
    return;
}

$events = json_decode(file_get_contents($eventsFile), true);
$banners = json_decode(file_get_contents($bannersFile), true);

if (!is_array($events) || !is_array($banners)) {
    return;
}

$today = date('Y-m-d');

// Create a map of banner_id => banner config
$bannerMap = [];
foreach ($banners as $banner) {
    if (isset($banner['id'])) {
        $bannerMap[$banner['id']] = $banner;
    }
}

// Find future events with banner_id (within 6 months)
$futureEventBanners = [];
$sixMonthsFromNow = date('Y-m-d', strtotime('+6 months'));

foreach ($events as $event) {
    if (isset($event['banner_id']) && isset($event['timestamp'])) {
        // For multi-day events, use the end date if available
        $endDate = $event['timestamp_end'] ?? $event['timestamp'];

        // Only include future events that are within 6 months
        // Event is "future" if its end date hasn't passed yet
        if ($endDate >= $today && $event['timestamp'] <= $sixMonthsFromNow && isset($bannerMap[$event['banner_id']])) {
            $futureEventBanners[] = [
                'event' => $event,
                'banner' => $bannerMap[$event['banner_id']]
            ];
        }
    }
}

// Sort by event timestamp (earliest first)
usort($futureEventBanners, function($a, $b) {
    return strcmp($a['event']['timestamp'], $b['event']['timestamp']);
});

// Find become-member banner as fallback
$becomeMemberBanner = null;
foreach ($banners as $banner) {
    if (isset($banner['id']) && $banner['id'] === 'become-member') {
        $becomeMemberBanner = $banner;
        break;
    }
}

// Priority: 1) first future event (within 6 months), 2) become-member banner
$activeEvent = null;
if (!empty($futureEventBanners)) {
    $activeBanner = $futureEventBanners[0]['banner'];
    $activeEvent = $futureEventBanners[0]['event'];
} elseif ($becomeMemberBanner) {
    $activeBanner = $becomeMemberBanner;
} else {
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

// Helper function to check if text contains outdated year
$currentYear = (int) date('Y');
$containsOutdatedYear = function(string $text) use ($currentYear): bool {
    // Find all 4-digit years in the text
    if (preg_match_all('/\b(20\d{2})\b/', $text, $matches)) {
        foreach ($matches[1] as $year) {
            $yearInt = (int) $year;
            // If we find a year that's older than current year, it's outdated
            if ($yearInt < $currentYear) {
                return true;
            }
        }
    }
    return false;
};

// Helper function to format event date
$formatEventDate = function(array $event): string {
    $timestamp = new \DateTimeImmutable($event['timestamp']);

    // If there's a custom date field (like "26-27 juni 2025"), use that
    if (isset($event['date']) && $event['date']) {
        return $event['date'];
    }

    // Otherwise format the timestamp
    $formatter = new \IntlDateFormatter('nl_NL', \IntlDateFormatter::FULL, \IntlDateFormatter::NONE);
    $formattedDate = $formatter->format($timestamp);

    // Add time if available
    if (isset($event['time']) && $event['time']) {
        $formattedDate .= '<br/>' . $event['time'];
    }

    // Add location if available
    if (isset($event['location']) && $event['location']) {
        $formattedDate .= '<br/>' . $event['location'];
    }

    return $formattedDate;
};

// Determine current language
$language = \MageOsNl\Website\Translation::getLanguage(); // 'nl' or 'en'

// Helper to get language-specific field
$getLocalizedField = function(array $banner, string $field) use ($language): ?string {
    // Try language-specific field first (e.g., 'title_nl' or 'title_en')
    $localizedField = $field . '_' . $language;
    if (isset($banner[$localizedField])) {
        return $banner[$localizedField];
    }

    // Fallback to non-localized field (backwards compatibility)
    if (isset($banner[$field])) {
        return $banner[$field];
    }

    return null;
};

// Replace {event_year} placeholder in title with actual year from event
$title = $getLocalizedField($activeBanner, 'title') ?? '';
if ($activeEvent) {
    $eventYear = (new \DateTimeImmutable($activeEvent['timestamp']))->format('Y');
    $title = str_replace('{event_year}', $eventYear, $title);
}
$config['title'] = $title;

// Tagline: use banner tagline if valid, otherwise use event date
$tagline = $getLocalizedField($activeBanner, 'tagline');
if ($tagline && !$containsOutdatedYear($tagline)) {
    $config['tagline'] = $tagline;
} elseif ($activeEvent) {
    $config['tagline'] = $formatEventDate($activeEvent);
}

// Details: use banner details if valid, otherwise skip (we already have tagline with date)
$details = $getLocalizedField($activeBanner, 'details');
if ($details && !$containsOutdatedYear($details)) {
    $config['details'] = $details;
}

// Button URL: use event URL, or language-specific banner URL
if ($activeEvent && isset($activeEvent['url'])) {
    $config['button_url'] = $activeEvent['url'];
} else {
    $config['button_url'] = $getLocalizedField($activeBanner, 'button_url') ?? '';
}

$buttonText = $getLocalizedField($activeBanner, 'button_text');
if ($buttonText) {
    $config['button_text'] = $buttonText;
}

// Include the generic banner template
include_once __DIR__ . '/banner.php';
