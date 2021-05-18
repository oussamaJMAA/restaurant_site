<?php 
include "../config.php";
if(isset($_POST['mod'])){


    try
    {
$nom=$_POST['nom'];
$des=$_POST['description'];
$image=$_POST['image'];
$id=$_POST['ida'];
$db = config::getConnexion();
$stmt = $db->prepare("UPDATE recette SET `nom`=:unom ,`description`=:udes , `image`=:uimage  WHERE `id_recette`=:uid");
$stmt->execute(array(':unom'=>$nom, ':udes' => $des ,':uimage' => $image , ':uid' =>$id ));
header('Location: recette.php');

    }
    catch(PDOException $e)
    {
        $e->getMessage();
    }		
}
?>
