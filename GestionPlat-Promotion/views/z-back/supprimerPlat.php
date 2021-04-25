<?php
include "../../controller/platC.php";



if (isset($_POST["id_plat"]))
{
	$PlatC=new PlatC();
	$PlatC->Supprimerplat($_POST["id_plat"]);


	header('Location: afficherPlat&Promotion.php');
}
?>