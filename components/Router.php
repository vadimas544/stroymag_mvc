<?php

class Router
{
	private $routes;

	public function __construct()
	{
		$routesPath = ROOT.'/config/routes.php';
		$this->routes = include($routesPath);
	}

	/*
		Return request string
	*/
	public function getURI()
	{
		if(!empty($_SERVER['REQUEST_URI']))
		{
			return trim($_SERVER['REQUEST_URI'], '/');
		}	
	}

	public function run()
	{
		//Get request string
		$uri = $this->getURI();
		//echo $uri;
		
		//Check in routes and define controller and action
		foreach($this->routes as $uriPattern => $path){
			//echo $uriPattern .  $path;
			if(preg_match("~$uriPattern~", $uri))
			{
				$segments = explode('/', $path);
				$controllerName = array_shift($segments) . 'Controller';
				$controllerName = ucfirst($controllerName);
				echo $controllerName;

				$actionName = 'action' . ucfirst(array_shift($segments));

				echo $actionName; 

				//connect file controller class

				$controllerFile = ROOT."\\controllers\\" .$controllerName . '.php';
				//echo $controllerFile;
				if(file_exists($controllerFile))
				{
					include_once($controllerFile);
				}

				//Create object and call method
				
				$controllerObject = new $controllerName;
				$result = $controllerObject->$actionName();
				
				if($result != null){
					break;
				}
				

			}

		}
	}
}