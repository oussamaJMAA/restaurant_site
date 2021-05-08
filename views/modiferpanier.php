<?php

include "../controller/commandesC.php";

	$C=new commandesC();
	$test=$_POST["test"];
    $idp=$_POST["idplat"];
    $idc=$_POST["idclient"];
    $p=$_POST["prixtotal"];
    $idcc=$_POST["idcomm"];
   $C->update_panier($idp,$idc,$test,$p,$idcc);
  header('Location:afficher_cart.php');

?>