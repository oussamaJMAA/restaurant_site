<?php

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../model/carte.php';

class carteC
{ 
    function ajouterCarte($carte)
    {
        $sql="INSERT INTO `cartefidelite` (`etat`,`date_creat`,`date_expir`)
        VALUES (:etat,:date_creat,:date_expir)";


        $db=config::getConnexion();

        try
        {
            $req=$db->prepare($sql);


		
        $etat=$carte->getetat();
        $date_creat=$carte->getdate_creat();
        $date_expir=$carte->getdate_expir(); 

        $req->bindValue(':etat',$etat);
        $req->bindValue(':date_creat',$date_creat);
        $req->bindValue(':date_expir',$date_expir);

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
 	$sql="UPDATE `cartefidelite` SET `etat`=:etat,`date_creat`=:date_creat ,`date_expir`=:date_expir WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);

        $etat=$carte->getetat();
        $date_creat=$carte->getdate_creat();
        $date_expir=$carte->getdate_expir();

		
        $req->bindValue(':etat',$etat);
        $req->bindValue(':date_creat',$date_creat);
        $req->bindValue(':date_expir',$date_expir);
        $req->bindValue(':id',$id);
	
			

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}


    public function SupprimerCarte($id,$etat){
        $sql="UPDATE `cartefidelite` SET `etat`=:etat WHERE `id`=:id";
		$db = config::getConnexion();
		try{
		$req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		$req->bindValue(':etat',$etat);
        $req->execute();
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}



    public function triCarte(){
        $sql="SELECT * from cartefidelite order by date_creat DESC";
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