<?php
include_once "../model/commandes.php";

include "../controller/commandesC.php";


$phone=$_POST['phone'];
$idcom=$_POST["idc"];
$date=$_POST['date']; 
$location=$_POST["location"];
$idcom1=$_POST["idcomm"];

$c=new commandesC();
$c->ajouter_cart($idcom,$date,$phone,$location,$idcom1);
header("Location:affiche_checkout.php");

?>