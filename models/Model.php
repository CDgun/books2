<?php

// récupère les données dans les bases de données
namespace Model;
/**
 *
 */
class Model
{
    protected $table ='';
    protected $cn;

    public function __construct(){
        $dbConfig = parse_ini_file('db.ini');
        $pdoOptions = [
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION
        ];

        try {
            $dsn = sprintf('%s:dbname=%s;host=%s',$dbConfig['driver'],$dbConfig['dbname'],$dbConfig['host']);
            $this->cn = new \PDO($dsn, $dbConfig['username'],$dbConfig['password'],$pdoOptions);
            $this->cn->exec('SET CHARACTER SET UTF8');
            $this->cn->exec('SET NAMES UTF8');
        } catch (\PDOException $exception) {
            //  redirection vers une page pour afficher une erreur relative à la connexion
            die($exception->getMessage());
        }
    }

    public function all()
    {
        $sql = sprintf('SELECT * FROM %s',$this->table);
        $pdoSt = $this->cn->query($sql);

        return $pdoSt->fetchAll();

    }
    public function find($id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id',$this->table);
        $pdoSt = $this->cn->prepare($sql);
        $pdoSt->execute([':id' => $id]);
        return $pdoSt->fetch();
    }
}
