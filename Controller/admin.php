<?php 
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

/**
 * Récupértion de la page d'accueil d'un admin
 */
function adminDashboard()
{
    require("./View/admin.php");  
}

function searchStudent(){

    $studentId =  isset($_POST['studentId']) ? (htmlspecialchars($_POST['studentId'])) : '';
    $_SESSION['studentId'] = $studentId;

    if (count($_POST) == 0) {
        $error="Vous devez saisir les informations nécessaires";

    } else {
        require("./Model/userBD.php");
        $student = rechercherEtudiant($studentId);
        if($student != null){
            $nom=$student[0]['nom'];
            $prenom=$student[0]['prenom'];
            $numTD=$student[0]['numTD'];
            require("./View/admin.php");
        }
      
    }
       


}   

function detailsStudent(){
    $studentId =  isset( $_SESSION['studentId']) ? (htmlspecialchars($_SESSION['studentId'])) : '';
    if ($studentId == null) {
        $error="Erreur";
        echo($error);

    } else {
        require("./Model/userBD.php");
        $student = getStudentDetails($studentId);
        $vagueStudent=$student[0]['idVague'];
        $nom=$student[0]['nom'];
        $prenom=$student[0]['prenom'];
        $nomPrenomCorrecteur=$prenom . ' ' .  $nom;
        require("./View/detailsStudent.php");
    }
       
    


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
   // If you need to parse XLS files, include php-excel-reader
	require('./import-excel/php-excel-reader/excel_reader2.php');

	require('./import-excel/SpreadsheetReader.php');
    require("./Model/userBD.php");


    if (isset($_POST["import"])) {

        $allowedFileType = [
            'application/vnd.ms-excel',
            'text/xls',
            'text/xlsx',
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
        ];
    
        if (in_array($_FILES["file"]["type"], $allowedFileType)) {
    
            $targetPath = './import-excel/uploads/' . $_FILES['file']['name'];
            move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

            $Reader = new SpreadsheetReader('./import-excel/uploads/etudiants.xlsx');
            foreach ($Reader as $Row)
            {
                $id=$Row[0];
                $nom=$Row[1];
                $prenom=$Row[2];
                $grpTD=$Row[3];
                createStudent($id, $nom, $prenom, $grpTD);
                createStudentCopie($id);
                
            }
            //créer des lots => nbEtudiants / nbProfesseurs
                getNbEtudiants();
                $nbEtudiants = $_SESSION['nb_etudiants'];
                getNbCorrecteurs();
                $nbCorrecteurs = $_SESSION['nb_correcteurs'];
                $nbLotsParCorrecteur = (int)($nbEtudiants/$nbCorrecteurs);
                $nbLots = $nbLotsParCorrecteur *  $nbCorrecteurs; 
                getNbVagues();
                $nbVagues=$_SESSION['nb_vagues'];
                $nbLotsParVague= (int)($nbLots/$nbVagues);
                $nbCopiesParLot= (int)($nbEtudiants/$nbLots);
                //pour chaque vague, on créer nbLotsPasVague lots, puis on affecte chaque lot à un compte, puis affecte lot à copie
                getVaguesIds();
                getCorrecteursIds();
                $correcteursIds = $_SESSION['id_correcteurs'];
                $vaguesIds=$_SESSION['id_vagues'];
                foreach($vaguesIds as $vague){
                    foreach($correcteursIds as $correcteur){
                        for ($i = 0; $i <  $nbLotsParCorrecteur; $i++) {
                            createLot($correcteur['idCompte'],$vague['idVague']);//création du lot
                        }
                    }
                    
                }
                getLotsIds();
                getCopiesIds();


                $lotsIds = $_SESSION['id_lots'];
                $copiesIds = $_SESSION['id_copies'];


                getLibelleDomaines();
                $libellesDomaines = $_SESSION['libelles_domaines'];
                //faire les liens entre les copies et les domaines
                foreach($copiesIds as $copie){
                    foreach($libellesDomaines as $domaine){
                        echo(lienCopieDomaine($copie['idCopie'], $domaine['libelleDomaine']));
                    }
                   

                }
               

                //assigner des lots à des copies 
                foreach($lotsIds as $lot){
                    for ($i = 0; $i <  $nbCopiesParLot; $i++) {
                        if(count($copiesIds)!=0){
                            assignerLotACopie($lot['idLot'],$copiesIds[0]['idCopie']);//création du lot
                            $removed = array_shift($copiesIds);
                        }
                        
                    }

                }
            

            function_alert("Les données ont bien été importées");
            require("./View/admin.php");
        
            
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }    


}
