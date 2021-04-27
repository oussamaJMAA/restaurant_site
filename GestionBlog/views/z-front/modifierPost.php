<?php
include"../../controller/formC.php";


    $error = "";
    session_start();
    // create form
    $form = null;
    // create an instance of the controller
    $FormC = new FormC();
    if ( isset($_POST["titre"]) && isset($_POST["contenu"]) && isset($_POST["image"]) ) 
    {
        if ( !empty($_POST["titre"]) && !empty($_POST["contenu"]) ) 
        {
            if(empty($_POST["image"]))
            {
                $image=$_SESSION['image_UPDATE'];
                $form = new form( $_POST['titre'],strval($image),$_POST['contenu']); 
            }
            else
            $form = new form( $_POST['titre'],$_POST['image'],$_POST['contenu'] );


            $FormC->modifierform($form,$_SESSION['ID_POST']);
            header('Location:blog.php');
        }
        else
        {
       
        echo "<script type='text/javascript'>"; 
        echo "alert('Blanks are required');window.location.href='blog.php';";
        echo "</script>";
        }

    }


    
?>