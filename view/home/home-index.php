<section class="info-page">
    <h1>Bienvenu sur le site gestionnaire</h1>
    <p>La page est un gestionnaire de site librairie qui permet de modifier les données de base de données. Les quatre tables pricipales: Livre, Commande, Facture, Membre. Les tables additionnels d'Éditeur, Categorie, Livraison et Paiement ne sont pas modifiable ou affiché par le site.</p>

    <h1>Modèle de diagramme de relation d’une Librairie</h1>
    <img src="librairie-diag.png" alt="">

    <h1>Structure de site</h1>

    <ul>
        <li>Page d'accueil informationnel</li>
        <li>Page de gestion Membre:</li>
            <dd>- Page de creation</dd>
            <dd>- Page de modification</dd>
            <dd>- Option de suppression</dd>
        <li>Page de gestion Facture</li>
            <dd>- Page de creation</dd>
            <dd>- Page de modification</dd>
            <dd>- Option de suppression</dd>
        <li>Page de gestion Livre</li>
            <dd>- Page de creation</dd>
            <dd>- Page de modification</dd>
            <dd>- Option de suppression</dd>
        <li>Page de gestion Commande</li>
            <dd>- Page de creation</dd>
            <dd>- Page de modification</dd>
            <dd>- Option de suppression</dd>
    </ul>

    <h1>Composition des fichier de site</h1>
    <p>La classe principale de CRUD est responsable de toutes comminucations avec la base de données. La partie de class est responsable de gestion des données entre les pages et la classe de CRUD.</p>
</section>