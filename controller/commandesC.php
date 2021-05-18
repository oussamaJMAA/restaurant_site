<?php
include "../config.php";

class commandesC{


//Cruds Panier
//idcommande, idclient,idplat,quantite,prixtotal


public function afficher_plat_id($id_plat)
{ //affichage tout les commandes
    $sql="select * from plat where id_plat=:id_plat";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id_plat',$id_plat);
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


public function afficher_utilisateur_id($id_user)
{ //affichage tout les commandes
    $sql="select * from utilisateur where id=:id_user";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':id_user',$id_user);
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




    public function ajouter_panier($idclient,$idplat,$quantite,$prixtotal)
    { //ajout au panier mais pas encore confirmer
        $sql="insert into commandes(idclient,idplat,quantite,prixtotal)
        values (:idclient,:idplat,:quantite,:prixtotal)";
        $db=config::getConnexion();

        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'idclient'=>$idclient,
              'idplat'=>$idplat,
              'quantite'=>$quantite,
              'prixtotal'=>$prixtotal
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }






    public function afficher_panier($idclient)
    { //affichage tout les commandes
        $sql="select * from commandes where idclient=:idclient";
        $db=config::getConnexion();
        $req=$db->prepare($sql);
        $req->bindValue(':idclient',$idclient);
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





    public function update_panier($idplat,$idclient,$quantite,$prixtotal,$idcommande){
        //update quantite et prixtotal
        //boutton update card
        //update panier 
        $sql="UPDATE commandes SET  quantite  = :quantite, prixtotal = :prixtotal * :quantite where idcommande=:idcommande and idplat = :idplat and idclient=:idclient" ;

        $db=config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'quantite'=>$quantite,
              
                'idplat'=>$idplat,
                'idclient'=>$idclient,
                'prixtotal'=>$prixtotal,
                'idcommande'=>$idcommande

            
                
            ]);
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }


    }

    public function delete_panier($idplat,$idclient){
        //supprimer m panier
                $sql="DELETE FROM commandes where idplat = :idplat and idclient=:idclient"  ;
                $db=config::getConnexion();
        
                try
                {
                    $query=$db->prepare($sql);
                 $query->execute([
                        'idplat'=>$idplat,
                        'idclient'=>$idclient
                        
        
                       
                        
                    ]);
                    
                }
                catch(Exeption $e)
                {
                    die('Erreur: '.$e->getMessage());
                }
              
                }

//Cruds Commandes
//all included

public function ajouter_cart($idcommande,$idclient,$date,$phone,$location,$quantite,$prixtotal,$idplat)
{ //ajout au panier mais pas encore confirmer
    $sql=" INSERT INTO list_com(idcommande,idclient,date,phone,location,quantite,prixtotal,idpl)
                        VALUES(:idcommande,:idclient,:date,:phone,:location,:quantite,:prixtotal,:idplat) ";
    $db=config::getConnexion();

    try
    {
        $query=$db->prepare($sql);
              
        $query->execute(array(
               
           
         
            ':idcommande'=>$idcommande,
            ':idclient'=>$idclient,
            ':date'=>$date,
            ':phone'=>$phone,
            ':location'=>$location,
            ':quantite'=>$quantite,
            ':prixtotal'=>$prixtotal,
            ':idplat'=>$idplat

           ));
    }
    catch(Exeption $e)
    {
        die('Erreur: '.$e->getMessage());
    }
}

public function afficher_commandes($idclient)
{ //affichage tout les commandes
    $sql="select * from list_com where idclient=:idclient";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':idclient',$idclient);
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



public function afficher_commandes1($idclient)
{ //affichage tout les commandes
    $sql="select * from commandes where idclient=:idclient";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':idclient',$idclient);
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

public function afficher_commandes_idc_idcom($idcommande,$idclient)
{ //affichage tout les commandes
    $sql="select * from commandes where idclient=:idclient and idcommande=:idcommande";
    $db=config::getConnexion();
    $req=$db->prepare($sql);
    $req->bindValue(':idclient',$idclient);
    $req->bindValue(':idcommande',$idcommande);
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


public function delete_panier_after_checkout($idcommande){
    //supprimer m panier
            $sql="DELETE FROM commandes where idplat = :idplat and idclient=:idclient"  ;
            $db=config::getConnexion();
    
            try
            {
                $query=$db->prepare($sql);
             $query->execute([
                    'idplat'=>$idplat,
                    'idclient'=>$idclient
                    
    
                   
                    
                ]);
                
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
          
            }

            
public function somme_commandes($idclient)
{ //affichage tout les commandes
    $sql="SELECT SUM(prixtotal) as SumV FROM commandes WHERE idclient=:idc";
    $db=config::getConnexion();

    try
    {
       
       $query=$db->prepare($sql);
       $query->execute([

        'idc'=>$idclient,
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



public function afficher_commandes_all1()
{ //affichage tout les commandes
    $sql="select * from commandes";
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





public function afficher_commandes_all()
{ //affichage tout les commandes
    $sql="select * from list_com";
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
public function tri_com()
{ //affichage tout les commandes
    $sql="select * from list_com order by date,prixtotal";
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



public function recherche_com($s){
    $sql="SELECT * from list_com where idclient= :s or prixtotal= :s or quantite =:s or date=:s or phone=:s or location=:s";
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



public function delete_cB($idcommande){
    //supprimer m panier
            $sql="DELETE FROM list_com where idcommande = :idcommande"  ;
            $db=config::getConnexion();
    
            try
            {
                $query=$db->prepare($sql);
             $query->execute([
                    'idcommande'=>$idcommande
                
               
          ]);
                
            }
            catch(Exeption $e)
            {
                die('Erreur: '.$e->getMessage());
            }
          
            }



}


?>