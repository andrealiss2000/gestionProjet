<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    </head>
    <body>
        <div class="wrapper">
            <div id="import">
                <form action="./index.php?controle=admin&action=importExcelFile" method="post"
                        name="frmExcelImport" id="frmExcelImport" enctype="multipart/form-data">
                        <div>
                            <input type="file" name="file" id="file" accept=".xls,.xlsx">
                            <button type="submit" id="btn" name="import" class="btn btn-primary">Importer Excel</button>
                    
                        </div>
            
                </form>
               
                <p>Récupérer les informations des étudiants</p>
            </div>

            <div id="lookstat">
                <button type="submit" id="btn" class="btn btn-primary">Consulter statistiques</button>
                <p>Voir l'ensemble des données des étudiants</p>
            </div>
            <form action="./index.php?controle=admin&action=newAccount" method="POST">
                <div id="addnew">
                    <h1>Nouveau correcteur</h1>
                    <div class="form-group">
                        <label><b>Prénom :</b> </label>
                        <input type="prenom" class="form-control" placeholder="Entrez le prénom" name="prenom">
                    </div>
                    <div class="form-group">
                        <label><b>Nom :</b></label>
                        <input type="name" class="form-control" placeholder="Entrez le nom" name="nom">
                    </div>
                    <div class="form-group">
                        <label><b>Identifiant :</b> </label>
                        <input type="identifiant" class="form-control" placeholder="Entrez l'identifiant" name="pseudo">
                    </div>
                    <div class="form-group">
                        <label><b>Mot de passe :</b></label>
                        <input type="password" class="form-control" placeholder="Entrez le mot de passe" name="password">
                    </div>
                    <button type="submit" id="btn" class="btn btn-primary">Créer</button>
                </div>
            </form>
            <form action="./index.php?controle=admin&action=searchStudent" method="POST">

                <div id="find"> 
                    <input type="name" id="form-find" name="studentId" class="form-control" placeholder="&#xF002; Rechercher élève" style="font-family:Arial, FontAwesome">
                    <button type="submit" id="btn" class="btn btn-primary">Rechercher</button>
            </form>
                    <div id="table">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">Nom</th>
                                <th scope="col">Prénom</th>
                                <th scope="col">Groupe de TD</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th scope="row"><?php if(isset($nom)) echo($nom) ?></th>
                                <td style="height: 40px; overflow:hidden;"><?php if(isset($prenom)) echo($prenom) ?></td>
                                <td><?php if(isset($numTD)) echo($numTD) ?></td>
                                <td><?php if(isset($nom)) {?> <form action="./index.php?controle=admin&action=detailsStudent" method="POST"><button id="btnDetails" name="studentId"  class="btn btn-primary">Détails</button></form> <?php } ?></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row"></th>
                                <td style="height: 40px; overflow:hidden;"></td>
                                <td></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
           

            
        </div>
    </body>
</html>

<style>

 #import{
        background-color: white;
    }
#addnew{
        background-color: white;
    }
#find{
        background-color: white;
    }
#lookstat{
        background-color: white;
    }

.wrapper {
  display: grid;
  grid-template-columns: repeat(2, 1fr);
  grid-gap: 6vh;
  grid-auto-rows: 200px 600px;
  padding: 5vh;
}

body {
    background-color: #8b1538 
}

p{
    text-align: center;
    margin: 3vh;
    font-size: 18px;
}
h1{
    text-align: center;
    font-size: 22px;
    color: #8b1538;
    margin: 2rem;
}

#btn{
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 2rem;
    width: 40%;
    font-size: 22px;
    position:relative;
    margin-top:3rem;
}

#btnDetails{
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 1rem;
    font-size: 22px;
    position:relative;
}

#file{
    display: block;
    margin-left: auto;
    margin-right: auto;
    position:relative;
    margin-top:1rem;

}
#myFile{
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 2rem;
    width: 40%;
    font-size: 22px;
    position:relative;
    margin-top:3rem;
}
.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
    background-color: #8b1538 
}

.form-group, .form-check{
    margin-right: 16vh;
    margin-left: 23vh;
    margin-bottom: 2rem;
}

.form-control{
    border-radius: 2rem;
    width: 79%;
}

#form-find{
    display: block;
    margin-left: auto;
    margin-right: auto;
    border-radius: 2rem;
    width: 40%;
    position:relative;
    margin-top:2rem;
}

label{
    color: rgb(77, 77, 77);
}

table {
    margin-top: 2rem;   
    }
#table {
    margin: 2rem;
}
    
.table table-striped td { line-height: 18px; }
</style>