<?php
set_include_path('../');
include('model/album.php');

$message = '';

if (isset($_POST['submit'])) {
    echo create_album($alb);
}

function create_album($alb)
{
    $name = "'" . htmlentities($_POST["name"]) . "',";
    $description = "'" . htmlentities($_POST["description"]) . "'";
    $alb->save_album($name, $description);
}

$getAlbum = $alb->get_album();
