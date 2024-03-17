<?php

class DBConnect
{
    public $db;

    public function __construct()
    {
        set_include_path('../');
        $db_param = require 'db_config.php';
        $this->db = new mysqli($db_param['HOSTNAME'], $db_param['USERNAME'], $db_param['PASSWORD'], $db_param['DATABASE']);
        $this->db->set_charset("utf8");
    }
}

$db_con = new DBConnect();
