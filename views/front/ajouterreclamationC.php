<?php
include "../../Controller/ReclamationC.php";
    $error = "";
    
    // create form
    $reclamation = null;
    // create an instance of the controller
    $reclamationC = new reclamationC();
    

    echo "0";
    echo $_POST["nom"];
    echo $_POST["email"];
    echo $_POST["sujet"];
    echo $_POST["message"];


    if ( !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["sujet"]) 
    && !empty($_POST["message"]) ) 
    {
        echo "1";
    
    $reclamation = new reclamation( $_POST['nom'],$_POST['email'],$_POST['sujet'],$_POST['message']);
        $reclamationC->ajouterReclamation($reclamation);

        //header('Location:Table-Reclamation.php');
        header('Location:afficherreclamation.php');
    }
    
    else
        $error = "Missing information";




    
?>
