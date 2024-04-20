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
        $model_file = "app/models/" . strtolower($model_name) . '.php';
        if (file_exists($model_file)) {
            include $model_file;
        } else {
            return;
        }
        $this->model = new $model_name();
    }

    function index()
    {
    }
}
