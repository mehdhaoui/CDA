<?php
require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
// tableau d'erreur
$formError =[];

// regex
$regTitle = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';
$regYear='/^\d{1,4}$/';
//picture n'a pas de regex
$regLabel = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';
$regGenre = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';
$regPrice = '/^\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})$/';
$regArtistName = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';


// si le form est envoyé
if(isset($_POST['submit'])){

                    // TITLE
    //Si le champ  contient des elements
    if(!empty($_POST['title'])){
        // verification de l'élément avec la regex
        if(preg_match($regTitle, $_POST['title'])){
            // stockage de la donnée sécurisée dans une variable
            $title = htmlspecialchars($_POST['title']);
        }else{
            $formError['title'] = 'le titre n\'est pas valide.';
        }
    }else{
        $formError['title'] = 'le champ titre est vide.';
    }

                 // Year
    //Si le champ contient des elements
    if(!empty($_POST['year'])){
        // verification de l'élément avec la regex
        if(preg_match($regYear, $_POST['year'])){
            // stockage de la donnée sécurisée dans une variable
            $year = htmlspecialchars($_POST['year']);
        }else{
            $formError['year'] = 'l\'année n\'est pas valide.';
        }
    }else{
        $formError['year'] = 'le champ année est vide.';
    }

                    // picture
    //Si le champ contient des elements
    if(!empty($_POST['picture'])){
        // stockage de la donnée sécurisée dans une variable
        $picture = $_POST['picture'];
    }else{
        $formError['picture'] = 'le champ photo est vide.';
    }

                        // label
    //Si le champ contient des elements
    if(!empty($_POST['label'])){
        // verification de l'élément avec la regex
        if(preg_match($regLabel, $_POST['label'])){
            // stockage de la donnée sécurisée dans une variable
            $label = htmlspecialchars($_POST['label']);
        }else{
            $formError['label'] = 'le label n\'est pas valide.';
        }
    }else{
        $formError['label'] = 'le champ label est vide.';
    }

                     // genre
    //Si le champ contient des elements
    if(!empty($_POST['genre'])){
        // verification de l'élément avec la regex
        if(preg_match($regGenre, $_POST['genre'])){
            // stockage de la donnée sécurisée dans une variable
            $genre = htmlspecialchars($_POST['genre']);
        }else{
            $formError['genre'] = 'le genre n\'est pas valide.';
        }
    }else{
        $formError['genre'] = 'le champ genre est vide.';
    }

                    // price
    //Si le champ contient des elements
    if(!empty($_POST['price'])){
        // verification de l'élément avec la regex
        if(preg_match($regPrice, $_POST['price'])){
            // stockage de la donnée sécurisée dans une variable
            $price = htmlspecialchars($_POST['price']);
        }else{
            $formError['price'] = 'le prix n\'est pas valide.';
        }
    }else{
        $formError['price'] = 'le champ prix est vide.';
    }

                     // artistname
    //Si le champ contient des elements
    if(!empty($_POST['artistname'])){
        // verification de l'élément avec la regex
        if(preg_match($regArtistName, $_POST['artistname'])){
            // stockage de la donnée sécurisée dans une variable
            $artistname = htmlspecialchars($_POST['artistname']);
        }else{
            $formError['artistname'] = 'le nom de l\'artiste n\'est pas valide.';
        }
    }else{
        $formError['artistname'] = 'le champ nom de l\'artiste est vide.';
    }
    if (isset($_POST['submit']) && count($formError) === 0) {
        $requete = "INSERT INTO disc (disc_title, disc_year, disc_picture, disc_label, disc_genre, disc_price) 
VALUES('$title','$year','$picture','$label','$genre','$price')";
        $result = $db->query($requete);
    }else{
        echo "error";
    }
}