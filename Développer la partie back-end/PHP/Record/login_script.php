<?php
require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
// tableau d'erreur
$formError =[];

// regex
$regEmail = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/';
$regPassword = '/^[0-9A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';



// si le form est envoyé
if(isset($_POST['submit'])){

    // requetes
    $mail = $_POST['email'];
    $pwd = $_POST['password'];

    $query = $db->query("SELECT user_email, user_password FROM user WHERE user_email='$mail'");
    $query->bindParam('s',$mail);

    $query->execute();
    $query->bindColumn('user_email', $mail);

    $row = $query->fetch();

    // Email
    //Si le champ  contient des elements
    if(!empty($_POST['email'])){

        // vérifie si l'email existe en BDD
        if(($query->rowCount() == 0)){
            $formError['email'] = 'l\'email  n\'existe pas .';
        }else{
            // verification de l'élément avec la regex
            if(preg_match($regEmail, $_POST['email'])){
                // stockage de la donnée sécurisée dans une variable
                $email = htmlspecialchars($_POST['email']);
            }else{
                $formError['email'] = 'l\'email  n\'est pas valide.';
            }
        }
    }else{
        $formError['email'] = 'le champ email est vide.';
    }

    // password
    //Si le champ contient des elements
    if(!empty($_POST['password'])){
        // vérifie si l'email existe en BDD
        if(($query->rowCount() == 0)){
            $formError['password'] = 'le compte n\'existe pas';
        }else {
            if (password_verify($pwd,$row['user_password'])){
                // verification de l'élément avec la regex
                if (preg_match($regPassword, $_POST['password'])) {
                    // stockage de la donnée sécurisée dans une variable
                    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);

                } else {
                    $formError['password'] = 'le format du mot de passe n\'est pas valide.';
                }

            }else{
                $formError['password'] = 'le mdp ne correspond pas a celui en bdd';
            }

        }
    }else{
        $formError['password'] = 'le champ mot de passe est vide.';
    }

    // Ajouts des données dans la session
    if (isset($_POST['submit']) && count($formError) === 0) {
        session_start(); // debut de la session
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['auth'] = 'ok';
        // redirection a la page membre
        header ('location: membre.php');
    }else{
        echo "";

    }

}

