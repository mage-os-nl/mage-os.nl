<?php declare(strict_types=1);

use MageOsNl\Website\BlogProvider;

$blogs = (new BlogProvider())->getBlogs();
?>
<h1>Nieuws</h1>

<?php foreach ($blogs as $blog): ?>
<h2><?= $blog->getTitle() ?></h2>
<p><em><?= $blog->getDate() ?></em></p>
<?= $blog->getIntro() ?>
<a class="p-2 text-white bg-orange-600" href="/blog/<?= $blog->getId() ?>">Lees meer</a>
<?php endforeach; ?>
