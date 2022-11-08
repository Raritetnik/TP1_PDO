<main>
    <form action="save" method="POST" class="form-box">
        <label for="">Date de facturation:
            <input type="date" name="date" required>
        </label>
        <label for="">Membre:
            <select name="Membre_id">
            <?php
                if(isset($membres)) {
                    foreach($membres as $membre) {
                        echo("<option value='".$membre['id']."' "
                        .(($facture['Membre_id'] == $membre['id']) ? "selected": "").">"
                        .$membre['Nom']."</option>");
                    }
                }
                ?>
            </select>
        </label>
        <label for="">Mode de paiement:
            <select name="Paiement_id">
                <?php
                if(isset($paiements)) {
                    foreach($paiements as $paiement) {
                        echo("<option value='".$paiement['id']."' "
                        .(($facture['Paiement_id'] == $paiement['id']) ? "selected": "").">"
                        .$paiement['modePaiment']."</option>");
                    }
                }
                ?>
            </select>
        </label>
        <label for="">Mode de livraison:
            <select name="Livraison_id">
                <?php
                if(isset($livraisons)) {
                    foreach($livraisons as $livraison) {
                        echo("<option value='".$livraison['id']."' "
                        .(($facture['Livraison_id'] == $livraison['id']) ? "selected": "").">"
                        .$livraison['modeLivraison']."</option>");
                    }
                }
                ?>
            </select>
        </label>
        <input type="submit" value="Save">
    </form>
</main>