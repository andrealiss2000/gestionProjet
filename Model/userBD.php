<?php
error_reporting(E_ALL);  ini_set("display_errors", 1);
/**
 * Username : login ou email
 * Password : mot de passe en clair (pas la version hasher)
 */
function verifIdentBD($username, $password)
{
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier

    $sql = "SELECT * FROM compte WHERE pseudoCompte=:pseudo AND pwdCompte=:mdp";
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


/**
 * Création d'un compte dans l'application
 */
function newCorrectorAccount($nom, $prenom, $pseudo, $password,$admin){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "INSERT INTO compte (nom, prenom, pseudoCompte, pwdCompte, adminCompte) VALUES (:nom, :prenom, :pseudo, :pwd, 0)";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':nom', $nom);
        $commande->bindParam(':prenom', $prenom);
        $commande->bindParam(':pseudo', $pseudo);
        $commande->bindParam(':pwd', $password);
        
        $bool =  $commande->execute();
        
        if($bool){
            return true;
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }
}


function getStudentDetails($studentId){

     
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT L.idVague,C.nom, C.prenom from etudiant E INNER JOIN copie ON 
    copie.idEtudiant = E.idEtudiant INNER JOIN lot L ON L.idLot = copie.idLot INNER JOIN compte C
    ON L.idCompte = C.idCompte WHERE E.idEtudiant=:id";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id', $studentId);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                return $resultat;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}


/**
 * Création d'un étudiant 
 */
function createStudent($id, $nom, $prenom, $grpTD){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "INSERT INTO etudiant (idEtudiant, nom, prenom, numTD) VALUES (:id, :nom, :prenom, :grpTD)";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id', $id);
        $commande->bindParam(':nom', $nom);
        $commande->bindParam(':prenom', $prenom);
        $commande->bindParam(':grpTD', $grpTD);
        
        $bool =  $commande->execute();
        
        if($bool){
            return true;
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

/**
 * Création de la copie d'un étudiant
 */
function  createStudentCopie($id){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "INSERT INTO copie (idEtudiant) VALUES (:id)";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id', $id);
        
        $bool =  $commande->execute();
        
        if($bool){
            return true;
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

function getNbEtudiants(){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT DISTINCT  count(idEtudiant) from etudiant";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['nb_etudiants'] = $resultat[0]['count(idEtudiant)'];
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

function getNbCorrecteurs(){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT DISTINCT count(idCompte) from compte WHERE adminCompte=0";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['nb_correcteurs'] = $resultat[0]['count(idCompte)'];
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

function getNbVagues(){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT DISTINCT count(idVague) from vague";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['nb_vagues'] = $resultat[0]['count(idVague)'];
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}


function getVaguesIds(){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT idVague from vague";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['id_vagues'] = $resultat;
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

function  getCorrecteursIds(){
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT idCompte from compte";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['id_correcteurs'] = $resultat;
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }
}
 


function getLotsIds(){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT idLot from lot";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['id_lots'] = $resultat;
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

function getCopiesIds(){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT idCopie from copie";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['id_copies'] = $resultat;
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

/**
 * Assigner un lot à une copie 
 */

 function assignerLotACopie($idLot, $idCopie){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "UPDATE copie SET idLot=:idLot WHERE idCopie=:idCopie";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':idLot', $idLot);
        $commande->bindParam(':idCopie', $idCopie);
        
        $bool =  $commande->execute();
        
        if($bool){
            return true;
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

 }
      
function getLibelleDomaines(){

    
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT libelleDomaine from domaine";
    try {
        $commande = $pdo->prepare($sql);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                $_SESSION['libelles_domaines'] = $resultat;
                return true;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }


}

function lienCopieDomaine($idCopie, $libelleDomaine){

    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "INSERT INTO copie_domaine (idCopie, libelleDomaine) VALUES (:idCopie, :nomDomaine)";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':idCopie', $idCopie);
        $commande->bindParam(':nomDomaine', $libelleDomaine);
        
        $bool =  $commande->execute();
        
        if($bool){
            return true;
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }


}   


function rechercherEtudiant($studentId){

     
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "SELECT nom, prenom, numTD from etudiant WHERE idEtudiant=:id";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':id', $studentId);
        $bool =  $commande->execute();
        
        if($bool){
            $resultat = $commande->fetchAll(PDO::FETCH_ASSOC); 
            if (count($resultat) > 0) {
                return $resultat;
            }
            
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

/**
 * Création d'un lot
 */
function createLot($idCompte, $idVague){
    
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql = "INSERT INTO lot (idCompte, idVague) VALUES (:idCompte, :idVague)";
    try {
        $commande = $pdo->prepare($sql);
        $commande->bindParam(':idCompte', $idCompte);
        $commande->bindParam(':idVague', $idVague);
        
        $bool =  $commande->execute();
        
        if($bool){
            return true;
        } else{
            die('execute() failed: ' . htmlspecialchars($commande->error));
            return false;
        } 
       // var_dump($bool);
    } catch (PDOException $e) {
        echo utf8_encode("Echec de insert : " . $e->getMessage() . "\n");
        echo "Erreur insert";
        return false;
    }

}

function getStudents(){
    $user_id = $_SESSION["user_id"];
    require('./Model/connectSQL.php'); //$pdo est défini dans ce fichier
    $sql2 = "SELECT * FROM etudiant";
    //$sql2 = "SELECT * FROM copie c, lot l WHERE l.idCompte=:id AND c.idLot=l.idLot;";
        try {
            $_SESSION["oui"] = "teesrt";
            $commande2 = $pdo->prepare($sql2);
            $commande2->bindParam(':id', $user_id);
            $bool2 = $commande2->execute();
            $_SESSION["oui"] = "marche";
            if ($bool2) {
                $resultat2 = $commande2->fetchAll(PDO::FETCH_ASSOC); //tableau d'enregistrements
                if (count($resultat2) > 0) {
                    $_SESSION["copies"] = $resultat2[0]["idEtudiant"];
                    $_SESSION["oui"] = $resultat2;
                    var_dump($resultat2);
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


    