<?php
include "../../controller/commentsC.php";
session_start();

if(isset($_GET['id']))
	if (!empty($_POST["id_Comment"]))
	{
	$CommentsC=new CommentsC();
	$CommentsC->Supprimercomments($_POST["id_Comment"]);
	header('Location: AfficherComments.php?id='.$_GET['id']);
	}

?>
