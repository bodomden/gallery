<?php include('../controller/image.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("template/header.php"); ?>
    <title>Новое изображение</title>
</head>

<body>
    <?php include("template/header-menu.php"); ?>

    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item"><a href="/">Альбомы</a></li>
                    <li class="breadcrumb-item active"><a href="/view/album.php?album_id=<?php echo $album_id; ?>"><?php echo $album_name; ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page">Загрузить</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-6 border ps-2">
                    <form method="post" enctype="multipart/form-data">
                        <p style="font-weight: bold;"><?php echo $message; ?></p>
                        <p><input type="file" class="form-control" name="upload" required></p>
                        <p>Название:</p>
                        <p><input type="text" class="form-control" name="title" placeholder="Введите название" maxlength="45" required></p>
                        <p>Описание:</p>
                        <p><textarea name="description" class="form-control" rows="3" wrap="soft" placeholder="Введите описание" maxlength="255" required></textarea></p>
                        <p><input type="submit" class="form-control" value="Загрузить" name="submit"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>