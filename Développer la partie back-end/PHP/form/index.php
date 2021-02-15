<?php
include 'formController.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Validation de formulaire</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <?php
            if (isset($_POST['submit']) && count($formError) === 0) {

                ?>
                <p>Vos données</p>
                <ul>
                    <li>mail : <?= $mail ?></li>
                    <li>Mot de passe <?= $passwordHash ?></li>
                </ul>
                <?php
                // mot de passe récupéré du formulaire de connexion
                $password = 'azerty';
                if (password_verify($password, $passwordHash)) {
                    ?>
                    <p>Vous êtes connectés</p>
                    <?php
                } else {
                    ?>
                    <p>La connexion n'est pas établie</p>
                    <?php
                }
            } else {
                ?>
                <form action="#" method="post" novalidate="novalidate">
                    <div class="mb-3">
                        <label for="mail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="mail" name="mail"
                               value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>">
                        <span class="error"><?= isset($formError['mail']) ? $formError['mail'] : '' ?></span>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password"
                               value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>">
                        <span class="error"><?= isset($formError['password']) ? $formError['password'] : '' ?></span>
                    </div>
                    <input type="submit" name="submit" value="Soumettre" id="submit" class="btn btn-secondary">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0"
        crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>
</body>
</html>