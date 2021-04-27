<?php
include "../../Controller/carteC.php";



if (isset($_POST["id"]))
{
	$carteC=new carteC();
	$carteC->SupprimerCarte($_POST["id"]);


	header('Location: Table-Carte.php');
}
?>