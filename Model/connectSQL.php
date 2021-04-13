<?php 

    $hostname = "localhost";
    $loginBD= "root";
    $base= "ufr_c2i";
    $passBD="root";

    try {
        $pdo = new PDO ("mysql:server=$hostname; dbname=$base", "$loginBD", "$passBD");
        // echo "Succes";
    }

    catch (PDOException $e) {
        die  ("Echec de connexion : " . $e->getMessage() . "\n");
        // echo "Erreur";
    }

    ?>