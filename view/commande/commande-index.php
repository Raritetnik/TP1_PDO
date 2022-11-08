<?php
require_once("connex/Crud.php");
?>

<body>
    <main>
        <h1>Commande</h1>
        <a href="commande/create" class="bouton">+ Ajouter une commande</a>
        <table>
            <thead>
                <tr>
                    <th>Nom du livre</th>
                    <th>Quantite</th>
                    <th>Prix</th>
                    <th>Acheteur</th>
                    <th>Date de facturation</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($commandes)) {
                    foreach($commandes as $row) {
                        echo "<tr>"
                            ."<td>".$row['Titre'].`</td>`
                            ."<td>".$row['quantite'].`</td>`
                            ."<td>".$row['prixTotal'].`</td>`
                            ."<td>".$row['Nom'].`</td>`
                            ."<td>".$row['date'].`</td>`
                            ."<td class='modify'><a href='commande/modifier?Livre_id=".$row['Livre_id']."&Facture_id=".$row['Facture_id']."'>Modifier</a></td>"
                            ."<td class='delete'><a href='commande/delete?Livre_id=".$row['Livre_id']."&Facture_id=".$row['Facture_id']."'>Supprimer</a></td>"
                        ."</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
