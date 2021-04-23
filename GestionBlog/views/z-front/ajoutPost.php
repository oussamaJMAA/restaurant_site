<?php
include_once "../../controller/formC.php";


    $error = "";
    
    session_start();
    // create form
    $form = null;
    // create an instance of the controller
    $FormC = new FormC();
    if ( isset($_POST["titre"]) && isset($_POST["contenu"]) && isset($_POST["image"]) ) 
    {
        if ( !empty($_POST["titre"]) && !empty($_POST["contenu"]) && !empty($_POST["image"]) ) 
        {
        $form = new form( $_POST['titre'],$_POST['image'],$_POST['contenu'],$_SESSION['id']);
            $FormC->ajouterform($form);
            header('Location:blog.php');
        }
        else
            $error = "Missing information";
    }

    
?>