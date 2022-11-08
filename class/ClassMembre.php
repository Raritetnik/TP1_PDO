<?php
require_once("connex/Crud.php");
class ClassMembre{

    private $crud;
    function __construct($crud) {
        $this->crud = $crud;
    }

    public function index(){
        $view = new View('membre','membre-index');
        $view->output("membres", $this->crud->select('Membre'));
    }
    public function error(){
        $view = new View('home','home-error');
    }
    /**
     * Creation d'une donnée de livre
     */
    public function create(){
        $view = new View('membre','membre-create');
    }
    public function save() {
        $data = $_POST;
        $this->crud->insert('Membre', $data);

        header("Location: ../membre");
    }
    /**
     * Modifier la donnée du membre
     */
    public function modifier(){
        $id = $_GET['id'];
        if(!isset($id)) {
            $this->index();
        }
        $view = new View('membre','membre-modifier');
        $membre = $this->crud->selectId('Membre', $id, 'id');
        $view->output("membre", $membre);
    }
    public function update() {
        $data = $_POST;
        $id = $_GET['id'];
        $this->crud->update('Membre', $data, $id);

        header("Location: ../membre");
    }

    /**
     * Supprimer la donnée de membre
     */
    function delete() {
        $id = $_GET['id'];
        $this->crud->delete('Membre', intval($id));

        header("Location: ../membre");
    }
}
?>