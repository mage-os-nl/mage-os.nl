<?php declare(strict_types=1);

use Michelf\MarkdownExtra;
?>

<div class="float-right flex pb-3">
    <a href="https://twitter.com/mage_os_nl" class="p-1">
        <?php include __DIR__ . '/../resources/svg/twitter.svg' ?>
    </a>
    <a href="https://www.linkedin.com/company/mageos-nederland/" class="p-1">
        <?php include __DIR__ . '/../resources/svg/linkedin.svg' ?>
    </a>
</div>

<main class="prose max-w-none break-words">
    <?php echo MarkdownExtra::defaultTransform(file_get_contents(__DIR__.'/../content/home.md')); ?>
</main>

<footer class="pb-8">
    <hr/>
    <p class="pt-8 text-sm text-gray-400 clear-both">Mage OS Nederland - Vereniging - KvK 88186288 - <a href="https://github.com/yireo/mage-os.nl">GitHub source</a></p>
    <p class="pt-8 text-sm text-gray-400 clear-both">Magento™ is a registered trademark of Adobe Inc. Mage-OS is not affiliated with Adobe or Magento Open Source in any way.</p>
</footer>