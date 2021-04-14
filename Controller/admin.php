<?php 


/**
 * Récupértion de la page d'accueil d'un admin
 */
function adminDashboard()
{
    require("./View/admin.php");
}

/**
 * Création d'un compte correcteur
 */
function newAccount()
{

    $nom =  isset($_POST['nom']) ? (htmlspecialchars($_POST['nom'])) : '';
    $prenom =  isset($_POST['prenom']) ? (htmlspecialchars($_POST['prenom'])) : '';
    $pseudo =  isset($_POST['pseudo']) ? (htmlspecialchars($_POST['pseudo'])) : '';
    $password =  isset($_POST['password']) ? ($_POST['password']) : '';
    $admin=0;

    $error = "";

    //si il n'y a aucun paramètres, on obtient un message d'erreur 
    if (count($_POST) == 0) {
        $error="Vous devez saisir les informations nécessaires";

    } else {
        require("./Model/userBD.php");
        if(newCorrectorAccount($nom, $prenom, $pseudo, $password, $admin)){
            require("./View/admin.php");
            function_alert("Création du compte terminée");
        }else {
            function_alert("Echec de création du compte correcteur");
            require("./View/admin.php");}

    }
}

function function_alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}


function importExcelFile(){
    
}