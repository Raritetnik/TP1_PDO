<?php
require_once("connex/Crud.php");
class ClassCommande{

    private $crud;
    function __construct($crud) {
        $this->crud = $crud;
    }

    public function index(){
        $view = new View('commande','commande-index');

        $data = $this->crud->selectWith3Tables('Commande',
        "Livre", "id", "Commande","Livre_id",
        "Facture", "id", "Commande","Facture_id",
        'Membre', 'id', 'Facture', 'Membre_id',
        'quantite');
        $view->output("commandes", $data);
    }
    public function error(){
        $view = new View('home','home-error');
    }

    /**
     * Creation d'une donnée de livre
     */
    public function create(){
        $view = new View('commande','commande-create');
        $optionsLivres = $this->crud->select('Livre');
        $optionsFactures = $this->crud->selectWith1Table('Facture', 'Membre', 'Membre_id');
        $view->output('livres', $optionsLivres);
        $view->output('factures', $optionsFactures);

    }
    public function save() {
        $data = $_POST;
        $this->crud->insert('Commande', $data);

        header("Location: ../commande");
    }
    /**
     * Modifier la donnée du commande
     */
    public function modifier(){
        $Livre_id = $_GET['Livre_id'];
        $Facture_id = $_GET['Facture_id'];
        if(!(isset($Livre_id) && isset($Facture_id))) {
            header("Location: ../commande");
        }
        $view = new View('commande','commande-modifier');
        $commande = $this->crud->selectIds('Commande', $Livre_id, 'Livre_id', $Facture_id, 'Facture_id');
        $view->output("commande", $commande);

        $optionsLivres = $this->crud->select('livre');
        $optionsFactures = $this->crud->selectWith1Table('Facture', 'Membre', 'Membre_id');
        $view->output('livres', $optionsLivres);
        $view->output('factures', $optionsFactures);
    }
    public function update() {
        $data = $_POST;
        $this->crud->updateIds('Commande', $data, $data['Livre_id'], "Livre_id", $data['Facture_id'], "Facture_id");

        header("Location: ../commande");
    }

    /**
     * Supprimer la donnée de commande
     */
    function delete() {
        $id = $_GET['id'];
        $this->crud->delete('Commande', intval($id));

        header("Location: ../commande");
    }
}
?>