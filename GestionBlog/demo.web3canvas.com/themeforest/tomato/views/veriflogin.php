<?php
include_once '../controller/userC.php';

require_once '../config.php';


if(isset($_POST['login']) && isset($_POST['mdp']))
{	
	$UserC = new UserC();
	$result = $UserC->verifierLogin($_POST['login'],$_POST['mdp']);
   
	if($result->count==0)
	{
	header("location:shop_account.html"); 
	
	}
	else
	{
		session_start();
		$_SESSION['id'] = $result->id;
		$_SESSION['nom'] = $result->nom;
		$_SESSION['prenom'] = $result->prenom;
		$_SESSION['mail'] = $result->mail;
		$_SESSION['username'] = $result->username;
		$role = $result->role;

	if ( $role == 'role_admin')
	{
	echo "admin";
		header("location:afficherStatut.php");
	}
	else
	{
	echo "mch admin";
	//header("location:blog.php"); 
	}


	}
}

else
{
	header("location:shop_account.html"); 
}



 ?>