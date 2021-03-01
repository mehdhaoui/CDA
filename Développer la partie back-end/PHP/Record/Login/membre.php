<?php
session_start ();
//ajout de la page CSS dans le header
$style = 'style.css';
//inclusion du header et du script de connexion
include '../common/header.php';
include 'login_script.php';
require_once "../common/database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
?>
    <!--    BODY AVEC CLASS POUR LE CSS-->
    <body class="formbody">
    <div class="container">
        <h class="text-center fs-3"> Page de membre </h>
        </header>
        <div class="col-sm-6 offset-sm-3">
            <?php
            if (isset($_SESSION['auth'])) {
                ?>
                <p class="text-center">Vous êtes connecté</p>
                <ul>
                    <li>Email :</li><?= $_SESSION['email']; ?>
                    <li>Password :</li><?= $_SESSION['password']; ?>
                </ul>
                <br>

                <?php
            } else { ?>
                <p class="text-center">Veuillez vous connecter pour acceder a votre espace</p>
                <a class="btn btn-secondary mb-1" href="login.php">Se connecter</a>
                <?php // fermeture de ligne 23
            } ?>

        </div>

        <a class="btn btn-secondary mb-1 " href="../index.php">retour</a>
    </div>

    </div> <!-- div container -->
    <!--inclusion du footer-->
    <?php include '../common/footer.php' ?>
    </body>
