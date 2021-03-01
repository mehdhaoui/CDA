
<?php
//ajout de la page CSS dans le header
$style = 'style.css';
//inclusion du header
include '../common/header.php';
include "update_formController.php";
require_once "../common/database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd

//requete pour recuperer toutes les infos
$requete = $db->prepare("SELECT * FROM disc LEFT JOIN artist on disc.artist_id = artist.artist_id where disc_id=?");
$requete->execute(array($_GET["disc_id"]));
$disc = $requete->fetch(PDO::FETCH_OBJ);

// requete 2 pour obtenir la liste des artistes
$request = $db->prepare("SELECT * FROM artist");;
$request->execute(array($_GET["disc_id"]));
$artist = $request->fetch(PDO::FETCH_OBJ);
?>
    <body class="formbody">
        <div class="container">
            <header>
                <h class="text-center fs-3">Formulaire de modification</h>
            </header>
    <div class="col-sm-6 offset-sm-3">
        <?php
        if (isset($_POST['submit']) && count($formError) === 0) {

            ?>
            <p class="text-center">Vos données ont étés modifiés dans la base de données.</p>
            <br>
            <a  class="btn btn-secondary mb-1" href="../disc.php">retour</a>
            <br>
            <?php
        } else {
        ?>

    </div>
    <form action="#" class="form" id="form" name ="form" method="post" enctype="multipart/form-data">

        <!--TITLE -->
        <div class="form-group">
            <label for="title">title</label>
            <input type="text" class="form-control" placeholder="title" id="title" name="title"  value="<?= $disc->disc_title; ?>">
            <small></small>
            <span class="text-danger"><?= isset($formError['title']) ? $formError['title'] : ''  ?> </span>
        </div>

        <!--YEAR -->
        <div class="form-group">
            <label for="year">year</label>
            <input type="text" class="form-control" placeholder="year" id="year" name="year" value="<?= $disc->disc_year; ?>">
            <small></small>
            <span class="text-danger"><?= isset($formError['year']) ? $formError['year'] : ''  ?> </span>
        </div>

        <!-- PICTURE -->
        <div class="form-group">
            <label for="picture">picture</label>
            <input class="form-control" type="file" name="picture" id="picture">
            <small></small>
            <span class="text-danger"><?= isset($formError['picture']) ? $formError['picture'] : ''  ?> </span>
        </div>

        <!--LABEL -->
        <div class="form-group">
            <label for="label">label</label>
            <input type="text" class="form-control" placeholder="label" id="label" name="label" value="<?= $disc->disc_label; ?>">
            <small></small>
            <span class="text-danger"><?= isset($formError['label']) ? $formError['label'] : ''  ?> </span>
        </div>

        <!--GENRE -->
        <div class="form-group">
            <label for="genre">genre</label>
            <input type="text" class="form-control" placeholder="genre" id="genre" name="genre" value="<?= $disc->disc_genre; ?>">
            <small></small>
            <span class="text-danger"><?= isset($formError['genre']) ? $formError['genre'] : ''  ?> </span>
        </div>

        <!--price -->
        <div class="form-group">
            <label for="price">price</label>
            <input type="text" class="form-control" placeholder="price" id="price" name="price" value="<?= $disc->disc_price; ?>">
            <small></small>
            <span class="text-danger"><?= isset($formError['price']) ? $formError['price'] : ''  ?> </span>
        </div>

        <!--artist name-->
        <div class="form-group">
            <label for="artistid">artist name</label>
            <select class="form-select" aria-label="Default select example" id="artistid" name="artistid" >
                <option selected></option>
                <?php
                while($data = $request->fetch(PDO::FETCH_OBJ) )
                {?>
                    <option value="<?= $data->artist_id; ?>"><?= $data->artist_name; ?></option>
                <?php } ?>
            </select>
            <small></small>
            <span class="text-danger"><?= isset($formError['artistid']) ? $formError['artistid'] : ''  ?> </span>
        </div>
        <br>

        <!-- bouton envoyer -->
        <div class="d-grid gap-2 mx-auto">
            <input type="submit" value="Modifier"class="btn btn-success" id="submit" name="submit">
            <a  class="btn btn-danger " href="../disc.php">retour</a>
        </div>
    </form>

    <?php // fermeture de ligne 46
    } ?>


</div> <!-- div container -->

<!--inclusion du footer-->
<?php include '../common/footer.php' ?>
</body>
