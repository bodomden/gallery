<?php

class ImageController extends Controller
{
    public function __construct()
    {
        $this->model = new ImageModel();
        $this->view = new View();
    }

    public function status()
    {
        $this->model->status(...$_POST);
    }

    public function create()
    {
        $title = 'Add a new image';
        $desc = 'Set parameters of a new image';
        $this->view->render('image/create.php', compact('title', 'desc'));
    }

    public function store($data)
    {
        $this->model->create($data);
    }
}
