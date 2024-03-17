<?php
include('../model/image.php');
include('../model/album.php');

$message = '';
$album_id = $_GET['id'];
$album_name = $alb->album_name($album_id);

if (isset($_POST['submit'])) {
    echo upload_image($album_id, $img);
}

function upload_image($album_id, $img)
{
    global $message;
    $uploadTo = "../upload/";
    $allowedImageType = array('bmp', 'jpeg', 'jpg', 'png', 'jpeg', 'gif');
    $imageName = $_FILES['upload']['name'];
    $imageTempName = $_FILES["upload"]["tmp_name"];

    if (empty($imageName)) {
        $message = "Пожалуйста, выберите изображение..";
        return;
    } else {
        $title = "'" . htmlentities($_POST["title"]) . "',";
        $description = "'" . htmlentities($_POST["description"]) . "',";

        $imgBasename = basename($imageName);
        $ImageType = pathinfo($imgBasename, PATHINFO_EXTENSION);
        $ImagePath = $uploadTo . $imgBasename;
        if (in_array($ImageType, $allowedImageType)) {

            if (move_uploaded_file($imageTempName, $ImagePath)) {
                $name = "'" . $imgBasename . "',";
            } else {
                $message = 'Ошибка загрузки.';
                return;
            }
        } else {
            $message = $_FILES['upload']['name'] . " - Файл не изображение.<br> ";
            return;
        }
        $img->save_image($name, $title, $description, $album_id);
    }
}
