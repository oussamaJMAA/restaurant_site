<?php
include "../../controller/carteC.php";
    $error = "";
    
    // create form
    $carte = null;
    // create an instance of the controller
    $carteC = new carteC();
    

    echo "0";
    //echo $_POST['id'];
    //echo $_POST['etat'];
    //echo $_POST['date_creat'];
    //echo $_POST['date_expir'];

    if ( !empty($_POST["etat"]) && !empty($_POST["date_creat"]) && !empty($_POST["date_expir"])  ) 
    {
        echo "1";
    
    $carte = new carte( $_POST['etat'],$_POST['date_creat'],$_POST['date_expir'] );
        $carteC->modifierCarte($carte,$_POST['id']);

        header('Location:Table-Carte.php');
    }
    
    else
        $error = "Missing information";



    


    
?>