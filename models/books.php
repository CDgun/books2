<?php

    function getBooks()
    {
        $sqlBooks = 'SELECT * FROM books';
        $pdoSt = $GLOBALS['cn']->query($sqlBooks);
        return $pdoSt->fetchAll();



    }

    function getBook($id)
    {
        $sqlBook = 'SELECT * FROM books WHERE id = :id';
        $pdoSt = $GLOBALS['cn']->prepare($sqlBook);
        $pdoSt->execute([':id' => $id]);
        return $pdoSt->fetch();
        

    }
