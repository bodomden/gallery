<?php
class Route
{
    public $uri;
    public $controller;
    public $action;
    public $id;

    function __construct($uri, $controller, $action)
    {
        $this->uri = $uri;
        $this->controller = $controller;
        $this->action = $action;
        $this->id = '';
    }

    public function parseId($uri)
    {
        if (preg_match("~.+\/(\d+)\/*.*~", $uri, $matches)) {
            $this->id = $matches[1];
            $uri = str_replace($this->id, '{id}', $uri);
        }
        return $uri;
    }

    function allowed($request)
    {
        $requestUri = $this->parseId($request->request_uri);
        if ($requestUri === $this->uri) {
            return True;
        }
    }

    public function run($request)
    {
        $controller = ucfirst($this->controller) . 'Controller';
        $controller_file = strtolower($controller) . '.php';
        include_once $_SERVER['DOCUMENT_ROOT'] . "/app/controllers/" . $controller_file;

        $controller = new $controller;

        $args = [$request->getBody(), $this->id];
        $args = array_filter($args, function ($var) {
            return $var;
        });
        call_user_func_array([$controller, "$this->action"], $args);
    }
}
