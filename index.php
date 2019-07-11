<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

use library\Url;
use library\HttpException;
use library\Helpers;

function __autoload($className)
{
	$fileName = 'core/' . str_replace('\\', '/', $className) . '.class.php';

	if (!file_exists($fileName)) {
		throw new Exception("Class ".$fileName." not found!");
	}
	require_once $fileName;
}

$controllerName = Url::getSegment(0);
$actionName = Url::getSegment(1);

if (is_null($controllerName) || $controllerName == '') {
	$controller = 'controllers\ControllerMain';
} else {
	$controller = 'controllers\Controller' . ucfirst($controllerName);
}

if (is_null($actionName) || $actionName == '') {
	$action = 'actionIndex';
} else {
	$action = 'action' . ucfirst($actionName);
}

try {
	$fileName = 'core/' . str_replace('\\', '/', $controller) . '.class.php';

	if (!file_exists($fileName)) {
		throw new HttpException("Controller not found!", '404');
	}
	$controller = new $controller(Url::getRequest());

	if (!method_exists($controller, $action)) {
		throw new HttpException("Action not Found", '404');
	}
	$controller->$action();
} catch (HttpException $e) {
	header("HTTP/1.1 " . $e->getCode() . " " . $e->getMessage());
	die("Page not found");
} catch (Exception $e) {
	die($e->getMessage());
}
