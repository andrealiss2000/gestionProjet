<?php
session_start();

if (isset($_GET['controle']) & isset($_GET['action'])) {
    $controle = $_GET['controle'];
    $action = $_GET['action'];

    //actions vers les pages principales de l'application
    if ($action == "adminDashboard" || $action == "correctionCopies") {
        if (!isset($_SESSION["user_id"])) { //si user pas connecté alors on le renvoie vers la page d'authentification
            $action = "ident";
        }
    }
    //On restreint l'utilisateur a certaines pages selon sont usertype
     if ((isset($_SESSION["user_type"]) && $_SESSION["user_type"] != $controle) || (!isset($_SESSION["user_type"]) &&  $action != "ident" )) {
         $url = "./index.php?controle=correcteur&action=notAllowedPage";
         header("Location:" . $url);
    }
    


} else { //absence de paramètres : prévoir des valeurs => authentification 
    $controle = "authController";
    $action = "ident";

    
    if (!isset($_SESSION["user_id"])) {
        $url = "./index.php?controle=" . $controle . "&action=" . $action;
        header("Location:" . $url);
    }
}

//inclure le fichier php de contrôle 
//et lancer la fonction-action issue de ce fichier.	
if(file_exists('./Controller/' . $controle . '.php')){
    require('./Controller/' . $controle . '.php');
}
if (function_exists($action)) {
    $action();
} else {
    require("./Controller/error.php");
    notFound();
}
