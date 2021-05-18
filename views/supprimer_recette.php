<?php
include "../controller/utilisateurC.php";



if (isset($_POST["id_recette"]))
{
	$reC=new utilisateurC();
	$reC->supprimer_recette($_POST["id_recette"]);


	header('Location: recette.php');
}
?>