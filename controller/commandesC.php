<?php
include "../config.php";

class commandesC{


//Cruds Panier
//idcommande, idclient,idplat,quantite,prixtotal


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

public function ajouter_cart($idclient,$date,$phone,$location)
{ //ajout au panier mais pas encore confirmer
    $sql="update commandes set date=:date , phone=:phone , location =:location where idclient=:idclient";
    $db=config::getConnexion();

    try
    {
        $query=$db->prepare($sql);
              
        $query->execute(array(
               
            ':date'=>$date,
            ':idclient'=>$idclient,
            ':phone'=>$phone,
            ':location'=>$location,
           

           ));
    }
    catch(Exeption $e)
    {
        die('Erreur: '.$e->getMessage());
    }
}

public function afficher_commandes($idclient)
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



public function afficher_commandes_all()
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
public function tri_com()
{ //affichage tout les commandes
    $sql="select * from commandes order by date,prixtotal";
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



public function delete_cB($idcommande){
    //supprimer m panier
            $sql="DELETE FROM commandes where idcommande = :idcommande"  ;
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