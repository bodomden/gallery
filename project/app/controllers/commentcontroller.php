<?php

class CommentController extends Controller
{
    public function store($data)
    {
        $this->model->create($data);        
    }
}
