<?php declare(strict_types=1);

use MageOsNl\Website\BlogProvider;

$blogs = (new BlogProvider())->getBlogs();
?>
<h1>Nieuws</h1>

<?php foreach ($blogs as $blog): ?>
<h2><?= $blog->getTitle() ?></h2>
<p><em><?php echo $blog->getDate() ?></em></p>
<?php echo $blog->getContent() ?>
<?php endforeach; ?>
