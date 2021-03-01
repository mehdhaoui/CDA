<?php
require_once "../common/database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
// tableau d'erreur
$formError =[];

// regex
$regEmail = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/';
$regPassword = '/^[0-9A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';



// si le form est envoyé
if(isset($_POST['submit'])){

    // Email
    //Si le champ  contient des elements
    if(!empty($_POST['email']) &&!empty($_POST['password'])){

        // verification de l'élément avec la regex
        if(preg_match($regEmail, $_POST['email']) && preg_match($regPassword, $_POST['password']) ){


            // stockage des données sécurisées dans une variable
            $email = htmlspecialchars($_POST['email']);
            $password = htmlspecialchars($_POST['password']);

            // requêtes
            $query = $db->query("SELECT user_email, user_password FROM user WHERE user_email='$email'");
            $query->bindParam('s',$mail);
            $query->execute();
            $query->bindColumn('user_email', $mail);
            $row = $query->fetch();

            // vérifie si l'email existe en BDD
            if(($query->rowCount() == 0)){
                $formError['email'] = 'l\'email  n\'existe pas .';
            }else{
                // verification du mdp
                if (password_verify($password,$row['user_password'])){
                   //session
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['auth'] = 'ok';
                    // redirection a la page membre
                    header ('location: membre.php');

                }else{
                    $formError['password'] = 'le mdp est incorrect';
                }

            }

        }else{
            $formError['email'] = 'l\'email ou le mot de passe n\'est pas valide.';
        }



    }else{
        $formError['email'] = 'le champ email et/ou password est vide.';
    }


}

