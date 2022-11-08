<?php
require_once("connex/Crud.php");
?>
<body>
    <main>
        <h1>Membre</h1>
        <a href="membre/create" class="bouton">+ Ajouter un membre</a>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Postal Code</th>
                    <th>Courriel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if($membres != null) {
                    foreach($membres as $row) {
                        echo "<tr>"
                            ."<td>".$row['Nom'].`</td>`
                            ."<td>".$row['adresse'].`</td>`
                            ."<td>".$row['phone'].`</td>`
                            ."<td>".$row['courriel'].`</td>`
                            ."<td class='modify'><a href='#'>Modifier</a></td>"
                            ."<td class='delete'><a href='#'>Supprimer</a></td>"
                        ."</tr>";
                    }
                }
                ?>
            </tbody>
        </table>
    </main>
</body>
