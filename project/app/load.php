<?php
require_once 'main/request.php';
require_once 'main/router.php';
require_once 'main/route.php';
require_once 'main/dbcon.php';
require_once 'main/model.php';
require_once 'main/controller.php';
require_once 'main/view.php';

$router = new Router(new Request);

#album
$router->get('', 'main', 'index');
$router->get('album', 'album', 'index');
$router->get('album/create', 'album', 'create');
$router->post('album', 'album', 'store');
$router->get('album/{id}', 'album', 'show');
$router->get('album/{id}/edit', 'album', 'edit');
$router->put('album/{id}', 'album', 'update');
$router->delete('album/{id}', 'album', 'delete');
$router->get('album/{id}/add', 'album', 'addImage');

#image
$router->get('image/{id}', 'image', 'show');
$router->patch('image', 'image', 'status');
$router->post('image', 'image', 'store');

#comment
$router->post('comment', 'comment', 'store');
