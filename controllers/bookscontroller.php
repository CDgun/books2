<?php
namespace Controller;

use \Model\Books;
use \Model\Authors;
use \Model\Editors;
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
        $view='index_books.php';
        // $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return['books' => $books, 'view' =>$view, 'page_title' => 'Le nom du livre&nbsp;'];

    }

    public function show()
    {
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $book = $this->books_model->find($id);

            $authors = null;
            if (isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if (in_array('authors',$with)) {
                    $authors_model = new Authors();
                    $authors = $authors_model->getAuthorsByBookId($book->id);
                }
            }
            $editors = null;
            if (isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if (in_array('editors',$with)) {
                    $editors_model = new Editors();
                    $editors = $editors_model->getEditorsByBookId($book->id);
                }
            }

            $view = 'show_books.php';
            // $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';
            // $page_title = 'La fiche du livre&nbsp;:' . $book->title;

            return['book' => $book, 'view' =>$view, 'authors' => $authors,'editors' => $editors,'page_title'=>'La fiche du livre&nbsp;'];
        }else {
            die('il manque l\'identifiant de votre livre');

        }
    }
}
