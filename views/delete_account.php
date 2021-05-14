


<?php
include "../controller/utilisateurC.php";
session_start();
//Ajout l tableau archive 
try{
    
    $db = config::getConnexion();
    $stmt=$db->prepare("INSERT INTO archive (id,nom,prenom,email,login,password,gender) VALUES
    (:uid,:uname,:uprenom,:uemail,:ulogin,:upassword,:ugender)"); 		//sql insert query					

$stmt->execute(array(
':uid'  =>$_SESSION["id"],
':uname'	=>$_SESSION["nom"], 
':uprenom'	=>$_SESSION["prenom"], 
':uemail'	=>$_SESSION["email"], 
':ulogin'	=>$_SESSION["login"],
'ugender' =>$_SESSION["gender"], 					    			
':upassword'=>$_SESSION["password"]));

}
catch (Exception $e){
    die('Erreur: '.$e->getMessage());
}

//supprimi m tableau utilisateur
try{
    $email=$_POST["email"];
    $db = config::getConnexion();
	$insert_stmt=$db->prepare("DELETE FROM utilisateur WHERE email= :uemail");

$insert_stmt->execute(array(
	':uemail'	=>$email 
    
 
));
header('Location:deconnexion.php');
}
catch (Exception $e){
    die('Erreur: '.$e->getMessage());
}







?>