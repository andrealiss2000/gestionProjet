<?php 

function correctionCopies(){
    require("./Model/correcteurBD.php");
    if(getStudents()){
        require("./View/correcteur.php");
    }else{
        echo("problème");
    }
    
    

}

function submitNote(){
    require("./Model/correcteurBD.php");

    $test = $_POST;
    $idCopie = $_POST['idCopie'];
     
    $idCopie = intval($idCopie);

    $d1 = $_POST['d1']; 
    $d2 = $_POST['d2'];   
    $d3 = $_POST['d3'];   
    $d4 = $_POST['d4'];   
    $d5 = $_POST['d5']; 
    
    $d11 = $_POST['d11']; 
    $d12 = $_POST['d12']; 
    $d13 = $_POST['d13']; 
    $d14 = $_POST['d14']; 

    $d21 = $_POST['d21']; 
    $d22 = $_POST['d22']; 
    $d23 = $_POST['d23']; 
    $d24 = $_POST['d24']; 

    $d31 = $_POST['d31'];
    $d32 = $_POST['d32'];
    $d33 = $_POST['d33'];
    $d34 = $_POST['d34'];
    $d35 = $_POST['d35'];

    $d41 = $_POST['d41']; 
    $d42 = $_POST['d42']; 
    $d43 = $_POST['d43']; 
    $d44 = $_POST['d44']; 

    $d51 = $_POST['d51']; 
    $d52 = $_POST['d52']; 
    $d53 = $_POST['d53'];

    $bool = true;
    
    if(empty($d1)){
        if(!empty($d11) && !empty($d12) && !empty($d13) && !empty($d14)){
            $d11 = intval($d11); 
            $d12 = intval($d12); 
            $d13 = intval($d13); 
            $d14 = intval($d14); 
        }else{
            $d11 = 0; 
            $d12 = 0; 
            $d13 = 0; 
            $d14 = 0; 
        }

        $d1 = ($d11 + $d12 + $d13 + $d14);

        if($d1 < 10){
            $resultat = "AJ";
        }else if($d1>12){
            $resultat = "ADM";
        }else if($d1>=10 && $d1<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d1, $resultat, $idCopie, "d1")){
            $bool = true;
        }else{
            $bool = false;
        }
    }else{
        $d1 = intval($d1); 

        if($d1 < 10){
            $resultat = "AJ";
        }else if($d1>12){
            $resultat = "ADM";
        }else if($d1>=10 && $d1<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d1, $resultat, $idCopie, "d1")){
            $bool = true;
        }else{
            $bool = false;
        }
    }


    if(empty($d2)){
        if(!empty($d21) && !empty($d22) && !empty($d23) && !empty($d24)){
            $d21 = intval($d21); 
            $d22 = intval($d22); 
            $d23 = intval($d23); 
            $d24 = intval($d24); 
        }else{
            $d21 = 0; 
            $d22 = 0; 
            $d23 = 0; 
            $d24 = 0; 

            $d2 = ($d21 + $d22 + $d23 + $d24);

            if($d2 < 10){
                $resultat = "AJ";
            }else if($d2>12){
                $resultat = "ADM";
            }else if($d2>=10 && $d2<=12) {
                $resultat = "MOY";
            }
            
            if(updateNote($d2, $resultat, $idCopie, "d2")){
                $bool = true;
            }else{
                $bool = false;
            }
        }
    }else{
        $d2 = intval($d2); 

        if($d2 < 10){
            $resultat = "AJ";
        }else if($d2>12){
            $resultat = "ADM";
        }else if($d2>=10 && $d2<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d2, $resultat, $idCopie, "d2")){
            $bool = true;
        }else{
            $bool = false;
        }
    }


    if(empty($d3)){
        if(!empty($d31) && !empty($d32) && !empty($d33) && !empty($d34) && !empty($d35)){
            $d31 = intval($d31); 
            $d32 = intval($d32); 
            $d33 = intval($d33); 
            $d34 = intval($d34); 
            $d34 = intval($d34); 
        }else{
            $d31 = 0; 
            $d32 = 0; 
            $d33 = 0; 
            $d34 = 0; 
            $d34 = 0; 
        }

        $d3 = ($d31 + $d32 + $d33 + $d34 + $d35)*(4/5);

        if($d3 < 10){
            $resultat = "AJ";
        }else if($d3>12){
            $resultat = "ADM";
        }else if($d3>=10 && $d3<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d3, $resultat, $idCopie, "d3")){
            $bool = true;
        }else{
            $bool = false;
        }

    }else{
        $d3 = intval($d3); 

        if($d3 < 10){
            $resultat = "AJ";
        }else if($d3>12){
            $resultat = "ADM";
        }else if($d3>=10 && $d3<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d3, $resultat, $idCopie, "d3")){
            $bool = true;
        }else{
            $bool = false;
        }
    }

    if(empty($d4)){
        if(!empty($d41) && !empty($d42) && !empty($d43) && !empty($d44)){
            $d41 = intval($d41); 
            $d42 = intval($d42); 
            $d43 = intval($d43); 
            $d44 = intval($d44); 
        }else{
            $d42 = 0; 
            $d43 = 0; 
            $d44 = 0; 
        }

        $d4 = ($d41 + $d42 + $d43 + $d44);

        if($d4 < 10){
            $resultat = "AJ";
        }else if($d4>12){
            $resultat = "ADM";
        }else if($d4>=10 && $d4<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d4, $resultat, $idCopie, "d4")){
            $bool = true;
        }else{
            $bool = false;
        }

    }else{
        $d4 = intval($d4); 

        if($d4 < 10){
            $resultat = "AJ";
        }else if($d4>12){
            $resultat = "ADM";
        }else if($d4>=10 && $d4<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d4, $resultat, $idCopie, "d4")){
            $bool = true;
        }else{
            $bool = false;
        }
    }

    if(empty($d5)){
        if(!empty($d51) && !empty($d52) && !empty($d53) && !empty($d54)){
            $d51 = intval($d51); 
            $d52 = intval($d52); 
            $d53 = intval($d53); 
            $d54 = intval($d54); 
        }else{
            $d51 = 0; 
            $d52 = 0; 
            $d53 = 0; 
            $d54 = 0; 
        }
        $d5 = ($d51 + $d52 + $d53 + $d54);

        if($d5 < 10){
            $resultat = "AJ";
        }else if($d5>12){
            $resultat = "ADM";
        }else if($d5>=10 && $d5<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d5, $resultat, $idCopie, "d5")){
            $bool = true;
        }else{
            $bool = false;
        }
    }else{
        $d5 = intval($d5); 

        if($d5 < 10){
            $resultat = "AJ";
        }else if($d5>12){
            $resultat = "ADM";
        }else if($d5>=10 && $d5<=12) {
            $resultat = "MOY";
        }
        
        if(updateNote($d5, $resultat, $idCopie, "d5")){
            $bool = true;
        }else{
            $bool = false;
        }
    }

    if($bool){
        require("./View/correcteur.php");
    }else{
        echo("probleme");
    }


}

