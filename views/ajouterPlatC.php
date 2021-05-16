<?php
include "../controller/platC.php";



    $error = "";
    
    // create form
    $plat = null;
    // create an instance of the controller
    $PlatC = new PlatC();

    if ( isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["image"]) 
        && isset($_POST["prix"]) ) 
    {
        if ( !empty($_POST["nom"]) && !empty($_POST["description"]) && !empty($_POST["image"]) ) 
        {
        $plat = new plat( $_POST['nom'],$_POST['image'],$_POST['description'],$_POST['prix']);
            $PlatC->ajouterplat($plat);

            header('Location:afficherPlat&PromotionB.php');
        }
        else
            $error = "Missing information";
    }

    
?>