<?php
include_once "../model/commandes.php";

include "../controller/commandesC.php";


if(isset($_POST['ajoutcart'])){
    $idcommande=$_POST["idcom"];
    $prix=$_POST["prix"];
   $quantite=1;
    
    $c=new commandesC();
    $c->ajouter_cart($idcommande,$quantite,$prix);
    header("Location:shop_checkout.php");
}


?>