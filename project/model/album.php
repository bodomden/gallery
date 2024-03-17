<?php
require_once 'dbcon.php';

class AlbumModel
{
    public $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function get_album()
    {
        $query = "SELECT * FROM album ORDER BY id ASC";
        $result = $this->db->query($query);
        $row = $result->fetch_all(MYSQLI_ASSOC);
        return $row;
    }

    public function album_name($album_id)
    {
        $query = "SELECT name FROM album WHERE id=" . $album_id;
        $result = $this->db->query($query);
        $name = $result->fetch_column();
        return $name;
    }

    public function save_album($name, $description)
    {
        global $message;
        if (!empty($name)) {
            $value = '(' . $name . $description . ')';
            $save_album_query = "INSERT INTO album (name, description) VALUES" . $value;
            $exec = $this->db->query($save_album_query);
            if ($exec) {
                $message = "Альбом создан";
            } else {
                $message = "Ошибка: " . $save_album_query . "<br>" . $this->db->error;
            }
        }
    }

    public function data_album($album_id)
    {
        $query = "SELECT * FROM album WHERE id=" . $album_id;
        $result = $this->db->query($query);
        $row = $result->fetch_assoc();
        return $row;
    }
}

$alb = new AlbumModel($db_con->db);
