

<?php

include_once "../model/commande.php";
include "../controller/commandeC.php";

require_once "../model/lcommande.php";


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



if(isset($_POST["paynow"]))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login

 try
         {
    $user=$userRow["id"];
    $plat=$_POST["idplat"];
$adr=$_POST["adre"];
$phone=$_POST["phone"];

$pay=$_POST["payment"];
$date=$_POST["date"];

    $db = config::getConnexion();


    $stmt = $db->prepare("INSERT INTO lcommandes(idclient,idplat,adresse,phone,methode_paye,datec)
    values (:user,:plat,:adr,:phone,:pay,:date)");
     $stmt->execute(array(
         
       ":user"=>$user,
       ":plat"=>$plat,
       ":adr"=>$adr,
       ":phone"=>$phone,
       ":pay"=>$pay,
       ":date"=>$date

   ));
    

         }
         catch(PDOException $e)
         {
             $e->getMessage();
         }		
     }



?>



