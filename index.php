<?php
$dbConfig = parse_ini_file('db.ini');

try {
    $dsn = sprintf('%s:dbname=%s;host=%s',$dbConfig['driver'],$dbConfig['dbname'],$dbConfig['host']);
    $cn = new PDO($dsn, $dbConfig['username'],$dbConfig['password']);
    $cn->exec('SET CHARACTER SET UTF8');
    $cn->exec('SET NAMES UTF8');
} catch (PDOException $exception) {
    //  redirection vers une page pour afficher une erreur relative à la connexion
    die($exception->getMessage());
}

$sqlBooks = 'SELECT * FROM books';
$pdoSt = $cn->query($sqlBooks);
$books = $pdoSt->fetchAll();
var_dump($books);
