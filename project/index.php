<?php include("controller/album.php"); ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("view/template/header.php"); ?>
    <title>Список альбомов</title>
</head>

<body>

    <?php include("view/template/header-menu.php"); ?>

    <div class="content">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item active" aria-current="page">Главная</li>
                </ol>
            </nav>
            <div class="row">
                <div class="col-md-6 ps-2">
                    <div class="list-group">
                        <?php
                        if (!empty($getAlbum)) {
                            foreach ($getAlbum as $album) {
                        ?>
                                <a href="view/album.php?album_id=<?php echo $album['id']; ?>" class="list-group-item list-group-item-action">
                                    <?php echo $album['name']; ?></a>
                        <?php
                            }
                        } else {
                            echo "Альбомы пока не созданы.";
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div>
                <p><a href="view/add_album.php" style="font-weight: bold;">Создать альбом</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>