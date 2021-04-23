<?php
include "../../controller/FormC.php";



if (isset($_POST["id"]))
{
	$FormC=new FormC();
	$FormC->Supprimerform($_POST["id"]);


	header('Location: Table-Blog.php');
}
?>