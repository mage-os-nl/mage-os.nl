<?php declare(strict_types=1);

use MageOsNl\Website\ImageFactory;
use MageOsNl\Website\Router;

$page = (new Router)->getPage();
?>
<?php include_once __DIR__ . '/header/mmnl.php'; ?>
<?php //include_once __DIR__.'/header/wwvd.php'; ?>
<?php //include_once __DIR__.'/header/bbq.php'; ?>
<?php //include_once __DIR__.'/header/mageunconference.php'; ?>
<?php //include_once __DIR__.'/header/member-meeting.php'; ?>
<?php //include_once __DIR__.'/header/become-member.php'; ?>
<?php echo $page->getHtml(); ?>
