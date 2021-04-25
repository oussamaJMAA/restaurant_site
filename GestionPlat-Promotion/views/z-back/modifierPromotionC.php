<?php
include"../../controller/promotionC.php";
    


    $promotion = null;
    $PromotionC = new PromotionC();
    if ( isset($_POST["val_promo"]) && isset($_POST["date_activation"]) && isset($_POST["date_expiration"])  && isset($_POST["id_plat"])) 
    {
        if ( !empty($_POST["val_promo"]) ) 
        {
            $promotion = new promotion( $_POST['val_promo'],$_POST['date_activation'],$_POST['date_expiration'] ,$_POST['id_plat']);
            $PromotionC->modifierpromotion($promotion,$_POST['id_promo']);

            header('Location:afficherPlat&Promotion.php');
        } 
    }


    
?>