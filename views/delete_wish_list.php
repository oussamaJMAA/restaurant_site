


<?php
include "../controller/utilisateurC.php";
    



if(isset($_POST["supprimer"])) //button name "supprimer"
{

try{
    $id=$_POST["ida"];
    $db = config::getConnexion();
	$insert_stmt=$db->prepare("DELETE FROM list WHERE idplat= :uid");

$insert_stmt->execute(array(
	':uid'	=>$id
    
 
));
header('Location:wishlist.php');
}
catch (Exception $e){
    die('Erreur: '.$e->getMessage());
}
}
?>