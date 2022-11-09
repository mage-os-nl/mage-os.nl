<?php declare(strict_types=1);

use Michelf\Markdown;
?>
<main class="prose max-w-none">
    <?php echo Markdown::defaultTransform(file_get_contents(__DIR__.'/../content/home.md')); ?>
</main>

<footer class="pb-8">
    <hr/>
    <p class="pt-8 text-sm text-gray-400 clear-both">Magento™ is a registered trademark of Adobe Inc. Mage-OS is not affiliated with Adobe or Magento Open Source in any way.</p>
</footer>