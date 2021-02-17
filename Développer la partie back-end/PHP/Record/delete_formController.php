<?php
require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
//requête de suppression
$requete = $db->prepare("DELETE FROM disc WHERE disc_id ='".$_GET['disc_id']."'");
$requete->execute(array($_GET["disc_id"]));
// Si la requete ne se realise pas, envoi d'un message d'erreur
    if (!$requete){
        die('Requête invalide : ' . mysqli_error($db));
    }