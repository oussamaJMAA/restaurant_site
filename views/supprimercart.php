<?php

include "../controller/commandesC.php";

	$C=new commandesC();
$idcommande=$_POST['idcom']
$C->delete_list_com($idcommande);
header('Location:shop_checkout.php');


?>