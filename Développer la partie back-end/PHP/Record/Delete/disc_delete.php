
<?php
//ajout de la page CSS dans le header
$style = 'style.css';
//inclusion du header
include '../common/header.php';
// inclusion du script de suppression
include "delete_formController.php";
require_once "../common/database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd

$requete = $db->prepare("SELECT * FROM disc LEFT JOIN artist on disc.artist_id = artist.artist_id where disc_id=?");
$requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);
?>
    <body class="formbody">
    <div class="container">
            <header>
                <h class="text-center fs-3">Disque supprimé</h>
            </header>
        <div class="col-sm-6 offset-sm-3">
            <p class="text-center">Vos informations ont bien étés supprimées</p>
            <a  class="btn btn-secondary mb-1" href="../disc.php">retour</a>
        </div>
    </div> <!-- div container -->
    <!--inclusion du footer-->
    <?php include '../common/footer.php' ?>
    </body>
