<?php
include "../../Controller/reclamationC.php";



if (isset($_POST["id"]))
{
	$reclamationC=new reclamationC();
	$reclamationC->SupprimerReclamation($_POST["id"]);


	header('Location: Table-Reclamation.php');
}
?>