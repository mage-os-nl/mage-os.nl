<?php declare(strict_types=1);

use MageOsNl\Website\BlogProvider;

$blogs = (new BlogProvider())->getBlogs();
?>
<section class="bg-gray-100">
    <div class="mx-auto md:max-w-6xl px-4 xl:px-0 py-16 space-y-8">
        <h1 class="text-4xl text-center p-8"><?= __('Blog') ?></h1>

        <?php foreach ($blogs as $blog): ?>
            <div class="rounded-lg bg-white hover:bg-gray-50 relative py-4 border-gray-100 border-b-1 xl:static -ml-2 pl-2 shadow-sm">
                <h2 class="text-2xl py-4"><?= $blog->getTitle() ?></h2>
                <p class="italic text-zinc-500"><?= $blog->getDate() ?></p>
                <div class="mb-4">
                    <?= $blog->getIntro() ?>
                </div>
                <div class="mb-4">
                <a class="p-2 text-white bg-orange" href="/blog/<?= $blog->getId() ?>">
                    <?= __('Read more') ?>
                </a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>