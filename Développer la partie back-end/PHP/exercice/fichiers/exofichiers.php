<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Exercices php</title>
</head>

<body>
    <!--container -->
    <div class="container">
        <div class="p-5 text-center bg-secondary">
            <h1>Exercices PHP</h1>
        </div>

        <!-- navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Accueil</a>
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
                            <a class="dropdown-item" href="boucles/exercice1.php">Exercice 1</a>
                            <a class="dropdown-item" href="boucles/exercice2.php">Exercice 2</a>
                            <a class="dropdown-item" href="boucles/exercice3.php">Exercice 3</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            tableaux
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="tableaux/exercice1.php">Exercice 1</a>
                            <a class="dropdown-item" href="tableaux/exercice2.php">Exercice 2</a>
                            <a class="dropdown-item" href="tableaux/exercice3.php">Exercice 3</a>
                            <a class="dropdown-item" href="tableaux/exercice4.php">Exercice 4</a>
                        </div>
                    </li>
                    <a class="nav-item nav-link" href="#">Fonctions</a>
                    <a class="nav-item nav-link" href="date/exo_date.php">Dates et heures</a>
                    <a class="nav-item nav-link" href="fichiers/exofichiers.php">manipulation sur les fichiers</a>
                    <a class="nav-item nav-link" href="#">Serveurs et formulaires</a>
                    <a class="nav-item nav-link" href="#">PDO</a>
                    <a class="nav-item nav-link" href="#">Sessions</a>
                    <a class="nav-item nav-link" href="#">mails</a>
                </div>
            </div>
        </nav>

        <p>Exercice 1</p>
        <br>
        <?php
        $file = "https://ncode.amorce.org/ressources/Pool/CDA/WEB_PHP_frc/liens.txt";
        $openfile = file($file);
        foreach ($openfile as $link => $file) {
            echo  "<a href=$file>" . $file . "</a> <br />\n";
        }
        ?>
        <!-- <p>exo 2</p>
        <h1> disc</h1>
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Surname</th>
                    <th>Firstname</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>City</th>
                    <th>State</th>



                </tr>
            </thead> -->

        <!-- <tbody> -->
        <!-- 
                // $CSVfile = "http://bienvu.net/misc/customers.csv";
                // $fileopen = file($CSVfile);
                // $separate = explode("", $fileopen);


                // foreach ($separate as $links) {
                //     echo "<td>" . $links . "</td>";
                //     echo "<td>" . $links . "</td>";
                //     echo "<td>" . $links . "</td>";
                //     echo "<td>" . $links . "</td>";
                //     echo "<td>" . $links . "</td>";
                //     echo "<td>" . $links . "</td>";
                //     echo "</tr>";
                
                ?> -->
        <!-- </tbody>
        </table> -->
    </div>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>

</html>