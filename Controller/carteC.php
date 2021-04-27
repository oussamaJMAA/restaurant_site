<?php

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../Model/carte.php';

class carteC
{ 
    function ajouterCarte($carte)
    {
        $sql="INSERT INTO `cartefidelite` (`prenom`,`nom`,`email`,`password`,`totalpoints`)
        VALUES (:prenom,:nom,:email,:password,:totalpoints)";


        $db=config::getConnexion();

        try
        {
            $req=$db->prepare($sql);


		$prenom=$carte->getprenom(); 
        $nom=$carte->getnom(); 
		$email=$carte->getMail();     
		$password=$carte->getPass(); 
        $totalpoints=$carte->getTotalpoints(); 

		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':password',$password);	        
        $req->bindValue(':totalpoints',$totalpoints);

        $req->execute();
        }

        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }


     public function afficherCarte()
    {

        $sql="SELECT * FROM cartefidelite  ";

        $db=config::getConnexion();
        try
        {
            $liste=$db->query($sql);
            return $liste;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }


    public function modifierCarte($carte,$id)
	{
 	$db=config::getConnexion();
 	$sql="UPDATE `cartefidelite` SET `prenom`=:prenom,`nom`=:nom ,`email`=:email,`password`=:password,`totalpoints`=:totalpoints WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);

		$prenom=$carte->getprenom(); 
        $nom=$carte->getnom(); 
		$email=$carte->getMail();     
		$password=$carte->getPass(); 
        $totalpoints=$carte->getTotalpoints(); 

		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':password',$password);	        
        $req->bindValue(':totalpoints',$totalpoints);
        $req->bindValue(':id',$id);
	
			

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}


    public function SupprimerCarte($id){
		$sql="DELETE  from cartefidelite where  id=:id ";
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