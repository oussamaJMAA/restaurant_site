<?php
include"../../controller/platC.php";
    
    session_start();

    $plat = null;
    $PlatC = new PlatC();

    
    if ( isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["prix"]) ) 
    {   
        if(empty($_POST["image"]) && !empty($_POST["nom"]) && !empty($_POST["description"]) )
        {
            $plat = new plat( $_POST['nom'],$_SESSION['image_modifier_plat'],$_POST['description'] ,$_POST['prix']);
            $PlatC->modifierplat($plat,$_POST['id_plat']);
            header('Location:afficherPlat&Promotion.php');

        }
        if ( !empty($_POST["nom"]) && !empty($_POST["description"]) && !empty($_POST["image"])) 
        {
            $plat = new plat( $_POST['nom'],$_POST['image'],$_POST['description'] ,$_POST['prix']);
            $PlatC->modifierplat($plat,$_POST['id_plat']);
            header('Location:afficherPlat&Promotion.php');
        }
       
    
    }
    
    
?>