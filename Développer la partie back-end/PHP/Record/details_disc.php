<?php
//inclusion du header
include 'header.php';
require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
$requete = $db->prepare("SELECT *
FROM disc LEFT JOIN artist on disc.artist_id = artist.artist_id
where disc_id=?");
$requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);
?>
<div class="container-fluid"> <!-- se ferme au pied de page -->
    <!-- NAVBAR -->
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

<!--BODY-->
    <body>
    <h1> disc</h1>
    <img src="assets/img//<?= $disc->disc_picture ?>" width=300 height=100 class="img-fluid " alt="<?= $disc->disc_name ?>"><br>
    Disc N° : <?= $disc->disc_id ?><br>
    Disc name : <?= $disc->disc_title ?><br>
    Disc year : <?= $disc->disc_year ?><br>
    artist name : <?= $disc->artist_name ?><br>

    <!-- bouton modifier, supprimer et retour -->
    <a  class="btn btn-success" href="disc_update.php?disc_id=<?= $disc->disc_id?>">modifier</a>
    <a  class="btn btn-danger" href="disc_delete.php?disc_id=<?= $disc->disc_id?>">supprimer</a>
    <a  class="btn btn-primary" href="disc.php">retour</a>

<!--    inclusion du footer-->
<?php include 'footer.php';?>