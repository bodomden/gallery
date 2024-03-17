<?php
include('../model/image.php');

$action = $_POST['action'];
$add = $_POST['add'];
$image_id = $_POST['image_id'];


$img->change_status($action, $add, $image_id);
