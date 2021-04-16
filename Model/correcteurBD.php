<?php

function getStudents(){
    $user_id = $_SESSION["user_id"];
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql2 = "SELECT * from etudiant, copie, lot 
            where etudiant.idEtudiant=copie.idEtudiant
            and copie.idLot=lot.idLot
            and lot.idCompte=:id;";
    //$sql2 = "SELECT * FROM etudiant, lot, copie WHERE lot.idCompte=:id AND copie.idLot=lot.idLot;";
        try {
            $_SESSION["oui"] = "teesrt";
            $commande2 = $pdo->prepare($sql2);
            $commande2->bindParam(':id', $user_id);
            $bool2 = $commande2->execute();
            $_SESSION["oui"] = "marche";
            if ($bool2) {
                $resultat2 = $commande2->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
                if (count($resultat2) > 0) {
                    //$_SESSION["copies"] = $resultat2[0]["idEtudiant"];
                    $_SESSION["copies"] = $resultat2;
                    $_SESSION["oui"] = $resultat2;
                     return true;
                }else{
                    $_SESSION["oui"] = count($resultat2);
                    return false;
                }
            }
        } catch (PDOException $e) {
            echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            return false;
            // // On arrête tout.
        }
}



function updateNote($note, $resultat, $idCopie, $domaine){
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier

    $sql = "UPDATE copie_domaine 
            SET copie_domaine.noteDomaine=:note, copie_domaine.resultat_domaine=:resultat
            WHERE copie_domaine.idCopie=:idcopie
            AND copie_domaine.libelleDomaine=:domaine;
             ";
    //$sql2 = "SELECT * FROM etudiant, lot, copie WHERE lot.idCompte=:id AND copie.idLot=lot.idLot;";
        try {
            $_SESSION["oui"] = "teesrt";
            $commande = $pdo->prepare($sql);
            $commande->bindParam(':note', $note);
            $commande->bindParam(':resultat', $resultat);
            $commande->bindParam(':idcopie', $idCopie);
            $commande->bindParam(':domaine', $domaine);
            $bool = $commande->execute();
            $_SESSION["oui"] = "marche";
            if ($bool) {
                return true;
            }
        } catch (PDOException $e) {
            echo utf8_encode("Echec de select : " . $e->getMessage() . "\n");
            return false;
            // // On arrête tout.
        }

}