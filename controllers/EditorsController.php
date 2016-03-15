<?php

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
        $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
        return['editors'=>$editors,'view'=>$view];
    }
    public function show(){
        if(isset($_GET['id'])){
            $id = intval($_GET['id']);
            $editor = $this->editors_model->find($id);
            $view = $GLOBALS['a'].'_'.$GLOBALS['e'].'.php';
            return['editor'=>$editor,'view'=>$view];
        }else {
            die('il manque un identifiant a votre éditeur');
        }
    }

}
