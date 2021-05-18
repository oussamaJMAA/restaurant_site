<?php
include "../controller/formC.php";



if ( isset($_GET["id"]) )
{
	$FormC=new FormC();
	$FormC->Supprimerform($_GET["id"]);


	header('Location: afficherStatut.php');
}
else
echo "error supprimer";

?>