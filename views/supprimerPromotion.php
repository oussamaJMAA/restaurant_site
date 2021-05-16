<?php
include "../controller/promotionC.php";



if (isset($_POST["id_promo"]))
{
	$PromotionC=new PromotionC();
	$PromotionC->Supprimerpromo($_POST["id_promo"]);


	header('Location: afficherPlat&PromotionB.php');
}
?>