<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
    </head>
    <body>
        <form action="./index.php?controle=auth&action=ident" method="POST">
            <div id="container">
                <div id="spacer"></div>
                <img id="logo" src="logo.png">

                <div id="numetu" class="form-group" style="margin-top: 8vh;">
                    <label><b>Identifiant : </b> </label>
                    <input type="identifiant" class="form-control" placeholder="Entrez votre identifiant" name="username" value="<?php echo $username ?>" required>
                </div>
                <div id="numetu" class="form-group" style="margin-top: 5vh;">
                    <label><b>Mot de passe : </b> </label>
                    <input type="password" class="form-control" placeholder="Entrez votre mot de passe" name="password" value="" required>
                </div>
                <button type="submit" id="btn" class="btn btn-primary">Se connecter</button>
            </form>
        </div>
    </body>
</html>

<style>

#container {
    background-color: white;
    margin: 5vh;
    margin-left: 34%;
    margin-top: 9.7vh;
    margin-bottom: 10vh;
    height: 770px;
    width: 640px;
  
}

#spacer {
height: 6%;
}

#logo{
    height: 20%;
    display: block;
margin-left: auto;
margin-right: auto;
}


body {
    background-image:url(backimg.png);
    background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  font-size: 20px;
}

.form-control{
    font-size: 17px;
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
    width: 55%;
    font-size: 22px;
    position:relative;
    margin-top: 12vh;
}
.btn-primary, .btn-primary:hover, .btn-primary:active, .btn-primary:visited {
    background-color: #8b1538 
}

.form-group, .form-check{
    margin-left: 15vh;
    margin-right: 15vh;
    margin-bottom: 2rem;
    margin-top: 2rem;
}

.form-control{
    border-radius: 2rem;
    width: 100%;
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