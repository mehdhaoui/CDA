<?php
// connexion BDD
require_once "connexion_bdd.php"; // Inclusion de notre bibliothèque de fonctions
// $requete = "SELECT* FROM produits ORDER BY pro_d_ajout DESC";

// $result = $db->query($requete);
// variable de messages d'erreurs
$error_ID="";
$error_REF="";
$error_CAT="";
$error_LIB="";
$error_DESC="";
$error_PRIX="";
$error_STOCK="";
$error_COULEUR="";
$error_RADIO="";
$error_DATEAJOUT="";
$error_DATEMODIF="";

// REGEX pour tester les champs
$REGIDCAT ="/^[0-9]{1,10}$/"; //pour l'id et categorie de l'id
$REGREF ="/^[a-z0-9_\-]{1,10}$/i"; //
$REGLIB ="/^[a-z0-9_\-\s]{1,200}$/i";
$REGDESC ="/^[a-z0-9_\-\s,.()']{1,1000}$/i";
$REGPRIX ="/^[0-9]{1,6}(.[0-9]{0,2})$/";
$REGSTOCK ="/^[0-9]{1,11}$/";
$REGCOULEUR ="/^[a-z]{1,30}$/i";
$REGDATE = "/^(\d{4,})-(\d{2})-(\d{2})$/"; // date


// securité xss pour les espaces; antislash caracteres spéciaux
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Variables des données récupérés et testés
$ID=(test_input($_POST["ID"]));
$REF=(test_input($_POST["Référence"]));
$CAT=(test_input($_POST["Catégorie"]));
$LIB=(test_input($_POST["Libellé"]));
$DESC=$_POST["Description"];
$PRIX=(test_input($_POST["Prix"]));
$STOCK=(test_input($_POST["Stock"]));
$COULEUR=(test_input($_POST["Couleur"]));
$RADIO=$_POST["customRadioInline1"];
$DATEAJOUT=$_POST["DateAjout"];
// $DATEMODIF=$_POST["DateModification"];

// tests des champs saisis :
if(isset($_POST['Modifier']))
{
    //ID
    if((empty($ID))||(!preg_match($REGIDCAT, $ID)))
    {
        header("Location:produits_ajout.php?erreur=ID");
        exit;
    }

    // REFERENCE
    else if((empty($REF))||(!preg_match($REGREF, $REF)))
    {
        header("Location:produits_ajout.php?erreur=REF");
        exit;
    }

    // CATEGORIE
    else if((empty($CAT))||(!preg_match($REGIDCAT, $CAT)))
    {
        header("Location:produits_ajout.php?erreur=CAT");
        exit;
    }

    // Libellé
    else if((empty($LIB))||(!preg_match($REGLIB, $LIB)))
    {
        header("Location:produits_ajout.php?erreur=LIB");
        exit;
    }


    // Description
    else if((empty($DESC))||(!preg_match($REGDESC, $DESC)))
    {
        header("Location:produits_ajout.php?erreur=DESC");
        exit;
    }

    // Prix
    else if((empty($PRIX))||(!preg_match($REGPRIX, $PRIX)))
    {
        header("Location:produits_ajout.php?erreur=PRIX");
        exit;
    }

    // Stock
    else if((empty($STOCK))||(!preg_match($REGSTOCK, $STOCK)))
    {
        header("Location:produits_ajout.php?erreur=STOCK");
        exit;
    }

    // Couleur
    else if((empty($COULEUR))||(!preg_match($REGCOULEUR, $COULEUR)))
    {
        header("Location:produits_ajout.php?erreur=COULEUR");
        exit;
    }
    // radio
    else if(!isset($RADIO))
    {
        header("Location:produits_ajout.php?erreur=RADIO");
        exit;
    }
    // date ajout
    else if ((empty($DATEAJOUT))||(!preg_match($REGDATE, $DATEAJOUT)))
    {
        header("Location:produits_ajout.php?erreur=DATEAJOUT");
        exit;
    }else{

        $db = connexionBase(); // Appel de la fonction de connexion
        $requete = "INSERT INTO produits (pro_id, pro_cat_id, pro_ref, pro_libelle, pro_description, pro_prix, pro_stock, pro_couleur,customRadioInline1, pro_bloque, pro_d_ajout) VALUES('$ID','$REF','$CAT','$LIB','$DESC','$PRIX','$STOCK','$COULEUR','$RADIO','$DATEAJOUT')";
        $result = $db->query($requete);
        echo "Ajout effectué";
    }

    // date modification
    // if ((empty($DATEMODIF))||(!preg_match($REGDATE, $DATEMODIF)))
    // {
    //     header("Location:produits_ajout.php?erreur=DATEMODIF");
    //     exit;
    // }

}
// header("Location:liste.php");
// exit;

?>