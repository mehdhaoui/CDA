<?php
session_start ();
//ajout de la page CSS dans le header
$style = 'style.css';
//inclusion du header et du script de connexion
include 'header.php';
include 'login_script.php';
require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
?>
<!--    BODY AVEC CLASS POUR LE CSS-->
<body class="formbody">
<div class="container">
    <h3 class="text-center"> Connexion </h3>
    </header>
    <div class="col-sm-6 offset-sm-3">
        <?php
        if (isset($_POST['submit']) && count($formError) === 0) {

            ?>
            <p class="text-center">Vos données :</p>
            <br>
            <ul>
                <li>Email :</li><?php $_SESSION['email']; ?>
                <li>Password :</li><?php $_SESSION['password']; ?>
            </ul>
            <?php
            $pwd = $_SESSION['password'];
            if(password_verify($pwd,$_SESSION['password'])){
                echo "ok";
            }else{
                "pas ok";
            }
            ?>
            <a class="btn btn-secondary mb-1 " href="index.php">retour</a>
            <?php
        } else {
        ?>
    </div>
    <!--        FORMULAIRE-->
    <form action="#" class="form" id="form" name="form" method="post">

        <!--Email -->
        <div class="form-group">
            <label>Email</label>
            <input type="texte" class="form-control" placeholder="email" id="email" name="email"
                   value="<?= isset($_POST['email']) ? $_POST['email'] : '' ?>">
            <i class="bi bi-check2-circle"></i>
            <i class="bi bi-x-circle"></i>
            <small></small>
            <span class="error"><?= isset($formError['email']) ? $formError['email'] : '' ?> </span>
        </div>

        <!--PASSWORD -->
        <div class="form-group">
            <label>password</label>
            <input type="password" class="form-control" placeholder="password" id="password" name="password"
                   value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
            <i class="bi bi-check2-circle"></i>
            <i class="bi bi-x-circle"></i>
            <small></small>
            <span class="error"><?= isset($formError['password']) ? $formError['password'] : '' ?> </span>

            <!-- bouton envoyer et retour -->
            <div class="d-grid gap-2  mx-auto">
                <input type="submit" value="Ajouter" class="btn btn-success" id="submit" name="submit">
                <a class="btn btn-danger" href="index.php">retour</a>
                <br>
            </div>
        </div>
    </form>


        </div>
        <?php // fermeture de ligne 23
        } ?>

</div> <!-- div container -->
</body>
    <!--inclusion du footer-->
<?php include 'footer.php' ?>