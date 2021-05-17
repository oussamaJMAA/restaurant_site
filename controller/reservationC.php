<?php

include "../config.php";

class resC
{



    public function consulter_res($a)
    {
        $sql="SELECT * FROM reservation where email = :a";
        $db=config::getConnexion();
        $sql=$db->prepare($sql);
        $sql->bindValue(':a',$a);
        try
        {
            $sql->execute();
         
           // $query->execute();
return $sql;
            

        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }



    public function ajouter($res,$idclient)
    {
        $sql="insert into reservation(full_name,email,phone,guests,date,time,idclient)
        values (:full_name,:email,:phone,:guests,:date,:time,:idclient)";
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
              'time'=>$res->gettime(),
              'idclient'=>$idclient
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
    


    public function update($id,$date,$time,$guests,$phone,$email){
      
        $sql="UPDATE reservation SET  date  = :date, time = :time, guests = :guests , phone=:phone where id= :id and email=:email" ;

        $db=config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'id'=>$id,
                'date'=>$date,
                'time'=>$time,
                'guests'=>$guests,
                'phone'=>$phone,
                'email'=>$email
         
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

public function recherche_res($s){
    $sql="SELECT * from reservation where id= :s or date=:s or full_name= :s or guests =:s or phone=:s or email=:s";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':s',$s);
    try
    {
        $req->execute();
       // $query->execute();
return $req;
        

    }
    catch(Exeption $e)
    {
        die('Erreur: '.$e->getMessage());
    }

}



public function tri_res(){
    $sql="SELECT * from reservation order by date,time";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
   
    try
    {
        $req->execute();
       // $query->execute();
return $req;
        

    }
    catch(Exeption $e)
    {
        die('Erreur: '.$e->getMessage());
    }

}


public function afficher_res_client($s){
    $sql="SELECT * from reservation where email= :s ";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':s',$s);
    try
    {
        $req->execute();
       // $query->execute();
return $req;
        

    }
    catch(Exeption $e)
    {
        die('Erreur: '.$e->getMessage());
    }

}
        
        }





?>