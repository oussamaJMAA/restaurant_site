

<?php
include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";
 $suc=0;
   $u1=null;
   $error="";
   if(isset($_POST['nom']) && isset($_POST['prenom'])
   &&isset($_POST['email'])&& isset($_POST['login'])
   && isset($_POST['password']))
   {
       $nom=$_POST['nom'];
       $prenom=$_POST['prenom'];
       $email=$_POST['email'];
       $login=$_POST['login'];
       $password=$_POST['password'];


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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<script src="login.js"></script>
<style>


* {box-sizing: border-box}

/* Add padding to containers */
.container {
  padding: 16px;
}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit/register button */
.registerbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

.registerbtn:hover {
  opacity:1;
}

/* Add a blue text color to links */
a {
  color: dodgerblue;
}

/* Set a grey background color and center the text of the "sign in" section */
.signin {
  background-color: #f1f1f1;
  text-align: center;
}
</style>
</head>
<body>
<div id="error">
	<?php echo $error;?>
	</div>
	<div>
	<?php
	if($suc==1)
	$userC->update($u1);	
    
	?>
	</div>
	<div>
<form action="" method="POST">
  <div class="container">
    <h1>Account settings</h1>
    <p>Please fill in this form to edit your profile.</p>
    <hr>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" id="email" required>
    <input type="text" placeholder="Enter Email" name="nom" id="email" style="display:none">
    <input type="text" placeholder="Enter Email" name="prenom" id="email" style="display:none">
    <input type="text" placeholder="Enter Email" name="login" id="email" style="display:none">
    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="password" id="txtPassword" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" id="txtConfirmPassword" required>
    <hr>

    <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
    <button type="submit"  onclick="return Validate()" class="registerbtn">Save changes</button>
  </div>


</form>
<button><a href="supprimer.php">Desactivate account</a></button>




</body>
</html>






