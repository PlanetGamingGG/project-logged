<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?= __(Page::param('title')) ?> | <?= config('branding.name') ?></title>
    <link rel="icon" href="<?= config('branding.favicon') ?>" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="assets/style.css" rel="stylesheet">
    <link href="assets/colors.css" rel="stylesheet">
</head>

<body class="login-page pg_bg-<?= config('branding.background_color') ?>" <?= (in_array(Page::param('file', null, true), ['signup.php', 'privacy.php', 'tos.php'])) ? ' style="max-width: 490px"' : '' ?>>
    <?php if(SYSTEM_CONFIG['development_mode']) { ?>
    <div class="alert alert-warning">
        <b>DEVELOPMENT MODE IS ON!</b><br>Reduced performance and exposing critical information.
    </div>
    <?php } ?>
    <div class="overlay">
        <div class="overlay__inner">
            <div class="overlay__content"><span class="spinner"></span></div>
        </div>
    </div>
    <div class="login-box">
        <div class="logo">
            <?= (config('branding.logo_type') == 'text')
                ? '<a style="font-weight:800;" href="' . config('branding.main_website') . '">' . config('branding.name') . '</a>'
                : '<p style="text-align:center;"><img src="' . config('branding.logo') . '" alt="' . config('branding.name') . ' logo"/></p>' ?>
            <small><?= config('branding.slogan') ?></small>
        </div>
        <div class="card">
            <?php
            require Page::param('file');
            ?>
        </div>
    </div>
    <script src="assets/dist/material.js"></script>
    <?php
    $scripts = Page::getScripts();
    foreach ($scripts as $script) {
        echo '<script src="assets/' . $script . '"></script>' . PHP_EOL;
    }
    unset($scripts);
    ?>
    <script>
        <?php
        echo 'var translations = ' . json_encode(Page::getTranslations()) . ';' . PHP_EOL;
        ?>
    </script>
</body>

</html>