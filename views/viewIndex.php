<?php
$error = '';
$content = '';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Test Uballers</title>
        <link rel="stylesheet" href="public/assets/css/style.css">
        <!-- font -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <div id="container">
            <header>
                <form class="row" method="post" action="?action=login">
                    <div class="col">
                        <label for="email-mobile">Adresse e-meail ou mobile</label>
                        <input type="text" id="email-mobile" name="emailMobile" placeholder="Votre login" >
                    </div><!-- fin col -->
                    <div class="col">
                        <label for="password">Mot de passe</label>
                        <input type="password" id="password" name="password" placeholder="Votre mot de passe" >
                        <a href="#">Informations de compte oubliées ?</a>
                    </div><!-- fin col -->
                    <div class="col">
                        <input type="submit" value="Connexion" id="login">
                    </div><!-- fin col -->
                </form><!-- fin row -->
            </header>

            <main>
                <h1>Inscription</h1>
                <h3>C'est gratuit (et ça le restera toujours )</h3>
                
                <?= $error; ?>
                <?= $content; ?>
                   
                <form action="?action=register" method="post">
                    <div class="row">
                        <input type="text" id="firstname" name="firstname" placeholder="Prénom" >                    
                        <input type="text" id="lastname" name="lastname" placeholder="Nom de famille" >
                    </div>
                    <input type="text" name="emailMobile" placeholder="Numéro de mobile ou email" >
                    <input type="text" name="emailMobile2" placeholder="Numéro de mobile ou email" >
                    <input type="text" id="password" name="password" placehoder="Nouveau mot de passe" >

                    <h3>Date de naissance</h3>

                    <div class="row1">                    
                        <input type="date" id="birthday" name="birthday" placeholder="birthday" >
                        <a href="#">
                            <p>
                            Pourquoi indiquer ma date de naissance ?
                            </p>
                        </a>
                    </div>
                    <div class="row2">                    
                        <input type="radio"  name="sexe" value="f">Femme
                        <input type="radio"  name="sexe" value="m">Homme
                    </div>

                    <p>
                    En cliquant sur Inscription, vous acceptez nos <a href="#">Conditions</a> et Indiquez que vous avez lu notre <a href="#">Politique d'utilisation des données</a>, y compris notre <a href="#">Utilisation des cookies.</a> Vous pourrez recevoir des notifications par texto de la part de Facebook et pouvez vous désabonner à tout moment. 
                    </p>

                    <input type="submit" value="Inscription" id="inscription">
                </form>
            </main>
        </div>   
    </body>
</html>