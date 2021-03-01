<?php
//inclusion du header
include 'common/header.php';
require_once "common/database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
$requete = $db->query("SELECT* FROM artist ORDER BY artist_id ASC"); // requete + résultat
?>
<!--    BODY-->
    <body>
    <div class="container-fluid"> <!-- se ferme au pied de page -->
        <!--    NAVBAR-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="index.php">Accueil</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="artist.php">Artist</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="disc.php">Disc</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Signup/signup.php">Signup</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Login/login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="Login/logout.php">Login</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
    <h class="fs-1">artist</h>
<!--TABLEAU-->
    <table class="table table-hover">
        <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>url</th>
        </tr>
        </thead>

        <tbody>
        <?php
            foreach($requete as $data)
            { ?>
                <tr>
                    <td><?=$data['artist_id']?></td>
                    <td><?=$data['artist_name']?></td>
                    <td><?=$data['artist_url']?></td>
                </tr>
           <?php }
            ?>
        </tbody>
    </table>
</div> <!-- div container -->
    <!--    inclusion du footer-->
    <?php include "common/footer.php"; ?>
</body>
