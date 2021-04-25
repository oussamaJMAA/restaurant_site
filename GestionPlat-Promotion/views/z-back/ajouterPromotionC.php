<?php
include "../../controller/promotionC.php";


    $error = "";
    
    // create form
    $promotion = null;
    // create an instance of the controller
    $PromotionC = new PromotionC();
    echo $_POST["val_promo"];
    echo $_POST["date_activation"];
    echo $_POST["date_expiration"];
    echo $_POST["id_plat"];

    if ( isset($_POST["val_promo"]) && isset($_POST["date_activation"]) && isset($_POST["date_expiration"]) && isset($_POST["id_plat"]) ) 
    {
        if ( !empty($_POST["val_promo"]) && !empty($_POST["date_activation"]) && !empty($_POST["date_expiration"])  && !empty($_POST["id_plat"])) 
        {
        $promotion = new promotion( $_POST['val_promo'],$_POST['date_activation'],$_POST['date_expiration'],$_POST['id_plat']);

            $PromotionC->ajouterpromo($promotion);

            header('Location:afficherPlat&Promotion.php');
        }
        else
            $error = "Missing information";
    }

    
?>