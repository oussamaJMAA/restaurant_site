<?php
include "../../controller/carteC.php";
    $error = "";
    
    // create form
    $carte = null;
    // create an instance of the controller
    $carteC = new carteC();
    

    echo "0";
    echo $_POST['id'];

    if ( !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["password"]) 
    && !empty($_POST["totalpoints"])    ) 
    {
        echo "1";
    
    $carte = new carte( $_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['password'],$_POST['totalpoints']);
        $carteC->modifierCarte($carte,$_POST['id']);

        header('Location:Table-Carte.php');
    }
    
    else
        $error = "Missing information";



    


    
?>