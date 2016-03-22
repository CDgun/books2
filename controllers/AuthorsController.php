<?php
namespace Controller;

use \Model\Books;
use \Model\Authors;
use \Model\Editors;
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
        $view = 'index_authors.php';
        // $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

        return ['authors' => $authors, 'view' => $view,'page_title' => 'Le nom de l\'auteur &nbsp;'];
    }

    public function show(){
        if (isset($_GET['id'])) {
            $id = intval($_GET['id']);
            $author = $this->authors_model->find($id);

            $books = null;
            if (isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if (in_array('books',$with)) {
                    $books_model = new Books();
                    $books = $books_model->getBooksByAuthorId($author->id);
                }
            }
            $editors = null;
            if (isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if (in_array('editors',$with)) {
                    $editors_model = new Editors();
                    $editors = $editors_model->getEditorsByAuthorId($author->id);
                }
            }
            $view = 'show_authors.php';
            // $view = $GLOBALS['a'] . '_' . $GLOBALS['e'] . '.php';

            return ['author' => $author, 'view' => $view,'books' => $books,'editors' => $editors,'page_title' => 'La fiche de l\'auteur &nbsp;'];

        } else {
            die('Il manque l‘identifiant de votre auteur');
        };
    }
}
