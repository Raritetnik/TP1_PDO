<body>
    <main>
        <h1>Liste des livres en vente</h1>
        <a href="livre/create" class="bouton">+ Ajouter un livre</a>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Nombre de pages</th>
                    <th>Prix</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if(isset($livres)) {
                foreach($livres as $row) {
                    echo "<tr>"
                        ."<td>".$row['Titre'].`</td>`
                        ."<td>".$row['Description'].`</td>`
                        ."<td>".$row['nombrePages'].`</td>`
                        ."<td>".$row['prix'].`</td>`
                        ."<td class='modify'><a href='livre/modifier?id=".$row['id']."'>Modifier</a></td>"
                        ."<td class='delete'><a href='livre/delete?id=".$row['id']."'>Supprimer</a></td>"
                    ."</tr>";
                }
            }
            ?>
            </tbody>
        </table>
    </main>
</body>
