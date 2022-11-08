<?php
require_once("connex/Crud.php");

?>

<body>
    <main>
        <h1>Factures</h1>
        <a href="facture/create" class="bouton">+ Ajouter une facture</a>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Date facture</th>
                    <th>Livraison</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($factures)) {
                    foreach($factures as $row) {
                        echo "<tr>"
                            ."<td>".$row['Nom'].`</td>`
                            ."<td>".$row['adresse'].`</td>`
                            ."<td>".$row['date'].`</td>`
                            ."<td>".$row['modeLivraison'].`</td>`
                            ."<td class='modify'><a href='facture/modifier?id=".$row['0']."'>Modifier</a></td>"
                            ."<td class='delete'><a href='facture/delete?id=".$row['0']."'>Supprimer</a></td>"
                        ."</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
