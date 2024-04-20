<?php

class MainController extends Controller
{

	function __construct()
	{
		$this->view = new View();
	}

	function index()
	{
		$title = 'Main page';
		$desc = '';
		$this->view->render('main.php', compact('title', 'desc'));
	}
}
