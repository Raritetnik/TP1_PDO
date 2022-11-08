<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Document</title>
</head>
<body>
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
</body>
</html>
