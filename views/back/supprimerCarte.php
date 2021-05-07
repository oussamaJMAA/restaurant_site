<?php
include "../../controller/carteC.php";



if (isset($_POST["id"]))
{
	$carteC=new carteC();
	$carteC->SupprimerCarte($_POST["id"]);
	//$_POST['etat']=="desactiver";


	header('Location: Table-Carte.php');
}
?>