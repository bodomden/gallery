<?php
class Controller
{
    public $model;
    public $view;

    function __construct()
    {
        $this->view = new View();
        $this->loadModel();
    }

    private function loadModel()
    {
        $model_name = str_replace('Controller', 'Model', get_class($this));
        $model_file =  $_SERVER['DOCUMENT_ROOT'] . "/app/models/" . strtolower($model_name) . '.php';
        if (file_exists($model_file)) {
            include_once $model_file;
        } else {
            return;
        }
        $this->model = new $model_name();
    }
}
