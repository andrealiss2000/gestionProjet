<?php

/**
 * Username : login ou email
 * Password : mot de passe en clair (pas la version hasher)
 */
function verifIdentBD($username, $password)
{
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier

    $sql = "SELECT * FROM compte WHERE pseudoCompte=:pseudo OR pwdCompte=:mdp";
    try {
        $commande = $pdo->prepare($sql);

        $commande->bindParam(':pseudo', $username);
        $commande->bindParam(':mdp', $username);

        $bool = $commande->execute();
        if ($bool) {
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements

            if (count($resultat) > 0) {
                if($username == "admin"){
                    $_SESSION["user_type"] = "admin";
                }else{
                    $_SESSION["user_type"] = "correcteur";
                }
                return true;
            } else {
                return false;
            }
        }
    } catch (PDOException $e) {
        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
        return false;
        // die(); // On arrête tout.
    }
}
