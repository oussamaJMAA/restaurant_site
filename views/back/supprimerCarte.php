<?php
include "../../controller/carteC.php";

$verif=false;


if (isset($_POST["id"]))
{
	if (($_POST["etat"])=='désactivé' && $verif==false)
	{
		$verif=true;
		$_POST["etat"]='activé';
	}
    if ( $verif==false)
	{
		$verif=true;
		$_POST["etat"]='désactivé';

	}
	$carteC=new carteC();
	$carteC->SupprimerCarte($_POST["id"],$_POST["etat"]);
	//$_POST['etat']=='desactiver';


	header('Location: Table-Carte.php');
}
?>