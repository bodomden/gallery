<?php

class AlbumController extends Controller
{
	public function index()
	{
		$data = $this->model->get_all();
		$title = 'Album list';
		$desc = 'All user\'s albums';
		$this->view->render('albums/index.php', compact('data', 'title', 'desc'));
	}

	public function create()
	{
		$title = 'Create a new album';
		$desc = 'Set parameters of a new album';
		$this->view->render('albums/create.php', compact('title', 'desc'));
	}

	public function store($data)
	{
		$this->model->create($data);

		header('Location: /album');
	}

	public function show($id)
	{

		$album = $this->model->find($id);
		$title = $album->name;
		$desc = $album->description;
		$images = $this->model->hasMany('image', $id);
		$name = $album->name;

		$this->view->render('albums/album.php', compact('images', 'title', 'desc', 'id', 'name'));
	}

	public function edit($id)
	{
		$title = 'Edit album';
		$desc = 'Editing album settings';
		$album = $this->model->find($id);
		$name = $album->name;
		$this->view->render('albums/edit.php', compact('album', 'title', 'desc', 'name'));
	}

	public function update($data, $id)
	{
		unset($data['_method']);
		$data['id'] = $id;
		$this->model->update($data);

		header("Location: /album/$id");
	}

	public function delete($id)
	{
		$this->model->delete($id);

		header("Location: /album");
	}

	public function addImage($album_id)
	{
		$title = 'Add a new image';
		$desc = 'Set parameters of a new image';
		$album = $this->model->find($album_id);
		$name = $album->name;

		$this->view->render('image/create.php', compact('album_id', 'title', 'desc', 'name'));
	}
}
