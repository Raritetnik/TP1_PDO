<?php $nav = "http://".$_SERVER['HTTP_HOST']."/TP1_PDO/index.php/"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style><?= include_once("css/style.css") ?></style>
</head>
<header class="menu-principale">
    <h1><a href="/TP1_PDO/">Admin Panel</a></h1>
    <nav class='menu-princ__options'>
        <a href="<?= $nav ?>membre">Membre</a>
        <a href="<?= $nav ?>facture">Facture</a>
        <a href="<?= $nav ?>livre">Livre</a>
        <a href="<?= $nav ?>commande">Commande</a>
    </nav>
</header>