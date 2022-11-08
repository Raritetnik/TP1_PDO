<?php $nav = "http://".$_SERVER['HTTP_HOST']."/TP1_PDO/"; ?>
<header class="menu-principale">
    <h1><a href="<?= $nav ?>">Admin Panel</a></h1>
    <nav class='menu-princ__options'>
        <a href="<?= $nav ?>membre">Membre</a>
        <a href="<?= $nav ?>facture">Facture</a>
        <a href="<?= $nav ?>livre">Livre</a>
        <a href="<?= $nav ?>commande">Commande</a>
    </nav>
</header>