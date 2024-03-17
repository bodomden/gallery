<?php
require_once 'dbcon.php';

class ImageModel
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function save_image($name, $title, $description, $album_id)
    {
        global $message;

        if (!empty($name)) {
            $value = '(' . $name . $title . $description . $album_id . ')';
            $save_image_query = "INSERT INTO image (name, title, description, album_id) VALUES" . $value;
            $exec = $this->db->query($save_image_query);
            if ($exec) {
                $message = "Изображение успешно загружено";
            } else {
                $message = "Ошибка: " . $save_image_query . "<br>" . $this->db->error;
            }
        }
    }

    public function get_image($album_id)
    {
        $query = "SELECT * FROM image WHERE album_id=" . $album_id . " ORDER BY id DESC";
        $result = $this->db->query($query);
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }

    public function change_status($action, $add, $image_id)
    {
        $query = "UPDATE image as i SET i." . $action . " = i." . $action . " + " . $add . " WHERE id=" . $image_id;
        $this->db->query($query);
    }
}

$img = new ImageModel($db_con->db);
