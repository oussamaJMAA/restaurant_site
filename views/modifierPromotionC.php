<?php
include"../controller/promotionC.php";
    
    $Date1= new DateTime($_POST['date_activation']);
    $Date2= new DateTime($_POST['date_expiration']);
    if($Date1>$Date2)
    {  
        echo "False";
         echo "<script type='text/javascript'>";
        echo "alert('Date activation obligatoirement <  Date date_expiration');
        window.location.href='../z-back/afficherPlat&PromotionB.php';";
        echo "</script>";
    }
    else
    {    
        echo "True";

    $promotion = null;
    $PromotionC = new PromotionC();
    if ( isset($_POST["val_promo"]) && isset($_POST["date_activation"]) && isset($_POST["date_expiration"])  && isset($_POST["id_plat"])) 
    {
        if ( !empty($_POST["val_promo"]) ) 
        {
            $promotion = new promotion( $_POST['val_promo'],$_POST['date_activation'],$_POST['date_expiration'] ,$_POST['id_plat']);
            $PromotionC->modifierpromotion($promotion,$_POST['id_promo']);

            header('Location:afficherPlat&PromotionB.php');
        } 
    }


    }
?>