<?php
require_once("connex/Crud.php");
class ClassLivre{
    private $crud;
    function __construct($crud) {
        $this->crud = $crud;
    }

    public function index(){

        $view = new View('livre','livre-index');
        $view->output("livres", $this->crud->select('livre'));
    }
    public function error(){
        $view = new View('home','home-error');
    }
    /**
     * Creation d'une donnée de livre
     */
    public function create(){
        $view = new View('livre','livre-create');
        $optionsCategories = $this->crud->select('categorie');
        $optionsEditeur = $this->crud->select('editeur');
        $view->output('categories', $optionsCategories);
        $view->output('editeurs', $optionsEditeur);
    }
    public function save() {
        $data = $_POST;
        $this->crud->insert('livre', $data);

        header("Location: ../livre");
    }
    /**
     * Modifier la donnée du livre
     */
    public function modifier(){
        $id = $_GET['id'];
        if(!isset($id)) {
            header("Location: ../livre");
        }
        $view = new View('livre','livre-modifier');
        $livre = $this->crud->selectId('livre', $id, 'id');
        $view->output("livre", $livre);

        $optionsCategories = $this->crud->select('categorie');
        $optionsEditeur = $this->crud->select('editeur');
        $view->output('categories', $optionsCategories);
        $view->output('editeurs', $optionsEditeur);
    }
    public function update() {
        $data = $_POST;
        $id = $_GET['id'];
        $this->crud->update('livre', $data, $id);

        header("Location: ../livre");
    }

    /**
     * Supprimer la donnée de livre
     */
    function delete() {
        $id = $_GET['id'];
        $this->crud->delete('livre', intval($id));

        header("Location: ../livre");
    }

}
?>