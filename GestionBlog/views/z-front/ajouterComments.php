<?php 
include_once "../../controller/commentsC.php";



if( isset($_GET['id']) and isset($_POST['contenu']) )
{
session_start();
	
$comments = new comments($_POST['contenu'],$_GET['id'],$_SESSION['id']);
	

	$commentsC=new commentsC();
	$commentsC->ajouterComments($comments);
	header('Location: AfficherComments.php?id='.$_GET['id']);
}
else{
	echo "verifier les champs";
}

 ?>