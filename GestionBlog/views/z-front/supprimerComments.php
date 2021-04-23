<?php
include "../../controller/CommentsC.php";

if(isset($_GET['id']))
	if (isset($_POST["id_Comment"]))
	{
	$CommentsC=new CommentsC();
	$CommentsC->Supprimercomments($_POST["id_Comment"]);
	header('Location: AfficherComments.php?id='.$_GET['id']);
	}

?>