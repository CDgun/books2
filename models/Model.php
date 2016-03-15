<?php

/**
 *
 */
class Model
{

    public function all()
    {
        $sql = sprintf('SELECT * FROM %s',$this->table);
        $pdoSt = $GLOBALS['cn']->query($sql);

        return $pdoSt->fetchAll();
    }
    public function find($id)
    {
        $sql = sprintf('SELECT * FROM %s WHERE id = :id',$this->table);
        $pdoSt = $GLOBALS['cn']->prepare($sql);
        $pdoSt->execute([':id' => $id]);
        return $pdoSt->fetch();
    }
}
