<?php

include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";
$suc=0;
$u1=null;
$error="";
if(isset($_POST['nom']) && isset($_POST['prenom'])
&&isset($_POST['email'])&& isset($_POST['login'])
&& isset($_POST['pass']))
{
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$email=$_POST['email'];
	$login=$_POST['login'];
    $password=$_POST['pass'];
$u1=new utilisateur($nom,$prenom,$email,$login,$password);
$userC=new UtilisateurC();

$suc=1;
}
else
	$error="";
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
    <body>
	<div id="error">
	<?php echo $error;?>
	</div>
	<div>
	<?php
	if($suc==1)
	$userC->delete($u1);	
    
	?>
	</div>
	<div>
<form action="" method="POST">
            <table border="1" align="center">

              
                <tr>
                    <td>Information de Connexion</td>
                    <td>
                        <label for="login">Enter your email:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="email"  >
                        <input type="text" placeholder="Enter Email" name="nom" style="display:none">
    <input type="text" placeholder="Enter Email" name="prenom" id="email" style="display:none">
    <input type="text" placeholder="Enter Email" name="login" id="email" style="display:none">
    <input type="text" placeholder="Enter Email" name="pass" id="email" style="display:none">

                    </td>
                </tr>
         
                
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Supprimer"> 
                    </td>
                    <td>
                        <input type="reset" value="Annuler" >
                    </td>
                </tr>
            </table>
        </form>
		</div>
    </body>
</html>