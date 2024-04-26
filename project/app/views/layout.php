<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://libs.cdnjs.net/font-awesome/6.5.1/css/all.css">
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="shortcut icon" href="/assets/img/favicon.ico">
    <title><?php echo $title; ?></title>
</head>

<body>
    <div class="header-menu">
        <nav class="navbar navbar-expand-lg bg-dark" data-bs-theme="dark">
            <div class="container-fluid">
                <a class="navbar-brand header-logo ms-5" href="/">ALBUMS</a>
            </div>
        </nav>
    </div>
    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item"><a href="/">Main</a></li>
                    <?php
                    foreach ($breads as $bread => $link) { ?>
                        <li class="breadcrumb-item"><a href="<?php echo rtrim($link, '/'); ?>"><?php echo ucfirst($bread); ?></a></li>
                    <?php } ?>
                </ol>
            </nav>
            <div class="text-center">
                <div class=" row">
                    <h1><?php echo $title; ?></h1>
                </div>
                <div class="row">
                    <h2><?php echo $desc; ?></h2>
                </div>
            </div>
            <?php include 'app/views/' . $content; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>