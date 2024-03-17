<?php include '../controller/album.php' ?>
<!DOCTYPE html>

<head>
    <?php include("template/header.php"); ?>
    <title>Создать альбом</title>
</head>

<body>
    <?php include("template/header-menu.php"); ?>

    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item"><a href="/">Альбомы</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Создать альбом</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-6 border ps-2">
                    <form method="post">
                        <p style="font-weight: bold;"><?php echo $message; ?></p>
                        <p>Название:</p>
                        <p><input type="text" class="form-control" name="name" placeholder="Название альбома" maxlength="45" required></p>
                        <p>Описание:</p>
                        <p><textarea name="description" class="form-control" rows="3" wrap="soft" placeholder="Введите описание альбома" maxlength="255" required></textarea></p>
                        <p><input type="submit" class="form-control" value="Создать" name="submit"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>