<?php

include "../controller/commandesC.php";

	$C=new commandesC();
$p=$_POST["idpf"];
$c=$_POST["idcf"];
$C->delete_panier($p,$c);
header('Location:afficher_cart.php');


?>