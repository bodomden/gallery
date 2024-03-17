<?php
include('../model/album.php');
include('../model/image.php');

$album_id = $_GET['album_id'];
$getImage = $img->get_image($album_id);
$dataAlbum = $alb->data_album($album_id);
