<?php
include"../../controller/platC.php";
    

    $plat = null;
    $PlatC = new PlatC();
    if ( isset($_POST["nom"]) && isset($_POST["description"]) && isset($_POST["image"]) 
        && isset($_POST["prix"])) 
    {
        if ( !empty($_POST["nom"]) && !empty($_POST["description"]) && !empty($_POST["image"])) 
        {
            $plat = new plat( $_POST['nom'],$_POST['image'],$_POST['description'] ,$_POST['prix']);
            $PlatC->modifierplat($plat,$_POST['id_plat']);
            header('Location:afficherPlat&Promotion.php');
        }
        elseif (empty($_POST["description"])) 
        {
       
        echo "<script type='text/javascript'>"; 
        echo "alert('description est obligatoire')
             ;window.location.href='afficherPlat&Promotion.php';";
        echo "</script>";
        }
        else {
        echo "<script type='text/javascript'>"; 
        echo "alert('l image est obligatoire')
             ;window.location.href='afficherPlat&Promotion.php';";
        echo "</script>";
        }

    }


    
?>