<?php

include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";
$suc=0;
$u1=null;
$error="";
if(isset($_POST['nom']) && isset($_POST['prenom'])
&&isset($_POST['email'])&& isset($_POST['login'])
&& isset($_POST['pass']))
{
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$email=$_POST['email'];
	$login=$_POST['login'];
    $password=$_POST['pass'];
$u1=new utilisateur($nom,$prenom,$email,$login,$password);
$userC=new UtilisateurC();

$suc=1;
}
else
	$error="";
?>





	<?php
	if($suc==1)
	$userC->delete($u1);	
    
	?>
	