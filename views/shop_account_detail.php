<?php
include_once "../model/commandes.php";

include "../controller/commandesC.php";


$phone=$_POST['phone'];
$idcom=$_POST["idc"];
$date=$_POST['date']; 
$location=$_POST["location"];
$idcom1=$_POST["idcomm"];
$quantite=$_POST['quantite'];
$prixtotal=$_POST['prtt'];
$idplat=$_POST['plat'];



$c=new commandesC();
$c->ajouter_cart($idcom1,$idcom,$date,$phone,$location,$quantite,$prixtotal,$idplat);
header("Location:affiche_checkout.php");

?>