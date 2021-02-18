
<?php
//ajout de la page CSS dans le header
$style = 'style.css';
//inclusion du header
include 'header.php';
include "Add_formController.php"; //Inclusion du fichier script
require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
$requete = $db->query("SELECT *
FROM artist"
); // requete + résultat

?>
<!--    BODY AVEC CLASS POUR LE CSS-->
    <body class="formbody">
    <div class="container">
        <h3 class="text-center"> Formulaire ajout de disque</h3>
    </header>
        <div class="col-sm-6 offset-sm-3">
                <?php
                if (isset($_POST['submit']) && count($formError) === 0) {

                    ?>
                    <p class="text-center">Vos données ont étés insérés dans la base de données.</p>
                    <br>
                    <a  class="btn btn-secondary mb-1 " href="disc.php">retour</a>
                        <?php
                    } else {
                        ?>
        </div>
<!--        FORMULAIRE-->
    <form action="#" class="form" id="form" name="form" method="post">

            <!--TITLE -->
        <div class="form-group">
            <label>title</label>
            <input type="texte" class="form-control" placeholder="title" id="title" name="title"  value="<?= isset($_POST['title']) ? $_POST['title'] : '' ?>">
            <small></small>
            <span class="error"><?= isset($formError['title']) ? $formError['title'] : ''  ?> </span>
        </div>

            <!--YEAR -->
            <div class="form-group">
                <label>year</label>
                <input type="texte" class="form-control" placeholder="year" id="year" name="year" value="<?= isset($_POST['year']) ? $_POST['year'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['year']) ? $formError['year'] : ''  ?> </span>
            </div>

            <!-- PICTURE -->
            <div class="form-group">
                <label>picture</label>
                <input class="form-control" type="file" name="picture" id="picture">
                <small></small>
                <span class="error"><?= isset($formError['picture']) ? $formError['picture'] : ''  ?> </span>
            </div>

            <!--LABEL -->
            <div class="form-group">
                <label>label</label>
                <input type="texte" class="form-control" placeholder="label" id="label" name="label" value="<?= isset($_POST['label']) ? $_POST['label'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['label']) ? $formError['label'] : ''  ?> </span>
            </div>

            <!--GENRE -->
            <div class="form-group">
                <label>genre</label>
                <input type="texte" class="form-control" placeholder="genre" id="genre" name="genre" value="<?= isset($_POST['genre']) ? $_POST['genre'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['genre']) ? $formError['genre'] : ''  ?> </span>
            </div>

            <!--price -->
            <div class="form-group">
                <label>price</label>
                <input type="texte" class="form-control" placeholder="price (format 10.00)" id="price" name="price" value="<?= isset($_POST['price']) ? $_POST['price'] : '' ?>">
                <small></small>
                <span class="error"><?= isset($formError['price']) ? $formError['price'] : ''  ?> </span>
            </div>

            <!--artist name-->
            <div class="form-group">
                <label>artist name</label>
                <select class="form-select" aria-label="Default select example" id="artistid" name="artistid">
                    <option selected></option>
                    <?php
                    while($data = $requete->fetch(PDO::FETCH_OBJ) )
                    { ?>
                        <option value="<?= $data->artist_id ?>"><?= $data->artist_name ?></option>
                   <?php }
                    ?>
                </select>
                <small></small>
                <span class="error"><?= isset($formError['artistid']) ? $formError['artistid'] : ''  ?> </span>
            </div>
        <br>

            <!-- bouton envoyer -->
            <div class="d-grid gap-2  mx-auto">
                <input type="submit" value="Ajouter"class="btn btn-success" id="submit" name="submit">
                <a  class="btn btn-danger" href="disc.php">retour</a>
                <br>
            </div>
    </form>
        <?php // fermeture de ligne 27
                            } ?>

</div> <!-- div container -->
</body>
<!--inclusion du footer-->
<?php include 'footer.php' ?>