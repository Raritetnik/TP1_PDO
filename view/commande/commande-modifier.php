<main>
    <form action="update" method="POST" class="form-box">
        <label for="">Prix:
            <input type="text" name="prixTotal" value='<?= $commande['prixTotal'] ?>' required>
        </label>
        <label for="">Quantite:
            <input type="text" name="quantite" value='<?= $commande['quantite'] ?>'>
        </label>
        <label for="">Livre:
            <select name="Livre_id">
            <?php
                if(isset($livres)) {
                    foreach($livres as $livre) {
                        echo("<option value='".$livre['id']."' "
                        .(($commande['Livre_id'] == $livre['id']) ? "selected": "").">"
                        .$livre['Titre']."</option>");
                    }
                }
                ?>
            </select>
        </label>
        <label for="">Date de facturation:
            <select name="Facture_id">
                <?php
                if(isset($factures)) {
                    foreach($factures as $facture) {
                        echo("<option value='".$facture['id']."' "
                        .(($commande['Facture_id'] == $facture['id']) ? "selected": "").">"
                        .$facture['date']." par ".$facture['Nom']."</option>");
                    }
                }
                ?>
            </select>
        </label>
        <input name='Livre_id' hidden type="hidden" value="<?= $_GET['Livre_id'] ?>">
        <input name='Facture_id' hidden type="hidden" value="<?= $_GET['Facture_id'] ?>">
        <input type="submit" value="Save">
    </form>
</main>
