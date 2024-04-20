<?php
class View
{
    public $template = 'layout.php';

    protected function breadcrumbs($name = null)
    {

        $paths = explode("/", $_SERVER["REQUEST_URI"]);
        $paths[0] = 'main';
        $paths = array_flip($paths);
        $prefix = '';
        $breads = [];
        foreach ($paths as $key => $value) {
            if ($key == 'show') {
                continue;
            }
            $paths[$key] = match ($key) {
                'main' => $prefix . '/',
                default => $prefix . $key . '/',
            };
            $prefix = $paths[$key];
            if (preg_match("/\d+/", $key)) {
                $breads[$name] = $paths[$key] . 'show/';
                continue;
            }
            $breads[$key] = $paths[$key];
        }

        return $breads;
    }

    public function render($content, $data = null, $name = null)
    {
        if (is_array($data)) {
            extract($data);
        }

        $breads = $this->breadcrumbs($name);

        include 'app/views/' . $this->template;
    }
}
