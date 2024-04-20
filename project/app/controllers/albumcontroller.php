<?php

class AlbumController extends Controller
{
	/*public function __construct()
	{
		$this->model = new AlbumModel();
		$this->view = new View();
	}*/

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

		header('Location: /album/');
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

	public function update($id)
	{
		$data = $_POST;
		$data['id'] = $id;
		$this->model->update($data);

		header("Location: /album/$id/show/");
	}
}
