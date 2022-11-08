<?php
require_once("connex/Crud.php");
class ClassFacture{

    private $crud;
    function __construct($crud) {
        $this->crud = $crud;
    }

    public function index(){
        $view = new View('facture','facture-index');

        $data = $this->crud->selectWith3Tables('facture',
        'livraison', 'id', 'Facture', 'Livraison_id',
        'Paiement', 'id', 'Facture', 'Paiement_id',
        'Membre', 'id', 'Facture', 'Membre_id');
        $view->output("factures", $data);
    }
    public function error(){
        $view = new View('home','home-error');
    }
    /**
     * Creation d'une donnée de livre
     */
    public function create(){
        $view = new View('facture','facture-create');
        $optionsLivraisons = $this->crud->select('Livraison');
        $optionsPaiements = $this->crud->select('Paiement');
        $optionsMembres = $this->crud->select('Membre');
        $view->output('livraisons', $optionsLivraisons);
        $view->output('paiements', $optionsPaiements);
        $view->output('membres', $optionsMembres);
    }
    public function save() {
        $data = $_POST;
        $this->crud->insert('facture', $data);

        header("Location: ../facture");
    }
    /**
     * Modifier la donnée du livre
     */
    public function modifier(){
        $id = $_GET['id'];
        if(!isset($id)) {
            $this->index();
        }
        $view = new View('facture','facture-modifier');
        $facture = $this->crud->selectId('facture', $id);
        $view->output("facture", $facture);

        $optionsLivraisons = $this->crud->select('Livraison');
        $optionsPaiements = $this->crud->select('Paiement');
        $optionsMembres = $this->crud->select('Membre');
        $view->output('livraisons', $optionsLivraisons);
        $view->output('paiements', $optionsPaiements);
        $view->output('membres', $optionsMembres);
    }
    public function update() {
        $data = $_POST;
        $this->crud->update('facture', $data, $data['id']);

        header("Location: ../facture");
    }

    /**
     * Supprimer la donnée de livre
     */
    function delete() {
        $id = $_GET['id'];
        $this->crud->delete('facture', intval($id));

        header("Location: ../facture");
    }
}
?>