<?php
include_once "../model/commandes.php";

include "../controller/commandesC.php";


if(isset($_POST['addtocart'])){
    $idclient=$_POST["idclient"];
    $idplat=$_POST["id_plat"];
    $prixtotal=$_POST["prix_plat"];
    $quantite=1;
    $c=new commandesC();
    $c->ajouter_panier($idclient,$idplat,$quantite,$prixtotal);
    header("Location:afficher_cart.php");
}


?>