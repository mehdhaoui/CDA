<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Boucles - exercice 1</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Boucles
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="exercice1.php">Exercice 1</a>
                        <a class="dropdown-item" href="exercice2.php">Exercice 2</a>
                        <a class="dropdown-item" href="exercice3.php">Exercice 3</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tableaux
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="exercice1.php">Exercice 1</a>
                        <a class="dropdown-item" href="exercice2.php">Exercice 2</a>
                        <a class="dropdown-item" href="exercice3.php">Exercice 3</a>
                        <a class="dropdown-item" href="exercice4.php">Exercice 4</a>
                    </div>
                </li>
                <a class="nav-item nav-link" href="#">Fonctions</a>
                <a class="nav-item nav-link" href="#">Dates et heures</a>
                <a class="nav-item nav-link" href="#">manipulation sur les fichiers</a>
                <a class="nav-item nav-link" href="#">Serveurs et formulaires</a>
                <a class="nav-item nav-link" href="#">PDO</a>
                <a class="nav-item nav-link" href="#">Sessions</a>
                <a class="nav-item nav-link" href="#">mails</a>
            </div>
        </div>
    </nav>
    <div class="bg-secondary">
        <h3>Exercice 1</h3>


        <?php
        $now = date_create('2020-02-10');
        $endstage = date_create('2020-08-20');
        $intervalle = date_diff($endstage, $now);
        echo $intervalle->format("%R%a days");

        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>