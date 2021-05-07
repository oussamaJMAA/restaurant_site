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


    public function afficher_panier()
    { //affichage panier
        $sql="select idclient,idplat,quantite,prixtotal from commandes";
        $db=config::getConnexion();

        try
        {
            $liste=$db->query($sql);
       
return $liste;
            

        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }

 
    public function update_panier($idplat,$idclient,$quantite,$prixtotal){
        //update quantite et prixtotal
        //boutton update card
        //update panier 
        $sql="UPDATE commandes SET  quantite  = :quantite, prixtotal = :prixtotal * :quantite where idplat = :idplat and idclient=:idclient" ;

        $db=config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute([
                'quantite'=>$quantite,
              
                'idplat'=>$idplat,
                'idclient'=>$idclient,
                'prixtotal'=>$prixtotal

            
                
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




}


?>