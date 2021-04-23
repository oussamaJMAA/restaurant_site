<?php 
include_once "../../controller/commentsC.php";



if( isset($_GET['id']) and isset($_POST['contenu']) )
{
	if( empty($_POST['contenu']) )
	{
    	echo "<script type='text/javascript'>";	
		echo "alert(' not accept the empty  comment ');";
		echo "window.location.href='blog.php'";

		echo "</script>";
 	}


	else
	{
	session_start();
	
	$comments = new comments($_POST['contenu'],$_GET['id'],$_SESSION['id']);
	

	$commentsC=new commentsC();
	$commentsC->modifierComments($comments,$_POST['id_Comment']);
	header('Location: AfficherComments.php?id='.$_GET['id']);
	}

}
else{
	echo "verifier les champs";
}

 ?>


