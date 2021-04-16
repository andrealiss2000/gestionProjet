<?php 

    $hostname = "localhost";
    $loginBD= "root";
    $base= "ufr_c2i";
    $passBD="root";

    try {
        $pdo = new PDO ("mysql:server=$hostname; dbname=$base;", "$loginBD", "$passBD");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Succes";
    }

    catch (PDOException $e) {
        die  ("Echec de connexion : " . $e->getMessage() . "\n");
        // echo "Erreur";
    }

    ?>