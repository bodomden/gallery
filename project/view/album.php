<?php include '../controller/album_images.php'; ?>
<!DOCTYPE html>
<html>

<head>
    <?php include("template/header.php"); ?>
    <title>Изображения из альбома <?php echo $dataAlbum['name']; ?></title>
</head>

<body onload="chekin()">
    <?php include("template/header-menu.php"); ?>

    <!-- Хлебные крошки -->
    <div class="content">
        <div class="container-fluid text-center">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mt-2">
                    <li class="breadcrumb-item"><a href="/">Альбомы</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $dataAlbum['name']; ?></li>
                </ol>
            </nav>
            <!-- Хлебные крошки -->

            <!-- Название и описание альбома -->
            <div class="row">
                <div class="col-md-12">
                    <h1><?php echo $dataAlbum['name']; ?></h1>
                    <h2><?php echo $dataAlbum['description']; ?></h2>
                </div>
            </div>
            <!-- Название и описание альбома -->
            <!-- Вывод изображений -->
            <br>
            <div class="row">
                <?php if (!empty($getImage)) {
                    foreach ($getImage as $img) { ?>
                        <div class="col-md-3 col-6 col-sm-4 col-lg-2">
                            <img src="/upload/<?php echo $img['name']; ?>" style="width:100%" class="hover-shadow cursor border-bottom border-2 pt-1 pb-1" data-bs-toggle="modal" data-bs-target="#bigModal">
                            <div class="row">
                                <ul id='123' class="info-icons d-flex justify-content-center mt-1 mb-0">
                                    <li><i class="fa-regular fa-thumbs-up ms-2 me-1" data-wht="<?php echo $img['id']; ?>" data-act="like" onclick="set(this)"></i><span><?php echo $img['like'] ?></span></li>
                                    <li><i class="fa-regular fa-thumbs-down ms-2 me-1" data-wht="<?php echo $img['id']; ?>" data-act="dislike" onclick="set(this)"></i><?php echo $img['dislike'] ?></li>
                                    <li><i class="fa-regular fa-comment-dots ms-2 me-1" data-wht="<?php echo $img['id']; ?>" data-act="comment" onclick="set(this)"></i><?php echo $img['comment'] ?></li>
                                </ul>
                                <p class="img-name"><?php echo $img['title'] ?></p>
                            </div>
                        </div>
                <?php }
                } else {
                    echo "Альбом пока пуст.";
                } ?>
            </div>
            <!-- Вывод изображений -->

            <!-- Модальное окно -->
            <div class="modal fade" id="bigModal" tabindex="-1" aria-labelledby="bigModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body">
                        </div>
                    </div>
                </div>
            </div>
            <script>
                const bigModal = document.getElementById('bigModal')
                if (bigModal) {
                    bigModal.addEventListener('show.bs.modal', event => {
                        const parent = event.relatedTarget
                        const img_name = parent.getAttribute('src')
                        const child = bigModal.querySelector('.modal-body')
                        child.innerHTML = `<img src="${img_name}" style="width:100%">`
                    })
                }
            </script>
            <!-- Модальное окно -->
            <div>
                <p><a href="add_image.php?id=<?php echo $album_id; ?>" style="font-weight: bold;">Добавить изображение</a></p>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="/assets/js/main.js"></script>
</body>

</html>