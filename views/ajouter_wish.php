
<?php


include "../controller/utilisateurC.php";


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






     if(isset($_POST["addwishl"])){

     try{
        $idclient=$userRow["id"];
      $idplat=$_POST["id_plat"];
      
      $db = config::getConnexion();
      $sql=$db->prepare("INSERT INTO list (id_user,idplat) VALUES
      (:uidclient,:uidplat)"); 	
  
  $sql->execute(array(
      ':uidplat'	=>$idplat,
      ':uidclient'=>$idclient
  ));
  header("Location:wishlist.php");
  } catch(PDOException $e)
  {
      $e->getMessage();
  }		

     }










/*
include "../controller/reservationC.php";
$id=$_POST['id_plat'];
$nom=$_POST['nom_plat'];
$price=$_POST['prix_plat'];
$image=$_POST['image_plat'];
$db = config::getConnexion();
$select_stmt=$db->prepare("SELECT list_id FROM list  WHERE list_id=:uid");
$select_stmt->execute(array(":uid"=>$id));  
$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
$check = $row["list_id"];

if(isset($_POST["addwishl"])) //button name "btn_register"
{
    if(!$check){
try{
    
$db = config::getConnexion();
	$insert_stmt=$db->prepare("INSERT INTO list (list_id,product_name,product_price,product_image) VALUES
	(:uidlist,:unom,:uprice,:uimage)"); 	

$insert_stmt->execute(array(
	':uidlist'	=>$id,
    ':unom'	=>$nom,
    ':uprice'=>$price,
    ':uimage'=>$image
 
));
header('Location:wishlist.php');
}
  catch(PDOException $e)
{
    $e->getMessage();
}		

}else {
    header("refresh:2; test3.php");
    echo"<h1>item already exists in the wishlist<h1>";
}
}
*/
?>