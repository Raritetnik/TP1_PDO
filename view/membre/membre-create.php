<main>
    <form action="save" method="POST" class="form-box">
        <label for="">Titre:
            <input type="text" name="Titre">
        </label>
        <label for="">Prix:
            <input type="text" name="prix">
        </label>
        <label for="">Nombre de pages:
            <input type="text" name="nombrePages">
        </label>
        <label for="">Édition:
            <input type="number" name="edition">
        </label>
        <label for="">Catégorie:
            <select name="Categorie_id">
                <option value="1">1</option>
            </select>
        </label>
        <label for="">Éditeur:
            <select name="Editeur_id">
                <option value="1">1</option>
            </select>
        </label>
        <label for="">Description
            <textarea name='Description'> </textarea>
        </label>
        <input type="submit" value="Save">
    </form>
</main>
