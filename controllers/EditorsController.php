<?php
namespace Controller;
use \Model\Books;
use \Model\Authors;
use \Model\Editors;
/**
 *
 */
class EditorsController
{
    private $editors_model = null;

    public function __construct(){
        $this->editors_model = new Editors();
    }

    public function index(){
        $editors=$this->editors_model->all();
        $view='index_editors.php';
        // $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
        return['editors'=>$editors,'view'=>$view,'page_title' => 'Le nom de l\'editeur &nbsp;'];
    }
    public function show(){
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $editor = $this->editors_model->find($id);

            $books = null;
            if (isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if (in_array('books',$with)) {
                    $books_model = new Books();
                    $books = $books_model->getBooksByEditorId($editor->id);
                }
            }
            $authors = null;
            if (isset($_GET['with'])) {
                $with = explode(',', $_GET['with']);
                if (in_array('authors',$with)) {
                    $authors_model = new Authors();
                    $authors = $authors_model->getAuthorsByEditorId($editor->id);
                }
            }

            $view='show_editors.php';
            // $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
            return['editor'=>$editor,'view'=>$view,'books' => $books,'authors' => $authors,'page_title' => 'La fiche du l\'editeur &nbsp;'];
        }else {
            die('il manque un identifiant a votre éditeur');
        }
    }

}
