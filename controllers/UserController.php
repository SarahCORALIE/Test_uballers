<?php 

require 'models/function.php';

// connection bdd
$db = new PDO('mysql:host=localhost;dbname=test_uballers', 'root', '',
array(  PDO::ATTR_ERRMODE=>PDO::ERRMODE_WARNING,
PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"
) );

//debug( $_POST );
if($_GET){
    
    if(isset( $_GET['action'] ) & $_GET['action'] == 'register' ){
        register();
    }
    
    if(isset( $_GET['action'] ) & $_GET['action'] == 'login' ){
        login();
    }
}

$error = '';
$content = '';

function register(){ 
     
    global $db;
    global $error;
    global $content;

    if($_POST){
        
        //debug( $_POST );
        
        //CONTROLE sur les saisie de l'internaute : 

        if( $_POST['emailMobile'] !== $_POST['emailMobile2']){
            $error .= '<div class="alert alert-danger">Vous devez reseigner des identifiant identique !</div>';
        }
        if(empty($_POST['sexe']) ){
            $error .= "<div class='alert alert-danger'> Vous devez renseigner un genre</div>";
        }
        if(empty($_POST['lastname']) ){
            $error .= "<div class='alert alert-danger'> Vous devez renseigner un Nom de famille</div>";
        }
        if(empty($_POST['firstname']) ){
            $error .= "<div class='alert alert-danger'> Vous devez renseigner un Prénom</div>";
        }
        if(empty($_POST['password']) ){
            $error .= "<div class='alert alert-danger'> Vous devez renseigner un mot de passe</div>";
        }

        $r = $db->query( " SELECT email FROM user WHERE email = '$_POST[emailMobile]' XOR phone = '$_POST[emailMobile]' " );
        

        if( $r->rowCount() >= 1){

            $error .= '<div class="alert alert-danger">Identifiant indisponible</div>';
        }
        
        
        foreach( $_POST as $indice => $valeur ){

            $_POST[$indice] = htmlentities( addslashes( $valeur ) );
        }

            //cryptage du mot de passe
            $_POST['password'] = password_hash($_POST['password'],PASSWORD_DEFAULT);

            //INSERTION
            if( empty( $error ) ){

                if( is_string( $_POST['emailMobile'] ) ){

                    $db->query( " INSERT INTO user (email, password, firstname, lastname, birthday, sexe)
                    VALUES(
                            '$_POST[emailMobile]',
                            '$_POST[password]',
                            '$_POST[firstname]',
                            '$_POST[lastname]',
                            '$_POST[birthday]',
                            '$_POST[sexe]'
                            )
                    ");

                    $content .= '<p>Inscription réussie!</p>';
                }
                elseif( is_integer( $_POST['emailMobile'] ) ){

                    $db->query( " INSERT INTO user (phone, password, firstname, lastname, birthday, sexe)
                    VALUES(
                            '$_POST[emailMobile]',
                            '$_POST[password]',
                            '$_POST[firstname]',
                            '$_POST[lastname]',
                            '$_POST[birthday]',
                            '$_POST[sexe]'
                            )
                    ");

                    $content .= '<p>Inscription réussie!</p>';
                }

        }
    }
}

function login(){

    global $db;
    global $error;
    global $content;

    if($_POST){
    
        //debug($_POST);
        //comparaison du MDP
        $r = $db->query( " SELECT * FROM user WHERE email = '$_POST[emailMobile]' XOR phone = '$_POST[emailMobile]' " );
    
        if( $r->rowCount() >= 1 ){
            // récupèration des données 
            $user = $r->fetch( PDO::FETCH_ASSOC );
    
            //Vérificaion du mdp
            if(password_verify($_POST['password'], $user['password'] ) ){
    
                $content .= 'MDP OK connexion réussie!'; 
            }
            else{//sinon c que le mdp ne correspond pas
            $error .= '<div class="alert alert-danger">Erreur mot de passe </div>';            
            }
        }
        else{
            $error .= '<div class="alert alert-danger">Erreur identifiant </div>';    
        }
    }
}


