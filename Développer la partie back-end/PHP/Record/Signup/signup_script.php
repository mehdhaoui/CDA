<?php
require_once "../common/database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
// tableau d'erreur
$formError =[];

// regex
$regAll = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';
$regEmail = '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$/';
$regPassword = '/^[0-9A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';



// si le form est envoyé
if(isset($_POST['submit'])){

    // firstname
    //Si le champ  contient des elements
    if(!empty($_POST['firstname'])){
        // verification de l'élément avec la regex
        if(preg_match($regAll, $_POST['firstname'])){
            // stockage de la donnée sécurisée dans une variable
            $firstname = htmlspecialchars($_POST['firstname']);
        }else{
            $formError['firstname'] = 'le prenom n\'est pas valide.';
        }
    }else{
        $formError['firstname'] = 'le prenom titre est vide.';
    }

    // lastname
    //Si le champ contient des elements
    if(!empty($_POST['lastname'])){
        // verification de l'élément avec la regex
        if(preg_match($regAll, $_POST['lastname'])){
            // stockage de la donnée sécurisée dans une variable
            $lastname = htmlspecialchars($_POST['lastname']);
        }else{
            $formError['lastname'] = 'le nom n\'est pas valide.';
        }
    }else{
        $formError['lastname'] = 'le champ nom est vide.';
    }

    // email
    //Si le champ contient des elements
    if(!empty($_POST['email'])){
        // vérifie si l'email existe en BDD
        $mail=$_POST['email'];
        $query = $db->query("SELECT user_email FROM user WHERE user_email='$mail'");
        if(($query->rowCount() == 0)){
            // verification de l'élément avec la regex
            if(preg_match($regEmail, $_POST['email'])){
                // stockage de la donnée sécurisée dans une variable
                $email = htmlspecialchars($_POST['email']);
            }else{
                $formError['email'] = 'l\'email n\'est pas valide.';
            }
        }else{
            $formError['email'] = 'l\'email existe déjà.';
        }

    }else{
        $formError['email'] = 'le champ email est vide.';
    }

    // password
    //Si le champ contient des elements
    if(!empty($_POST['password'])){
        // verification de l'élément avec la regex
        if(preg_match($regPassword, $_POST['password'])){
            // stockage de la donnée sécurisée dans une variable
            $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
        }else{
            $formError['password'] = 'le mot de passe n\'est pas valide.';
        }
    }else{
        $formError['password'] = 'le champ mot de passe est vide.';
    }

    // passwordcheck
    //Si le champ contient des elements
    if(!empty($_POST['passwordcheck'])){
        if($_POST['password'] = $_POST['passwordcheck']){
                // verification de l'élément avec la regex
                if(preg_match($regPassword, $_POST['passwordcheck'])){
                    // stockage de la donnée sécurisée dans une variable
                    $passwordcheck = htmlspecialchars($_POST['passwordcheck']);
                }else{
                    $formError['passwordcheck'] = 'le mot de passe check n\'est pas valide.';
      }
        }else{
               $formError['passwordcheck'] = 'les mot de passe ne correspondent pas';
        }
    }else{
        $formError['passwordcheck'] = 'le champ mot de passe check est vide.';
    }

    // Ajouts des données dans la BDD si le formulaire est envoyé avec succès
    if (isset($_POST['submit']) && count($formError) === 0) {
        $requete = "INSERT INTO user (user_firstname, user_lastname, user_email, user_password) 
VALUES('$firstname','$lastname','$email','$password')";
        $result = $db->query($requete);
    }else{
        echo "";
    }
}