<?php

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../model/carte.php';

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
    //    $etat=$carte->getetat();
     //   $date_creat=$carte->getdate_creat();
     //   $date_expir=$carte->getdate_expir(); 

		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':password',$password);	        
        $req->bindValue(':totalpoints',$totalpoints);
    //    $req->bindValue(':etat',$etat);
  //    $req->bindValue(':date_creat',$date_creat);
    //    $req->bindValue(':date_expir',$date_expir);

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
      //  $etat=$carte->getetat();
       // $date_creat=$carte->getdate_creat();
      //  $date_expir=$carte->getdate_expir();

		$req->bindValue(':prenom',$prenom);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':password',$password);	        
        $req->bindValue(':totalpoints',$totalpoints);
      //  $req->bindValue(':etat',$etat);
      //  $req->bindValue(':date_creat',$date_creat);
      //  $req->bindValue(':date_expir',$date_expir);
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



    public function triCarte(){
        $sql="SELECT * from cartefidelite order by totalpoints DESC";
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




}
?>    