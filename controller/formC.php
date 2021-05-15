<?php

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../model/form.php';

class  FormC{

function ajouterform($form)
{
	$Date=date('Y-m-d');
	strval($Date);

 	$sql="INSERT INTO `form`( `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`) VALUES (:titre,:image,:contenu,0,:datee,:id_User)";
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
		$req->bindValue(':datee',$Date);
		$req->bindValue(':id_User',$id_User);
            
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
}

function afficherlist_form()
{
		$sql="SELECT f.id, `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`,nom,prenom FROM `form`f INNER JOIN utilisateur u where u.id = f.id_User order by `Date` DESC ;";
		$db = config::getConnexion();
		try
		{
			$liste=$db->query($sql);
			
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
}
function afficherlist_form_user($id_User)
{

		$sql="SELECT f.id, `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`,nom,prenom FROM `form`f INNER JOIN utilisateur u where u.id = :id_User and f.id_User=:id_User";
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
 	$sql="UPDATE `form` SET `titre`=:titre,`image`=:image,`contenu`=:contenu WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);		
		$titre=$form->gettitre();
		$image=$form->getimage();	
		$contenu=$form->getcontenu();


		$req->bindValue(':titre',$titre);
		$req->bindValue(':image',$image);
		$req->bindValue(':contenu',$contenu);
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
function Supprimerform($id)
{
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
	
function modifierform_incrementerlike($form,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `form` SET `likes`=:likes WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);	

		$likes=$form->getlikes();


		$req->bindValue(':likes',$likes);

		$req->bindValue(':id',$id);		
        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
}

function incrementerlike($id)
{
		$sql="SELECT * FROM `form` WHERE  id=:id ";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
 	    $req->execute();
 		$form= $req->fetchALL(PDO::FETCH_OBJ);

		$nbr_likes=$form[0]->likes + 1;
		$formm=$form[0];
		
		$newform = new form($formm->titre,$formm->image,$formm->contenu,$nbr_likes,$formm->id_User);

		$this->modifierform_incrementerlike($newform,$id);

		return $formm;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
}

function Filtrer_form($chaine)
{
		$sql="SELECT f.id, `titre`, `image`, `contenu`, `likes`, `Date`, `id_User`,nom,prenom FROM `form`f INNER JOIN utilisateur u 

		where u.id = f.id_User AND
		(
		titre LIKE '%$chaine%' OR image LIKE '%$chaine%' OR  contenu LIKE '%$chaine%' OR 
		likes LIKE '%$chaine%' OR `Date` LIKE '%$chaine%' OR nom LIKE '%$chaine%' OR 
		prenom LIKE '%$chaine%'
		)
		order by `Date` DESC ;";

		$db = config::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			//$req->bindValue(':chaine',$condition);
 	    	$req->execute();
 			$liste= $req->fetchALL(PDO::FETCH_OBJ);
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
}
	
}//Fin class


?>