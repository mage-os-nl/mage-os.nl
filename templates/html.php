<?php
$baseUrl = ($_SERVER['HTTPS'] ? 'https' : 'http') . '//' . $_SERVER['HTTP_HOST'];
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Mage-OS Nederland</title>
    <meta charset="utf-8"/>
    <meta name="description" content="Vereniging voor de Nederlandse Magento community"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Mage-OS Nederland" />
    <meta property="og:description" content="Vereniging voor de Nederlandse Magento community" />
    <meta property="og:image" content="<?= $baseUrl ?>/images/mage-os-social.png" />
    <meta property="og:type" content="website" />
    <meta property="og:locale" content="nl_NL" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@mage_os_nl" />
    <meta name="twitter:title" content="Mage-OS Nederland" />
    <meta name="twitter:description" content="Vereniging voor de Nederlandse Magento community" />
    <meta name="twitter:image" content="<?= $baseUrl ?>/images/mage-os-social.png" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="/style.css?v=<?= md5_file(__DIR__.'/../pub/style.css') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="shortcut icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-white text-black font-sans antialiased">
<div class="mx-auto md:max-w-6xl px-4 xl:px-0">
    <?php include_once __DIR__ . '/header.php'; ?>
    <?php include_once __DIR__ . '/content.php'; ?>
</div>
</body>
</html>
