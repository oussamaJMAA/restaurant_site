<?php

include_once __DIR__ . '/../config.php';
include_once __DIR__ . '/../Model/Reclamation.php';

class reclamationC
{ 
    function ajouterReclamation($reclamation)
    {
        $sql="INSERT INTO `reclamation` (`nom`,`email`,`sujet`,`message`)
        VALUES (:nom,:email,:sujet,:message)";


        $db=config::getConnexion();

        try
        {
            $req=$db->prepare($sql);
            		 
        $nom=$reclamation->getnom(); 
		$email=$reclamation->getMail();     
		$sujet=$reclamation->getsujet(); 
        $message=$reclamation->getmessage(); 

		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':sujet',$sujet);	        
        $req->bindValue(':message',$message);


        $req->execute();

        }
        catch(Exeption $e)
        {
            echo 'Erreur: '.$e->getMessage();
        }
    }


     public function afficherReclamation()
    {

        $sql="SELECT * FROM reclamation  ";

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


    public function modifierReclamation($reclamation,$id)
	{
 	$db=config::getConnexion();
 	$sql="UPDATE `reclamation` SET `nom`=:nom ,`email`=:email,`sujet`=:sujet,`message`=:message  WHERE `id`=:id";
 		try{

        $req=$db->prepare($sql);

		$nom=$reclamation->getnom(); 
		$email=$reclamation->getMail();     
		$sujet=$reclamation->getsujet(); 
        $message=$reclamation->getmessage(); 

		$req->bindValue(':nom',$nom);
		$req->bindValue(':email',$email);
		$req->bindValue(':sujet',$sujet);	        
        $req->bindValue(':message',$message);
        $req->bindValue(':id',$id);
	
			

            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
	}


    public function SupprimerReclamation($id){
		$sql="DELETE  from reclamation where  id=:id ";
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