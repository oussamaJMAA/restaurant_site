<?php
require_once 'C:/xampp/htdocs/GestionBlog/model/comments.php';
require_once "C:/xampp/htdocs/GestionBlog/config.php";
class  CommentsC{
	
function ajouterComments($Comments)
{
 	$sql="INSERT INTO `comments`( `contenu`, `id_Form`, `id_User`) VALUES (:contenu,:id_Form,:id_User)";
 	$db = config::getConnexion();
 	try
 	{
		$req=$db->prepare($sql);		

		$id_Form=$Comments->getid_Form();
		$id_User=$Comments->getid_User();
		$contenu=$Comments->getcontenu();
		
		$req->bindValue(':id_Form',$id_Form);
		$req->bindValue(':id_User',$id_User);
		$req->bindValue(':contenu',$contenu);
            $req->execute();
    }
    catch (Exception $e)
    	{echo 'Erreur: '.$e->getMessage();}
}

function modifierComments($Comments,$id)
{
 $db = config::getConnexion();
 
 $sql="UPDATE `comments` SET `contenu`=:contenu WHERE `id`=:id";

 	try{
      	$req=$db->prepare($sql);		
		$id_Form=$Comments->getid_Form();
		$id_User=$Comments->getid_User();
		$contenu=$Comments->getcontenu();

		$req->bindValue(':contenu',$contenu);
		$req->bindValue(':id',$id);		
     	 $req->execute();
    }
    catch (Exception $e)
    { echo 'Erreur: '.$e->getMessage(); }
}

function recuperercomments($id)
{
	$sql="SELECT * FROM `comments` WHERE  id=:id ";
		
	$db = config::getConnexion();
	
	try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$comments= $req->fetchALL(PDO::FETCH_OBJ);
		return $comments;
		}
    catch (Exception $e)
    	{die('Erreur: '.$e->getMessage());}
} 


function count($id)
{
	$sql="SELECT * FROM `comments` WHERE  id_Form=:id ";
		
	$db = config::getConnexion();
	
	try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$comments= $req->fetchALL(PDO::FETCH_OBJ);
 		
 		$nbrComments=0;
 		foreach($comments as $row)
    	{    
        	$nbrComments=$nbrComments+1;
		}


		return $nbrComments;
		}
    catch (Exception $e)
    	{die('Erreur: '.$e->getMessage());}
}     



function Supprimercomments($id)
{
$sql="DELETE  from comments where  id=:id ";
$db = config::getConnexion();
	try
	{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
		}
    catch (Exception $e)
    	{die('Erreur: '.$e->getMessage());}
}

function afficherlist_comments($id_Form)
{
$sql="SELECT  c.contenu ,c.id,nom,prenom,C.id_User FROM `form` f INNER JOIN comments c INNER JOIN user u WHERE c.id_Form=:id_Form and c.id_User=u.id group by c.id";

$db = config::getConnexion();
	try{
		$req=$db->prepare($sql);
		$req->bindValue(':id_Form',$id_Form);
 	    $req->execute();

 		$form= $req->fetchALL(PDO::FETCH_OBJ);
		return $form;
	}
    catch (Exception $e)
    	{die('Erreur: '.$e->getMessage());}	
}






}


?>