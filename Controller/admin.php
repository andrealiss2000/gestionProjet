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
            }
            function_alert("Les données ont bien été importées");
            require("./View/admin.php");
        
            
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }    


}
