<?php declare(strict_types=1);

use MageOsNl\Registry;

// Load social media links from JSON
$socialMediaData = json_decode(
    file_get_contents(Registry::getInstance()->getContentDirectory() . '/data/social-media.json'),
    true
);
?>
<div class="float-right pb-4">
    <div class="hidden md:flex content-end lg:pb-4">
        <?php foreach ($socialMediaData as $social): ?>
            <a href="<?= htmlspecialchars($social['url']) ?>"
               target="_blank"
               rel="noreferrer noopener"
               class="p-1 [&_svg]:size-6 [&_path]:fill-red hover:[&_path]:fill-blue"
               title="<?= htmlspecialchars($social['name']) ?>">
                <?php include __ROOT__ . '/resources/svg/' . $social['icon'] ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>
