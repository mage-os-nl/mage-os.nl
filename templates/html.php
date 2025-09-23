<?php
$baseUrl = (isset($_SERVER['HTTPS']) ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'];
?>

<!DOCTYPE HTML>
<html>
<head>
    <title><?= __('Mage-OS Netherlands') ?></title>
    <meta charset="utf-8"/>
    <meta name="description" content="<?= __('Assocation for the Dutch Magento community') ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="<?= __('Mage-OS Netherlands') ?>"/>
    <meta property="og:description" content="<?= __('Assocation for the Dutch Magento community') ?>"/>
    <meta property="og:image" content="<?= $baseUrl ?>/images/mage-os-nl-logo.png"/>
    <meta property="og:type" content="website"/>
    <?php if (isset($_GET['language']) && $_GET['language'] === 'en'): ?>
        <meta property="og:locale" content="en_GB"/>
    <?php else: ?>
        <meta property="og:locale" content="nl_NL"/>
    <?php endif; ?>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:site" content="@mage_os_nl"/>
    <meta name="twitter:title" content="<?= __('Mage-OS Netherlands') ?>"/>
    <meta name="twitter:description" content="<?= __('Assocation for the Dutch Magento community') ?>"/>
    <meta name="twitter:image" content="<?= $baseUrl ?>/images/mage-os-nl-logo.png"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/style.css?v=<?= md5_file(__DIR__.'/../pub/style.css') ?>">

    <link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="Mage-OS NL" />
    <link rel="manifest" href="/site.webmanifest" />

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white text-black font-sans antialiased">
<?php include_once __DIR__.'/header.php'; ?>
<?php include_once __DIR__.'/content.php'; ?>
<?php include_once __DIR__.'/footer.php'; ?>
</body>
</html>
