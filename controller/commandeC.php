<?php

include "../config.php";

class commandeC
{


    public function deleteB_lcommande($datec){
        $sql="DELETE FROM lcommandes WHERE  datec =:datec";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
       
        $req->bindValue(':datec',$datec);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


    public function recherche_lcom($s)
    {
        $sql="SELECT * from lcommandes where idclient= :s or idplat=:s or adresse= :s or phone =:s or datec =:s or methode_paye =:s ";
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
    

    public function tri_lcom(){
        $sql="SELECT * from lcommandes order by datec";
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

    public function afficher_all_com()
    {
        $sql="select * from lcommandes";
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



    public function afficher_lcommande($idc)
    {
        $sql="SELECT * FROM lcommandes WHERE idclient=:idc";
        $db=config::getConnexion();

        try
        {
           
           $query=$db->prepare($sql);
           $query->execute([

            'idc'=>$idc,
           ]);
return $query;
            

        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }



    public function ajouter_lcommande($lcommande)
    {
        $sql="insert into lcommandes(idclient,idplat,adresse,phone,methode_paye,datec)
        values (:idclient,:idplat,:adresse,:phone,:methode_paye,:datec)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'idplat'=>$lcommande->getidplat(),
                'idclient'=>$lcommande->getidclient(),
              'adresse'=>$lcommande->getadresse(),
              'phone'=>$lcommande->getphone(),
              'methode_paye'=>$lcommande->getmethode_paye(),
              'datec'=>$lcommande->getDatec()
      
            
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }




    public function ajouter_commande($commande)
    {
        $sql="insert into commandes(idplat,idclient,prixtotal,quantite)
        values (:idplat,:idclient,:prixtotal,:quantite)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'idplat'=>$commande->getidplat(),
                'idclient'=>$commande->getidclient(),
                'prixtotal'=>$commande->getprixtotal(),
                'quantite'=>$commande->getquantite(),
      
            
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

    public function afficher_commande($idc)
    {
        $sql="SELECT * FROM commandes WHERE idclient=:idc";
        $db=config::getConnexion();

        try
        {
           
           $query=$db->prepare($sql);
           $query->execute([

            'idc'=>$idc,
           ]);
return $query;
            

        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    

    public function afficher_all()
    {
        $sql="select * from commandes";
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

   
    
    public function affiche_somme($idc)
    {
        $sql="SELECT SUM(prixtotal) as SumV FROM commandes WHERE idclient=:idc";
        $db=config::getConnexion();

        try
        {
           
           $query=$db->prepare($sql);
           $query->execute([

            'idc'=>$idc,
           ]);
$result = $query-> fetch(PDO::FETCH_ASSOC);
$sum = $result["SumV"];

return $sum;
            

        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    


    public function update_commande($idclient){
        
        $sql="UPDATE commandes SET  quantite  = :quantite  where idclient= :idclient " ;

        $db=config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute([
               
                'idclient'=>$idclient,
               
                'quantite'=>$commande->getquantite()
            
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }


    }

    
    public function update_quantite($quant,$idclient,$prix){
        
        $sql="UPDATE commandes SET  quantite  = :quant * :prix  where idclient= :idclient " ;

        $db=config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute([
               
                'idclient'=>$idclient,
               
                'quantite'=>$quant,
                'prix'=>$prix
            
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }


    }

    public function delete_commande($idplat){
        $sql="DELETE FROM commandes WHERE idplat= :idplat";
        $db = config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idplat',$idplat);
        try{
            $req->execute();
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }


       public function deleteB_commande($id){
			$sql="DELETE FROM commandes WHERE idplat= :id";
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




        public function recherche_com($s){
            $sql="SELECT * from commandes where idclient= :s or idplat=:s or prixtotal= :s or quantite =:s";
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
        



        public function tri_com(){
            $sql="SELECT * from commandes order by prixtotal desc";
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

        
        }





?>