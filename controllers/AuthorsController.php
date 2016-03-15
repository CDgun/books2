<?php

/**
 *
 */
class AuthorsController
{
    private $authors_model = null;

    public function __construct()
    {
        $this->authors_model = new Authors();
    }
    public function index(){
        $authors = $this->authors_model->all();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['authors' => $authors, 'view' => $view];
    }

    public function show(){
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $author = $this->authors_model->find($id);
            $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

            return ['author' => $author, 'view' => $view];

        } else {
            die('Il manque l‘identifiant de votre auteur');
        };
    }

}
