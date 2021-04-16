<?php


function ident()
{
    $username =  isset($_POST['username']) ? (htmlspecialchars($_POST['username'])) : '';
    $password = isset($_POST['password']) ? (htmlspecialchars($_POST['password'])) : '';
    $error = "";

    if (count($_POST) == 0) {
        require("./View/auth.php");
    } else {
        require("./Model/userBD.php");

        if (verifIdentBD($username, $password)) {

            //Faire la requete pour mettre BConnect a true
            // echo "Connected";
            
            if($_SESSION["user_type"] == "admin"){
                header("Location: ./index.php?controle=admin&action=adminDashboard");
            }else if($_SESSION["user_type"] == "correcteur"){
                header("Location: ./index.php?controle=correcteur&action=correctionCopies");
            }
            
        } else {
            //On ne dis pas exactement ce qui a planté (mpd ou login)
            $error = "Mot de passe ou login incorrect";
            $password = "";
            require("./View/auth.php");
        }
    }
}

