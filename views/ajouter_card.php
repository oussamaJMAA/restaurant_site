
<?php

include_once "../model/commande.php";

include "../controller/commandeC.php";


session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   }
   else {
    try
         {
    $user_id = $_SESSION['e'];
    $db = config::getConnexion();
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE email=:user_id");
     $stmt->execute(array(":user_id"=>$user_id));
     $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

         }
         catch(PDOException $e)
         {
             $e->getMessage();
         }		
     }




if(isset($_POST['addtocart'])){
  
  try{
      $idclient=$userRow["id"];
    $idplat=$_POST["id_plat"];
    $prixplat=$_POST["prix_plat"];
    $db = config::getConnexion();
	$sql=$db->prepare("INSERT INTO commandes (idclient,idplat,prixtotal) VALUES
	(:uidclient,:uidplat,:uprixtotal)"); 	

$sql->execute(array(
	':uidplat'	=>$idplat,
    ':uprixtotal'	=>$prixplat,
    ':uidclient'=>$idclient,
));
header("Location:shop_cart.php");
} catch(PDOException $e)
{
    $e->getMessage();
}		


}


?>
