<?php


include_once "../model/commande.php";
include "../controller/commandeC.php";


if(isset($_POST['update_recu'])){
    $idclient=$userRow['id'];

    $quantite=$_POST["quantite"];
    
        $sql="UPDATE commandes SET  quantite  = :quantite  where idclient= :idclient " ;
    
        $db=config::getConnexion();
        try
        {
            $query=$db->prepare($sql);
            $query->execute([
               
                'idclient'=>$idclient,
               
                'quantite'=>$quantite,
            
                
            ]);

            header("Location:shop_cart.php");
        }
        catch(Exeption $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    
    
    
    
    
    
    }




?>