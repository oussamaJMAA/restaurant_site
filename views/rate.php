<?php
	include "../config.php";
   
if(isset($_POST['go_rate'])){

   
    try{
        $rate=$_POST['rate'];
        $idr=$_POST['idrec'];
        $id=$_POST['id'];
    $db = config::getConnexion();
    $a=$db->prepare("INSERT INTO rate_recette (id_recette,id_utilisateur,rate) VALUES(:a,:b,:c)") ;
    $a->execute(array(':a' => $idr,  ':b'=>$id,
    ':c' =>$rate
    
      ));

    header('Location: recette_user.php');
    }
    catch (Exception $ex) {
        echo $ex->getMessage();
}
}
?>