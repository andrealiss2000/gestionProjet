<html>
    <head>
        <title>Correcteur</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <body>
        <div id="container">
            <div id="spacer"></div>
            
            <h1>Saisie des notes </h1>


            <form action="./index.php?controle=correcteur&action=submitNote" method="POST">
                <div id="numetu" class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                        Sélectionner étudiant
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu">
                        <?php foreach($_SESSION["copies"] as $key=>$value): ?>
                            <li class="etudiant" name=<?=$value['idCopie'];?> data-nom=<?=$value['nom'];?> data-prenom=<?=$value['prenom'];?> data-id=<?=$value['idEtudiant'];?>> <?= ucfirst($value["prenom"]) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <input id="inputEtu" type="identifiant" class="form-control2" placeholder="">

                </div>

                <div class="row" style="margin-top: 3vh">
                    <div class="form-group" style="margin-left: 13%" >
                        <label><b>D1 : </b></label>
                        <input type="number" id="d1" name="d1" class="form-control1"><span> /20</span>
                    </div>
                    <div class="form-group">
                        <label><b>D2 : </b></label>
                        <input type="number" id="d2" name="d2" class="form-control1"><span> /20</span>
                    </div>
                    <div class="form-group">
                        <label><b>D3 : </b></label>
                        <input type="number" id="d3" name="d3" class="form-control1"><span> /20</span>
                    </div>
                    <div class="form-group">
                        <label><b>D4 : </b></label>
                        <input type="number" id="d4" name="d4" class="form-control1"><span> /20</span>
                    </div>
                    <div class="form-group">
                        <label><b>D5 : </b></label>
                        <input type="number" id="d5" name="d5" class="form-control1"><span> /20</span>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="form-group" style="margin-left: 14%" >
                        <label><b>1.1 : </b></label>
                        <input type="number" id="d11" name="d11" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>2.1 : </b></label>
                        <input type="number" id="d21" name="d21" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>3.1 : </b></label>
                        <input type="number" id="d31" name="d31" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>4.1  : </b></label>
                        <input type="number" id="d41" name="d41" class="form-control1"><span> /5</span>
                    </div> 
                    <div class="form-group">
                        <label><b>5.1 : </b></label>
                        <input type="number" id="d51" name="d51" class="form-control1"><span> /5</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" style="margin-left: 14%" >
                        <label><b>1.2 : </b></label>
                        <input type="number" id="d12" name="d12" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>2.2 : </b></label>
                        <input type="number" id="d22" name="d22" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>3.2 : </b></label>
                        <input type="number" id="d32" name="d32" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>4.2  : </b></label>
                        <input type="number" id="d42" name="d42" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>5.2 : </b></label>
                        <input type="number" id="d52" name="d52" class="form-control1"><span> /5</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" style="margin-left: 14%" >
                        <label><b>1.3 : </b></label>
                        <input type="number" id="d13" name="d13" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>2.3 : </b></label>
                        <input type="number" id="d23" name="d23" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>3.3 : </b></label>
                        <input type="number" id="d33" name="d33" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>4.3  : </b></label>
                        <input type="number" id="d43" name="d43" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>5.3 : </b></label>
                        <input type="number" id="d53" name="d53" class="form-control1"><span> /5</span>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group" style="margin-left: 14%" >
                        <label><b>1.4 : </b></label>
                        <input type="number" id="d14" name="d14" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>2.4 : </b></label>
                        <input type="number" id="d24" name="d24" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>3.4 : </b></label>
                        <input type="number" id="d34" name="d34" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>4.4  : </b></label>
                        <input type="number" id="d44" name="d44" class="form-control1"><span> /5</span>
                    </div>
                </div>
                <div class="row">
                    <div id="hiddenone" class="form-group" style="margin-left: 14%">
                        <label><b>1.5 : </b></label>
                        <input type="number" id="d15" name="d15" class="form-control1"><span> /5</span>
                    </div>
                    <div id="hiddenone" class="form-group">
                        <label><b>2.5 : </b></label>
                        <input type="number" id="d25" name="d25" class="form-control1"><span> /5</span>
                    </div>
                    <div class="form-group">
                        <label><b>3.5 : </b></label>
                        <input type="number" id="d35" name="d35" class="form-control1"><span> /5</span>
                    </div>
                </div>
                
                <div id="spacer2"></div>
                <button type="submit" id="btn" class="btn btn-primary">Valider</button>
            </form>
        </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>

<script type="text/javascript">
    $('.etudiant').click(function(){
        console.log();
        $nom = $(this).data('nom');
        $prenom = $(this).data('prenom');
        $('#inputEtu').val($nom.toUpperCase() + " " + $prenom.charAt(0).toUpperCase() + $prenom.substr(1).toLowerCase());
        
    });
</script>                            

    </body>

</html>
<style>
body {
    background-color: #8b1538;
    font-size: 18px;

    }

.etudiant:hover{
    background-color: #EEEEEE;
}

#spacer{
height: 1.3rem;
}

#spacer2{
    height: 3rem;
}

#hiddenone{
    visibility: hidden;
}

hr {
  border-top:1px dashed black;
  margin-top: 4vh;
  margin-bottom: 4vh;
  width:90%;
}

#container {
    background-color: white;
    margin: 5vh 5vh 5vh 10vh;
    height: 90%;
    width: 90%;
  
}
h1{
    text-align: center;
    font-size: 42px;
    color: #8b1538;
    margin: 2rem;
}

#logo {
    height: 23%;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-bottom: 4rem; 
}

.form-control{
    border-radius: 2rem;
    width: 79%;
}

#note{
    width: 35%;
}

#numetu {
    width: 30%;
    margin-left: 38%;
    margin-bottom: 8vh;
}
label{
    color: rgb(77, 77, 77);
    display: inline-block;
    text-align: left;
    margin-right: 0.5vh;
}

#btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top: 5vh;
    border-radius: 2rem;
    width: 40%;
    font-size: 22px;
}

.form-control2{
    border: 1px solid #ced4da;
    border-radius: 2rem;
    size: 30%;
    font-size: 1rem;
    padding: .375rem .75rem;
    color: #495057;
    line-height: 1.5;
    background-color: #fff;
    background-clip: padding-box;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    
}

.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
    background-color: #8b1538 
}

</style>