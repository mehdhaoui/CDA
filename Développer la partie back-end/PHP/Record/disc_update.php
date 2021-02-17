
<?php
include "Add_formController.php";
require_once "database.php"; // Inclusion de la connexion a la bdd
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
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Record</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<div class="container">
    <header>
        <h3>Formulaire de modification</h3>
    </header>
    <body>
    <div class="col-sm-6 offset-sm-3">
        <?php
        if (isset($_POST['submit']) && count($formError) === 0) {

            ?>
            <p>Vos données ont étés modifiés dans la base de données.</p>
            <br>
            <a  class="btn btn-secondary mb-1" href="disc.php">retour</a>
            <br>
            <?php
        } else {
        ?>

    </div>
    <form action="#" class="form" id="form" method="post">

        <!--TITLE -->
        <div class="form-group">
            <label>title</label>
            <input type="texte" class="form-control" placeholder="title" id="title" name="title"  value="<?= $disc->disc_title; ?>">
            <small></small>
            <span class="error"><?= isset($formError['title']) ? $formError['title'] : ''  ?> </span>
        </div>

        <!--YEAR -->
        <div class="form-group">
            <label>year</label>
            <input type="texte" class="form-control" placeholder="year" id="year" name="year" value="<?= $disc->disc_year; ?>">
            <small></small>
            <span class="error"><?= isset($formError['year']) ? $formError['year'] : ''  ?> </span>
        </div>

        <!-- PICTURE -->
        <div class="form-group">
            <label>picture</label>
            <input class="form-control" type="file" name="picture" id="picture" value="">
            <small></small>
            <span class="error"><?= isset($formError['picture']) ? $formError['picture'] : ''  ?> </span>
        </div>

        <!--LABEL -->
        <div class="form-group">
            <label>label</label>
            <input type="texte" class="form-control" placeholder="label" id="label" name="label" value="<?= $disc->disc_label; ?>">
            <small></small>
            <span class="error"><?= isset($formError['label']) ? $formError['label'] : ''  ?> </span>
        </div>

        <!--GENRE -->
        <div class="form-group">
            <label>genre</label>
            <input type="texte" class="form-control" placeholder="genre" id="genre" name="genre" value="<?= $disc->disc_genre; ?>">
            <small></small>
            <span class="error"><?= isset($formError['genre']) ? $formError['genre'] : ''  ?> </span>
        </div>

        <!--price -->
        <div class="form-group">
            <label>price</label>
            <input type="texte" class="form-control" placeholder="price" id="price" name="price" value="<?= $disc->disc_price; ?>">
            <small></small>
            <span class="error"><?= isset($formError['genre']) ? $formError['genre'] : ''  ?> </span>
        </div>

        <!--artist name-->
        <div class="form-group">

            <label>artist name</label>
            <select class="form-select" aria-label="Default select example" id="artistid" name="artistid" >
                <option selected></option>
                <?php
                while($data = $request->fetch(PDO::FETCH_OBJ) )
                {?>
                    <option value="<?= $data->artist_id; ?>"><?= $data->artist_name; ?></option>
                <?php } ?>
            </select>
            <small></small>
            <span class="error"><?= isset($formError['artistid']) ? $formError['artistid'] : ''  ?> </span>
        </div>
        <br>

        <!-- bouton envoyer -->
        <div class="d-grid gap-2 mx-auto">
            <input type="submit" value="Modifier"class="btn btn-success" id="submit" name="submit">
            <a  class="btn btn-danger " href="disc.php">retour</a>
        </div>
    </form>

    <?php // fermeture de ligne 46
    } ?>

    <footer>
    </footer>
</div> <!-- div container -->
<!-- Jquery & JS bootstrap -->
<!--<script type="text/javascript" src="assets/js/validation_form.js"></script>-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script></body>
</html>