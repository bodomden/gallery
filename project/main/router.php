<?php
#[\AllowDynamicProperties]
class Router
{
	private $request;

	function __construct(Request $request)
	{
		$this->request = $request;
	}

	function __call($method, $args)
	{
		$this->{$method}[] = new Route(...$args);
	}

	private function notFound()
	{
		$host = 'http://' . $this->request->http_host . '/';
		header("{$this->request->server_protocol} 404 Not Found");
		header("Status: 404 Not Found");
		header('Location:' . $host . '404.php');
	}

	function resolve()
	{
		$methodRoutes = $this->{strtolower($this->request->request_method)};
		foreach ($methodRoutes as $route) {
			if ($route->allowed($this->request)) {
				return $route->run($this->request);
			}
		}
		return $this->notFound();
	}

	function __destruct()
	{
		$this->resolve();
	}
}
