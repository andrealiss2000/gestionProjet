<?php 

    $hostname = "localhost";
    $loginBD= "root";
    $base= "nouveau";
    $passBD="root";

    try {
        $pdo = new PDO ("mysql:server=$hostname; dbname=$base;port=3307", "$loginBD", "$passBD");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Succes";
    }

    catch (PDOException $e) {
        die  ("Echec de connexion : " . $e->getMessage() . "\n");
        // echo "Erreur";
    }

    ?>