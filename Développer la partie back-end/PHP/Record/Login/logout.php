<?php
session_start();
unset($_SESSION["email"]);
unset($_SESSION["password"]);

if (ini_get("session.use_cookies"))
{
    setcookie(session_name(), '', time()-42000);
}

session_destroy();
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Record</title>
    <!-- Bootstrap + CSS -->
    <link rel="stylesheet" href="assets/css/<?=$style?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<!-- BODY -->
<body>
<!-- NAVBAR-->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="../index.php">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="../artist.php">Artist</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../disc.php">Disc</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">log out</a>
                </li>
            </ul>
        </div>
    </nav>
</header>
<p>Session détruite.</p>
<a class="btn btn-danger" href="../index.php">retour</a>
<!--    inclusion du footer-->
<?php include '../common/footer.php'; ?>
</body>
