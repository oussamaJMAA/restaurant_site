<?php
include_once "../model/commandes.php";

include "../controller/commandesC.php";


$phone=$_POST['phone'];
$idcom=$_POST["idcom"];
$date=$_POST['date']; 
$location=$_POST["location"];


$c=new commandesC();
$c->ajouter_cart($idcom,$date,$phone,$location);
header("Location:affiche_checkout.php");

?>