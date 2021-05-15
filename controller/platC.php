<?php

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../model/plat.php';

class PlatC 
{
	
function ajouterplat($plat)
{
	$sql="INSERT INTO `plat`(`id_plat`,`nom`, `image`, `description`, `prix`) VALUES 
  (NULL,:nom,:image,:description,:prix)";
 	


 	$db = config::getConnexion();
 		try{
		$req=$db->prepare($sql);	

		$nom        =$plat->getnom();
		$image      =$plat->getimage();	
		$description=$plat->getdescription();
		$prix       =$plat->getprix();


		$req->bindValue(':nom',$nom);
		$req->bindValue(':image',$image);
		$req->bindValue(':description',$description);
		$req->bindValue(':prix',$prix);
            
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }


}


function modifierplat($plat,$id)
	{
 	$db = config::getConnexion();
 	$sql="UPDATE `plat` SET `nom`=:nom ,`image`=:image,`description`=:description,`prix`=:prix WHERE `plat`.`id_plat`=:id";

 		try{

        $req=$db->prepare($sql);	


		$nom        =$plat->getnom();
		$image      =$plat->getimage();	
		$description=$plat->getdescription();
		$prix       =$plat->getprix();


		$req->bindValue(':nom',$nom);
		$req->bindValue(':image',$image);
		$req->bindValue(':description',$description);
		$req->bindValue(':prix',$prix);
		$req->bindValue(':id',$id);		
        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
}



function afficherlist_plat()
{
		$sql="SELECT `id_plat`, `nom`, `image`, `description`, `prix` FROM `plat`;";
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


function rechercher_plat($condition)
{
		$sql="SELECT `id_plat`, `nom`, `image`, `description`, `prix` FROM `plat` 
		where id_plat =:condition OR nom=:condition OR image=:condition OR description=:condition OR prix=:condition ; ";
		$db = config::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			$req->bindValue(':condition',$condition);
 	    	$req->execute();
 			$liste= $req->fetchALL(PDO::FETCH_OBJ);
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
}


function rechercher_plat_front($condition)
{
		$sql="SELECT `id_plat`, `nom`, `image`, `description`, `prix` FROM `plat` 
		
		where 
		id_plat LIKE '%$condition%' OR 
		nom LIKE '%$condition%' OR 
		image LIKE '%$condition%' OR 
		description LIKE '%$condition%' OR 
		prix LIKE '%$condition%'  ; ";


		$db = config::getConnexion();
		try
		{
			$req=$db->prepare($sql);
			//$req->bindValue(':condition',$condition);
 	    	$req->execute();
 			$liste= $req->fetchALL(PDO::FETCH_OBJ);
			return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
}







function afficherlist_plat_desc()
{
		$sql="SELECT `id_plat`, `nom`, `image`, `description`, `prix` FROM `plat` order by id_plat DESC ;";
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

function Supprimerplat($id)
{
    $sql="DELETE  from plat where  id_plat=:id ";
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






}

?>