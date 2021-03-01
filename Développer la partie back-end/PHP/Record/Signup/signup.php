<?php
//ajout de la page CSS dans le header
$style = 'style.css';
//inclusion du header
include '../common/header.php';
include "signup_script.php"; //Inclusion du fichier script
require_once "../common/database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
?>
    <!--    BODY AVEC CLASS POUR LE CSS-->
    <body class="formbody">
    <div class="container">
        <h class="text-center fs-3"> Formulaire d'inscription</h>
        </header>
        <div class="col-sm-6 offset-sm-3">
            <?php
            if (isset($_POST['submit']) && count($formError) === 0) {

                ?>
                <p class="text-center">Vos données ont étés insérés dans la base de données.</p>
                <br>
                <a class="btn btn-secondary mb-1 " href="../disc.php">retour</a>
                <?php
            } else {
            ?>
        </div>
        <!--        FORMULAIRE-->
        <form action="#" class="form" id="form" name="form" method="post" enctype="multipart/form-data">

            <!--firstname -->
            <div class="form-group">
                <label>firstname</label>
                <input type="texte" class="form-control" placeholder="firstname" id="firstname" name="firstname"
                       value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['firstname']) ? $formError['firstname'] : '' ?> </span>
            </div>

            <!--lastname -->
            <div class="form-group">
                <label>lastname</label>
                <input type="texte" class="form-control" placeholder="lastname" id="lastname" name="lastname"
                       value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['lastname']) ? $formError['lastname'] : '' ?> </span>
            </div>

            <!-- email -->
            <div class="form-group">
                <label>email</label>
                <input class="form-control" type="texte" placeholder="email" name="email" id="email">
                <small></small>
                <span class="error"><?= isset($formError['email']) ? $formError['email'] : '' ?> </span>
            </div>

            <!--password -->
            <div class="form-group">
                <label>password</label>
                <input type="password" class="form-control" placeholder="password" id="password" name="password"
                       value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['password']) ? $formError['password'] : '' ?> </span>
            </div>

            <!--passwordcheck -->
            <div class="form-group">
                <label>password confirmation</label>
                <input type="password" class="form-control" placeholder="passwordcheck" id="passwordcheck" name="passwordcheck"
                       value="<?= isset($_POST['passwordcheck']) ? $_POST['passwordcheck'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['passwordcheck']) ? $formError['passwordcheck'] : '' ?> </span>
            </div>
            <br>
            <!-- bouton envoyer et retour -->
            <div class="d-grid gap-2  mx-auto">
                <input type="submit" value="Ajouter" class="btn btn-success" id="submit" name="submit">
                <a class="btn btn-danger" href="../index.php">retour</a>
                <br>
            </div>
        </form>
        <?php // fermeture de ligne 27
        } ?>

    </div> <!-- div container -->
    <!--inclusion du footer-->
    <?php include '../common/footer.php' ?>
    </body>
