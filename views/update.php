<?php

include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";

$a=new UtilisateurC;
if(isset($_POST['save'])){
if(empty($_POST['login'])){

$a->update2($_POST['email'],$_POST['clogin'],$_POST['password']);

}else{
    $a->update2($_POST['email'],$_POST['login'],$_POST['cpassword']);
}
}




?>