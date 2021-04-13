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
        $commande->bindParam(':mdp', $password);

        $bool = $commande->execute();
        if ($bool) {
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements

            if (count($resultat) > 0) {
                $user_id = $resultat[0]["idCompte"];
                $_SESSION["user_id"] = $user_id;
                if($username == "admin"){
                    $_SESSION["user_type"] = "admin";
                }else{
                    $_SESSION["user_type"] = "correcteur";
                    $sql2 = "SELECT * FROM copie c, lot l, compte cpt, WHERE c.idLot=l.idLot AND l.idCompte=:id";
                    try {
                        $commande2 = $pdo->prepare($sql2);
                
                        $commande2->bindParam(':id', $user_id);
                
                        $bool2 = $commande2->execute();
                        if ($bool2) {
                            $resultat2 = $commande2->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
                            if (count($resultat2) > 0) {
                                $_SESSION["copies"] = $resultat2[0]["idEtudiant"];
                            }
                        }
                    } catch (PDOException $e) {
                        echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
                        return false;
                        // die(); // On arrête tout.
                    }
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
