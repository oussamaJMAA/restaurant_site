<?php

include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";

$a=new UtilisateurC;
if(isset($_POST['save'])){
if(empty($_POST['login'])){
$p=password_hash($_POST['password'], PASSWORD_DEFAULT); 
$a->update2($_POST['email'],$_POST['clogin'],$p);

}else{
    $a->update2($_POST['email'],$_POST['login'],$_POST['cpassword']);
}

if(empty($_POST["password"])&&empty($_POST['login'])){
    
    $a->update2($_POST['email'],$_POST['clogin'],$_POST['cpassword']);
}


header("Location:test2.php");
}




?>