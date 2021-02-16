<?php

require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
$requete = $db->prepare("SELECT *
FROM disc LEFT JOIN artist on disc.artist_id = artist.artist_id
where disc_id=?");
$requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Record - Details disc</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<div class="container-fluid"> <!-- se ferme au pied de page -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="artist.php">Artist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="disc.php">Disc</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <body>
    <h1> disc</h1>
    <img src="assets/img//<?= $disc->disc_picture ?>" width=300 height=100 class="img-fluid " alt="<?= $disc->disc_name ?>"><br>
    Disc N° <?= $disc->disc_id ?><br>
    Disc name <?= $disc->disc_title ?><br>
    Disc year <?= $disc->disc_year ?><br>
    artist name <?= $disc->artist_name ?><br>

    <!-- bouton modifier et retour -->
    <a  class="btn btn-primary" href="disc_update.php">modifier</a>
    <a  class="btn btn-danger" href="disc.php">retour</a>

    <footer>

    </footer>
</div> <!-- div container -->
<!-- Jquery & JS bootstrap -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>
</html>