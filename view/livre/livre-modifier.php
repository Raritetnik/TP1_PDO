<main>
    <form action="update?id=<?= $_GET['id'] ?>" method="POST" class="form-box">
        <label for="">Titre:
            <input type="text" name="Titre" value='<?= $livre['Titre'] ?>' required>
        </label>
        <label for="">Prix:
            <input type="text" name="prix" value='<?= $livre['prix'] ?>' required>
        </label>
        <label for="">Nombre de pages:
            <input type="text" name="nombrePages" value='<?= $livre['nombrePages'] ?>'>
        </label>
        <label for="">Édition:
            <input type="number" name="edition" value='<?= $livre['edition'] ?>'>
        </label>
        <label for="">Catégorie:
            <select name="Categorie_id">
            <?php
                if(isset($categories)) {
                    foreach($categories as $categorie) {
                        echo("<option value='".$categorie['id']."' "
                        .(($livre['Categorie_id'] == $categorie['id']) ? "selected": "").">"
                        .$categorie['Nom']."</option>");
                    }
                }
                ?>
            </select>
        </label>
        <label for="">Éditeur:
            <select name="Editeur_id">
                <?php
                if(isset($editeurs)) {
                    foreach($editeurs as $editeur) {
                        echo("<option value='".$editeur['id']."' "
                        .(($livre['Editeur_id'] == $editeur['id']) ? "selected": "").">"
                        .$editeur['Nom']."</option>");
                    }
                }
                ?>
            </select>
        </label>
        <label for="">Description
            <textarea name='Description' required><?= $livre['Description'] ?></textarea>
        </label>
        <input type="submit" value="Save">
    </form>
</main>
