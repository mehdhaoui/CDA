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
                <a class="nav-item nav-link" href="#">Tableaux</a>
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
        <h3>Exercice 3</h3>
        <?php

        $NbrCol = 10;
        $NbrLigne = 10;


        echo '<table border="1" width="400">'; // ligne 0
        echo '<tr>';
        echo '<td></td>';
        for ($j = 0; $j <= $NbrCol; $j++) {
            echo '<td>' . $j . '</td>';
        }
        echo '</tr>';

        for ($i = 0; $i <= $NbrLigne; $i++) {
            echo '<tr>';
            for ($j = 0; $j <= $NbrCol; $j++) {
                // 1ere colonne 
                if ($j == 0) {
                    echo '<td>' . $i . '</td>';
                }

                if ($i == $j) {
                    echo '<td>';
                } else {
                    echo '<td>';
                }

                echo $i * $j;

                echo '';
            }
            echo '</tr>';
            $j = 1;
        }
        echo '</center></table>';
        ?>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>