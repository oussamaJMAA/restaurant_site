<?php

include_once __DIR__ . '/../config2.php';
include_once __DIR__ . '/../model/promotion.php';

class PromotionC 
{
  
function ajouterpromo($promotion)
{
  $sql="INSERT INTO `promotion`( `val_promo`, `date_activation`, `date_expiration`, `id_plat`) VALUES (:val_promo,:date_activation,:date_expiration,:id_plat)";
  
  $db = config::getConnexion();
    try{
    $req=$db->prepare($sql);  

    $val_promo=$promotion->getval_promo();
    $date_activation=$promotion->get_date_activation(); 
    $date_expiration=$promotion->get_date_expiration();
    $id_plat=$promotion->get_id_plat();


    $req->bindValue(':val_promo',$val_promo);
    $req->bindValue(':date_activation',$date_activation);
    $req->bindValue(':date_expiration',$date_expiration);
    $req->bindValue(':id_plat',$id_plat);
            
            $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }


}

function modifierpromotion($promotion,$id)
    {
    $db = config::getConnexion();
    $sql="UPDATE `promotion` SET `val_promo`=:val_promo ,`date_activation`=:date_activation,`date_expiration`=:date_expiration,`id_plat`=:id_plat WHERE `promotion`.`id_promo`=:id";

        try{

        $req=$db->prepare($sql);    


        $val_promo      =$promotion->getval_promo();
        $date_activation=$promotion->get_date_activation(); 
        $date_expiration=$promotion->get_date_expiration();
        $id_plat        =$promotion->get_id_plat();


        $req->bindValue(':val_promo',$val_promo);
        $req->bindValue(':date_activation',$date_activation);
        $req->bindValue(':date_expiration',$date_expiration);
        $req->bindValue(':id_plat',$id_plat);
        $req->bindValue(':id',$id);     
        $req->execute();
        }
        catch (Exception $e){

            echo 'Erreur: '.$e->getMessage();
        }
}

function afficherlist_promo()
{
    $sql="SELECT p.id_plat,`id_promo`, `nom`, `image`, `description`, `prix`,val_promo,date_activation,date_expiration FROM `plat`p INNER JOIN promotion promo where promo.id_plat = p.id_plat ;";
    $db = config::getConnexion();
    try
    {
      $liste=$db->query($sql);
      
      return $liste;
    }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        } 
}



function Supprimerpromo($id)
{
    $sql="DELETE  from promotion where  id_promo=:id ";
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