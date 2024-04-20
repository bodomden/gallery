<?php

class DBcon
{
    protected static $instance = null;

    final protected function __construct()
    {
    }
    final protected function __clone()
    {
    }

    public static function instance()
    {
        if (self::$instance === null) {
            require_once './db_config.php';
            $dsn = "mysql:host=$db_host;dbname=$db_name;charset=UTF8";
            self::$instance = new PDO($dsn, $db_user, $db_pass);
        }
        return self::$instance;
    }
    public static function __callStatic($method, $args)
    {
        $callback = array(self::instance(), $method);
        return call_user_func_array($callback, $args);
    }
}
