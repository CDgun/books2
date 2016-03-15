<?php

/**
 *
 */
class BooksController
{
    private $books_model = null;

    public function __construct()
    {
        $this->books_model = new Books();
    }
    public function index()
    {
        $books = $this->books_model->all();
        $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return['books' => $books, 'view' =>$view];

    }

    public function show()
    {
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $book = $this->books_model->find($id);
            $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';
            $page_title = 'La fiche du livre&nbsp;:' . $book->title;

            return['book' => $book, 'view' =>$view];
        }else {
            die('il manque l\'identifiant de votre livre');

        }
    }
}
