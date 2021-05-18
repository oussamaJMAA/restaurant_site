<?php
include ("../config.php");
session_start();
if (!isset($_FILES['image']['tmp_name'])) {
	echo "";
	}else{
	$file=$_FILES['image']['tmp_name'];
	$image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$image_name= addslashes($_FILES['image']['name']);
			
			move_uploaded_file($_FILES["image"]["tmp_name"],"img/" . $_FILES["image"]["name"]);
			
			$location="img/" . $_FILES["image"]["name"];
			$caption=$_POST['caption'];
			

try{
    $user_id = $_SESSION['email'];
    $db = config::getConnexion();
			$insert_stmt=$db->prepare("UPDATE utilisateur SET location = :ulocation , caption= :ucaption where  email = :user_id");
				//update table mta el user eli dkhal 					

$insert_stmt->execute(array(
':ulocation'	=>$location, 
':ucaption'	=>$caption ,
":user_id"=>$user_id
));
header('Location:test2.php');
exit();	
}

catch(PDOException $e)
		{
			$e->getMessage();
		}

							
	}
?>