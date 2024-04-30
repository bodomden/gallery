<?php
class View
{
    public $template = 'layout.php';

    protected function breadcrumbs($name = null)
    {

        $paths = explode("/", ltrim($_SERVER["REQUEST_URI"], '/'));
        $paths = array_flip($paths);
        $prefix = '/';
        $breads = [];
        foreach ($paths as $key => $value) {
            $paths[$key] = $prefix . $key . '/';
            $prefix = $paths[$key];
            if (preg_match("/\d+/", $key)) {
                $breads[$name] = $paths[$key];
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

        include_once $_SERVER['DOCUMENT_ROOT'] . '/app/views/' . $this->template;
    }
}
