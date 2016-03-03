<?php
$viewsDir = __DIR__ . '/views';
$modelsDir = __DIR__. '/models';
$controllersDir = __DIR__. '/controllers';
set_include_path($viewsDir . PATH_SEPARATOR . $modelsDir . PATH_SEPARATOR . $controllersDir . PATH_SEPARATOR .get_include_path());

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

$a = isset($_REQUEST['a'])?$_REQUEST['a']:'index';
$e = isset($_REQUEST['e'])?$_REQUEST['e']:'books';

include($e . 'controller.php');

$data = call_user_func($a);


include('view.php');
