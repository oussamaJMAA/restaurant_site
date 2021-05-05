<head>
<title>User Registration with Password Verification in php | Technopoints</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<center>
<?php
include "../controller/UtilisateurC.php";

if (isset($POST["btn_register"])) {
  $id = intval(base64_decode($_GET"id"]));
 



  //execute query 
  







  try {
    $db = config::getConnexion();

    
  $selecti=$db->prepare("SELECT * from utilisateur where id = :uid"); // sql select query
  
  $selecti->execute(array(':uid'=>$id));
  
  $row=$selecti->fetch(PDO::FETCH_ASSOC);

  if($selecti->rowCount() > 0){

      if ($row[0]["verification"] == "verified") {
        $msg = "Your account has already been activated.";
        $msgType = "info";
      } else {
        $up=$db->prepare("UPDATE `utilisateur` SET  `verification` =  'verified' WHERE `id` = :uid");

        $up->execute(array(':uid'=>$id));
      
        $msg = "Your account has been activated.";
        $msgType = "success";
      }
    } else {
      $msg = "No account found";
      $msgType = "warning";
    }
  } catch (Exception $ex) {
    echo $ex->getMessage();
  }

}
if ($msg <> "") { 
  echo "<center><h1>".$msg."</center></h1>"; 
  }

?>
</center>
</body>
</html>