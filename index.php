<?php
$viewsDir = __DIR__ . '/views';
$modelsDir = __DIR__. '/models';
$controllersDir = __DIR__. '/controllers';
set_include_path($viewsDir . PATH_SEPARATOR . $modelsDir . PATH_SEPARATOR . $controllersDir . PATH_SEPARATOR .get_include_path());

spl_autoload_register(function($class){
    include($class.'.php');
});

$dbConfig = parse_ini_file('db.ini');
$pdoOptions = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
];

try {
    $dsn = sprintf('%s:dbname=%s;host=%s',$dbConfig['driver'],$dbConfig['dbname'],$dbConfig['host']);
    $cn = new PDO($dsn, $dbConfig['username'],$dbConfig['password'],$pdoOptions);
    $cn->exec('SET CHARACTER SET UTF8');
    $cn->exec('SET NAMES UTF8');
} catch (PDOException $exception) {
    //  redirection vers une page pour afficher une erreur relative à la connexion
    die($exception->getMessage());
}

include('routes.php');
$defaultRoute = $routes['default'];
$routeParts = explode('_', $defaultRoute);
$a = isset($_REQUEST['a'])?$_REQUEST['a']: $routeParts[0];
$e = isset($_REQUEST['e'])?$_REQUEST['e']: $routeParts[1];

if (!in_array($a.'_'.$e,$routes)) {
    // redirection 404
    die('ce que vous cherchez n\'est pas ici');
}

$controller_name = ucfirst($e) . 'Controller';
$controller = new $controller_name();

$data = call_user_func([$controller,$a]);

include('view.php');
