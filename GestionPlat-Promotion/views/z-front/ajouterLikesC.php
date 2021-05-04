<?php
include "../../controller/likesC.php";
include "../../controller/formC.php";

session_start();

    $form = null; $likes=null;
    $LikesC=new LikesC();
    if ( isset($_GET["id"])  ) 
    {
        
        $l = $LikesC->recupererlikes($_GET['id'],$_SESSION['id']);
        $nombre = $l[0]->nbr;

        if ($nombre == '0')
        {
            $likes = new likes($_GET['id'],$_SESSION['id']);
            $LikesC=new LikesC();
            $LikesC->ajouterLikes($likes);

            $FormC= new FormC();
            $FormC->incrementerlike($_GET['id']);

        echo "<script type='text/javascript'>"; 
        echo "alert(' Aimé avec succès ');";
        echo "window.location.href='afficherStatut.php'";
        echo "</script>";
        
        }
        else
        {
        echo "<script type='text/javascript'>"; 
        echo "alert('Vous avez cliqué sur ce post précédemment');";
        echo "window.location.href='afficherStatut.php'";
        echo "</script>";
        }


    }

    
?>