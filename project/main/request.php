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
        $this->request_uri = ltrim($this->request_uri, '/');
    }

    public function getBody()
    {
        $body = [];
        if ($this->request_method == "POST") {
            $body = filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS);
            return $body;
        }
    }
}
