<?php
require 'vendor/autoload.php';

include('routes.php');
$defaultRoute = $routes['default'];
$routeParts = explode('_', $defaultRoute);
$a = isset($_REQUEST['a'])?$_REQUEST['a']: $routeParts[0];
$e = isset($_REQUEST['e'])?$_REQUEST['e']: $routeParts[1];

if (!in_array($a.'_'.$e,$routes)) {
    // redirection 404
    die('ce que vous cherchez n\'est pas ici');
}

$controller_name = 'Controller\\' . ucfirst($e) . 'Controller';// Controller\BookController
$controller = new $controller_name();

$data = call_user_func([$controller,$a]);

include('views/view.php');
