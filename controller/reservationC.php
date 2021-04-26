<?php

include "../config.php";

class resC
{
    public function ajouter($res)
    {
        $sql="insert into reservation(full_name,email,phone,guests,date,time)
        values (:full_name,:email,:phone,:guests,:date,:time)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'full_name'=>$res->getfull_name(),
                'email'=>$res->getemail(),
                'phone'=>$res->getphone(),
              'guests'=>$res->getguests(),
              'date'=>$res->getdate(),
              'time'=>$res->gettime()
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    public function afficher()
    {
        $sql="select * from reservation";
        $db=config::getConnexion();

        try
        {
            $liste=$db->query($sql);
           // $query->execute();
return $liste;
            

        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    
    public function update($res){
        
        $sql="UPDATE reservation SET  date  = :date, time = :time, guests = :guests where full_name = :full_name and phone= :phone and email= :email" ;

        $db=config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'date'=>$res->getdate(),
                'time'=>$res->gettime(),
                'guests'=>$res->getguests(),
                'full_name'=>$res->getfull_name(),
                'phone'=>$res->getphone(),
                'email'=>$res->getemail()
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }


    }

    public function delete($res){

        $sql="DELETE FROM reservation where phone = :phone and full_name = :full_name"  ;
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'phone'=>$res->getphone(),
                'full_name'=>$res->getfull_name()
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
      
        }


       public function deleteB($id){
			$sql="DELETE FROM reservation WHERE id= :id";
			$db = config::getConnexion();
			$req=$db->prepare($sql);
			$req->bindValue(':id',$id);
			try{
				$req->execute();
			}
			catch (Exception $e){
				die('Erreur: '.$e->getMessage());
			}
		}



        
        }





?>