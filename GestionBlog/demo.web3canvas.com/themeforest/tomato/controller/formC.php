<?php
include "C:/xampp/htdocs/GestionBlog/demo.web3canvas.com/themeforest/tomato/config.php";
require_once 
		"C:/xampp/htdocs/GestionBlog/demo.web3canvas.com/themeforest/tomato/model/form.php";
 
class  FormC{

function ajouterform($form)
	{
	
	$dates = new \DateTime();
	$string = $dates->format(DATE_RFC2822);

 	$sql="INSERT INTO `form`( `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`) VALUES (:titre,:image,:contenu,0,'2021/04/15',2)";
 	$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);		
		$titre=$form->gettitre();
		$image=$form->getimage();	
		$contenu=$form->getcontenu();
	
	
		$id_User=$form->getid_User();

		$req->bindValue(':titre',$titre);
		$req->bindValue(':image',$image);
		$req->bindValue(':contenu',$contenu);
/*		$req->bindValue(':id_User',$id_User);*/
            
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
}

function afficherlist_form()
{
		$sql="SELECT f.id, `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`,nom,prenom FROM `form`f INNER JOIN user u where u.id = f.id_User";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
}
function afficherlist_form_user($id_User)
{

		$sql="SELECT f.id, `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`,nom,prenom FROM `form`f INNER JOIN user u where u.id = :id_User and f.id_User=:id_User";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id_User',$id_User);
 	    $req->execute();
 		$liste= $req->fetchALL(PDO::FETCH_OBJ);
	
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
}
function modifierform($form,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `form` SET `titre`=:titre,`image`=:image,`contenu`=:contenu,`likes`=:likes,`Date`=:Datte,`id_User`=:id_User WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);		
		$titre=$form->gettitre();
		$image=$form->getimage();	
		$contenu=$form->getcontenu();
		$likes=$form->getlikes();
		$Datte=$form->getDate();
		$id_User=$form->getid_User();




		$req->bindValue(':titre',$titre);
		$req->bindValue(':image',$image);
		$req->bindValue(':contenu',$contenu);
		$req->bindValue(':likes',$likes);
		$req->bindValue(':Datte',$Datte);
		$req->bindValue(':id_User',$id_User);
		$req->bindValue(':id',$id);		
        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}



function recupererform($id){
		$sql="SELECT * FROM `form` WHERE  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$form= $req->fetchALL(PDO::FETCH_OBJ);
		return $form;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }
function Supprimerform($id){
		$sql="DELETE  from form where  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
 	    $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
function incrementerlike($id){
		$sql="SELECT * FROM `form` WHERE  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$form= $req->fetchALL(PDO::FETCH_OBJ);

$nbr_likes=$form[0]->likes + 1;

$formm=$form[0];




modifierform($formm,$id);

		return $formm;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

		
	
}


?>