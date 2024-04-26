<?php
#[\AllowDynamicProperties]
class Request
{
    public function __construct()
    {
        $this->getParams();
    }

    private function getParams()
    {
        foreach ($_SERVER as $key => $value) {
            $this->{strtolower($key)} = $value;
        }
        if (isset($_POST['_method'])) {
            $this->request_method = $_POST['_method'];
        }
        $this->request_uri = ltrim($this->request_uri, '/');
    }

    public function getBody()
    {
        $body = [];
        $methods = ['POST', 'PUT', 'PATCH'];

        if (in_array($this->request_method, $methods)) {
            $body = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
        }
        return $body;
    }
}
