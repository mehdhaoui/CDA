<?php
include 'header.php';
// Inclusion de la connexion a la bdd
require_once "database.php";
//fonction de connexion a la bdd
$db = connexionBase();
// requete + résultat
$requete = $db->query("SELECT *
FROM disc LEFT JOIN artist on disc.artist_id = artist.artist_id
ORDER BY disc_id ASC");
//Si erreur de requete
if (!$requete)
{
    $tableauErreurs = $db->errorInfo();
    echo $tableauErreur[2];
    die("Erreur dans la requête");
}
//Si pas de Résultats
if ($requete->rowCount() == 0)
{
    die("La table est vide");
}
?>
    <body>
    <h1> disc</h1> <a  class="btn btn-primary mb-2" href="disc_add.php">ajouter un nouveau disque</a>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th>ID</th>
            <th>title</th>
            <th>year</th>
            <th>picture</th>
            <th>label</th>
            <th>genre</th>
            <th>price</th>
            <th>artist name</th>


        </tr>
        </thead>

        <tbody>
        <?php
        while($data = $requete->fetch(PDO::FETCH_OBJ) )
        {?>
            <td><?= $data->disc_id ?></td>
            <td><a href="details_disc.php?disc_id=<?= $data->disc_id?>"><?= $data->disc_title?></a></td>
            <td><?= $data->disc_year ?></td>
            <td><img src="assets\img\<?= $data->disc_picture ?>"width=70 height=50 class="img-fluid" alt="<?= $data->disc_title ?>"></td>
            <td><?= $data->disc_label ?></td>
            <td><?= $data->disc_genre ?></td>
            <td><?= $data->disc_price ?></td>
            <td><?= $data->artist_name ?></td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
<?php include 'footer.php'; ?>