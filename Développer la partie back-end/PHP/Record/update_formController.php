<?php
require_once "database.php"; // Inclusion de la connexion a la bdd
$db = connexionBase(); //fonction de connexion a la bdd
// tableau d'erreur
$formError =[];

// regex
$regTitle = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';
$regYear='/^\d{1,4}$/';
$regLabel = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';
$regGenre = '/^[A-Za-z-_áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ ]{1,64}$/';
$regPrice = '/^\d{1,3}(?:[.,]\d{3})*(?:[.,]\d{2})$/';





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
    if(!empty($_FILES['picture'])){
        // Données de l'image
        $file_name = $_FILES['picture']['name'];
        $file_size =$_FILES['picture']['size'];
        $file_tmp =$_FILES['picture']['tmp_name'];
        $file_type=$_FILES['picture']['type'];
        $fileNameCmps = explode(".", $file_name);
        $fileExtension = strtolower(end($fileNameCmps));
        //  déclaration des extensions autorisés pour l'upload de l'image
        $extensions= array("jpeg","jpg","png");
        // Si l'extension du fichier ne correspond pas aux extensions autorisés
        if(in_array($fileExtension,$extensions)=== false){
            $formError['picture']= "Extension non autorisée";
        }   else{ //si tout est bon
            if(move_uploaded_file($file_tmp, 'assets/img/'.$title.'.'.$fileExtension))
            {
                // stockage de la donnée sécurisée dans une variable
                $picture = $title.'.'.$fileExtension;
            }else{
                $formError['picture']= "erreur lors de l'upload";
            }
        }
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
    if(!empty($_POST['artistid'])){
        $artistid = $_POST['artistid'];
    }else{
        $formError['artistid'] = 'le champ nom de l\'artiste est vide.';
    }

    // requête de modification des données si envoi du formulaire avec succès
    if (isset($_POST['submit']) && count($formError) === 0) {
        $requete = "UPDATE disc
SET disc_title ='$title', disc_year ='$year' ,disc_picture='$picture',disc_genre ='$genre',disc_label ='$label', disc_price ='$price', artist_id='$artistid' WHERE disc_id ='".$_GET['disc_id']."'";
        $result = $db->query($requete);
    }else{
        echo "error";
    }
}