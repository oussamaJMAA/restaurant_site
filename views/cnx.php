<?php


include "../controller/UtilisateurC.php";
require_once('recaptcha/recaptchalib.php');
session_start();

if(isset($_SESSION["e"]))	//check condition user login not direct back to index.php page
{
	header("ProfilUser.php");
}







if(isset($_POST['btn_register'])) //button name "btn_register"
{
	$username=$_POST["login"];	//textbox name "txt_username_email"
	$email=$_POST["email"];	//textbox name "txt_username_email"
	$password=$_POST["password"];	
    $nom=$_POST["nom"];
    $prenom=$_POST["prenom"];	
    $gender=$_POST["genre"];	//textbox name "txt_password"
			//textbox name "txt_password"
            if(empty($prenom)){
                $errorMsg[]="Please enter your  first name";	//check email textbox not empty 
            }
            else if(empty($nom)){
                $errorMsg[]="Please your last name";	//check email textbox not empty 
            }
	else if(empty($username)){
		$errorMsg[]="Please enter username";	//check username textbox not empty 
	}
	else if(empty($email)){
		$errorMsg[]="Please enter email";	//check email textbox not empty 
	}
	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errorMsg[]="Please enter a valid email address";	//check proper email format 
	}
  
    /*
	else if(empty($password)){
		$errorMsg[]="Please enter password";	//check passowrd textbox not empty
	}
	else if(strlen($password) < 6){
		$errorMsg[] = "Password must be atleast 6 characters";	//check passowrd must be 6 characters
	}*/
	else
	{	
        try {
            $db = config::getConnexion();
            $stmt =$db->prepare("SELECT COUNT(*) AS count from utilisateur where email = :uemail"); 
            $stmt->execute(array(':uemail'=>$email));
              $result = $stmt->fetchAll();
              if ($result[0]["count"] > 0) {
               $errorMsg[]= "Email already exist";
              
              }
              else {
                $new_password = password_hash($password, PASSWORD_DEFAULT); //encrypt password using password_hash()
            
                $stmt=$db->prepare("INSERT INTO utilisateur (nom,prenom,email,login,password,gender) VALUES
                                                                (:uname,:uprenom,:uemail,:ulogin,:upassword,:ugender)"); 		//sql insert query					
                
                $stmt->execute(array(
                    ':uname'	=>$nom, 
                    ':uprenom'	=>$prenom, 
                    ':uemail'	=>$email, 
                    ':ulogin'	=>$username,
                    'ugender' =>$gender, 					    			
                ':upassword'=>$new_password));
                $loginMsg = "Please verify your email";	

                $result = $stmt->rowCount();
                
                if ($result > 0) {
   
                    $lastID = $db->lastInsertId();
                    
                    $url="http://localhost/final/views/activate.php?id=" . base64_encode($lastID) . "";
                    $message=" 
            <html>
              <head>
                <meta name='viewport' content='width=device-width' />
                <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
                <title>Simple Transactional Email</title>
                <style>
                  /* -------------------------------------
                      GLOBAL RESETS
                  ------------------------------------- */
                  img {
                    border: none;
                    -ms-interpolation-mode: bicubic;
                    max-width: 100%; }
            
                  body {
                    background-color: #f6f6f6;
                    font-family: sans-serif;
                    -webkit-font-smoothing: antialiased;
                    font-size: 14px;
                    line-height: 1.4;
                    margin: 0;
                    padding: 0;
                    -ms-text-size-adjust: 100%;
                    -webkit-text-size-adjust: 100%; }
            
                  table {
                    border-collapse: separate;
                    mso-table-lspace: 0pt;
                    mso-table-rspace: 0pt;
                    width: 100%; }
                    table td {
                      font-family: sans-serif;
                      font-size: 14px;
                      vertical-align: top; }
            
                  /* -------------------------------------
                      BODY & CONTAINER
                  ------------------------------------- */
            
                  .body {
                    background-color: #f6f6f6;
                    width: 100%; }
            
                  /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
                  .container {
                    display: block;
                    Margin: 0 auto !important;
                    /* makes it centered */
                    max-width: 580px;
                    padding: 10px;
                    width: 580px; }
            
                  /* This should also be a block element, so that it will fill 100% of the .container */
                  .content {
                    box-sizing: border-box;
                    display: block;
                    Margin: 0 auto;
                    max-width: 580px;
                    padding: 10px; }
            
                  /* -------------------------------------
                      HEADER, FOOTER, MAIN
                  ------------------------------------- */
                  .main {
                    background: #ffffff;
                    border-radius: 3px;
                    width: 100%; }
            
                  .wrapper {
                    box-sizing: border-box;
                    padding: 20px; }
            
                  .content-block {
                    padding-bottom: 10px;
                    padding-top: 10px;
                  }
            
                  .footer {
                    clear: both;
                    Margin-top: 10px;
                    text-align: center;
                    width: 100%; }
                    .footer td,
                    .footer p,
                    .footer span,
                    .footer a {
                      color: #999999;
                      font-size: 12px;
                      text-align: center; }
            
                  /* -------------------------------------
                      TYPOGRAPHY
                  ------------------------------------- */
                  h1,
                  h2,
                  h3,
                  h4 {
                    color: #000000;
                    font-family: sans-serif;
                    font-weight: 400;
                    line-height: 1.4;
                    margin: 0;
                    Margin-bottom: 30px; }
            
                  h1 {
                    font-size: 35px;
                    font-weight: 300;
                    text-align: center;
                    text-transform: capitalize; }
            
                  p,
                  ul,
                  ol {
                    font-family: sans-serif;
                    font-size: 14px;
                    font-weight: normal;
                    margin: 0;
                    Margin-bottom: 15px; }
                    p li,
                    ul li,
                    ol li {
                      list-style-position: inside;
                      margin-left: 5px; }
            
                  a {
                    color: #3498db;
                    text-decoration: underline; }
            
                  /* -------------------------------------
                      BUTTONS
                  ------------------------------------- */
                  .btn {
                    box-sizing: border-box;
                    width: 100%; }
                    .btn > tbody > tr > td {
                      padding-bottom: 15px; }
                    .btn table {
                      width: auto; }
                    .btn table td {
                      background-color: #ffffff;
                      border-radius: 5px;
                      text-align: center; }
                    .btn a {
                      background-color: #ffffff;
                      border: solid 1px #3498db;
                      border-radius: 5px;
                      box-sizing: border-box;
                      color: #3498db;
                      cursor: pointer;
                      display: inline-block;
                      font-size: 14px;
                      font-weight: bold;
                      margin: 0;
                      padding: 12px 25px;
                      text-decoration: none;
                      text-transform: capitalize; }
            
                  .btn-primary table td {
                    background-color: #3498db; }
            
                  .btn-primary a {
                    background-color: #3498db;
                    border-color: #3498db;
                    color: #ffffff; }
            
                  /* -------------------------------------
                      OTHER STYLES THAT MIGHT BE USEFUL
                  ------------------------------------- */
                  .last {
                    margin-bottom: 0; }
            
                  .first {
                    margin-top: 0; }
            
                  .align-center {
                    text-align: center; }
            
                  .align-right {
                    text-align: right; }
            
                  .align-left {
                    text-align: left; }
            
                  .clear {
                    clear: both; }
            
                  .mt0 {
                    margin-top: 0; }
            
                  .mb0 {
                    margin-bottom: 0; }
            
                  .preheader {
                    color: transparent;
                    display: none;
                    height: 0;
                    max-height: 0;
                    max-width: 0;
                    opacity: 0;
                    overflow: hidden;
                    mso-hide: all;
                    visibility: hidden;
                    width: 0; }
            
                  .powered-by a {
                    text-decoration: none; }
            
                  hr {
                    border: 0;
                    border-bottom: 1px solid #f6f6f6;
                    Margin: 20px 0; }
            
                  /* -------------------------------------
                      RESPONSIVE AND MOBILE FRIENDLY STYLES
                  ------------------------------------- */
                  @media only screen and (max-width: 620px) {
                    table[class=body] h1 {
                      font-size: 28px !important;
                      margin-bottom: 10px !important; }
                    table[class=body] p,
                    table[class=body] ul,
                    table[class=body] ol,
                    table[class=body] td,
                    table[class=body] span,
                    table[class=body] a {
                      font-size: 16px !important; }
                    table[class=body] .wrapper,
                    table[class=body] .article {
                      padding: 10px !important; }
                    table[class=body] .content {
                      padding: 0 !important; }
                    table[class=body] .container {
                      padding: 0 !important;
                      width: 100% !important; }
                    table[class=body] .main {
                      border-left-width: 0 !important;
                      border-radius: 0 !important;
                      border-right-width: 0 !important; }
                    table[class=body] .btn table {
                      width: 100% !important; }
                    table[class=body] .btn a {
                      width: 100% !important; }
                    table[class=body] .img-responsive {
                      height: auto !important;
                      max-width: 100% !important;
                      width: auto !important; }}
            
                  /* -------------------------------------
                      PRESERVE THESE STYLES IN THE HEAD
                  ------------------------------------- */
                  @media all {
                    .ExternalClass {
                      width: 100%; }
                    .ExternalClass,
                    .ExternalClass p,
                    .ExternalClass span,
                    .ExternalClass font,
                    .ExternalClass td,
                    .ExternalClass div {
                      line-height: 100%; }
                    .apple-link a {
                      color: inherit !important;
                      font-family: inherit !important;
                      font-size: inherit !important;
                      font-weight: inherit !important;
                      line-height: inherit !important;
                      text-decoration: none !important; }
                    .btn-primary table td:hover {
                      background-color: #34495e !important; }
                    .btn-primary a:hover {
                      background-color: #34495e !important;
                      border-color: #34495e !important; } }
            
                </style>
              </head>
              <body>
                <table border='0' cellpadding='0' cellspacing='0' class='body' style='padding-top:2%'>
                  <tr>
                    <td>&nbsp;</td>
                    <td class='container'>
                      <div class='content'>
            
                        <!-- START CENTERED WHITE CONTAINER -->
                        <span class='preheader'>New Contact Form Entry.</span>
                        <table class='main'>
            
                        <tr>
                            <td class='wrapper'>
                              <table border='0' cellpadding='0' cellspacing='0'>
                                <tr>
                                  <td><center>
                                    <p><img src='https://i.pinimg.com/originals/de/0a/ed/de0aedebc6d17dc16a269a13921f5492.jpg' width='70%' height='20%'></p>
                                    <p><h2>New user registration</h2></p></center>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
                          
                          <!-- START MAIN CONTENT AREA -->
                          <tr>
                            <td class='wrapper'>
                              <table border='0' cellpadding='0' cellspacing='0'>
                                <tr>
                                  <td>
                                    <p>Hi, $nom</p>
                                    <p>We have received a new signup request from this email address.</p>
                                    <p>Click on the button below to confirm your email address.</p>
                                    <p> <center><a href=".$url." target='_blank' style='width:80%; display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>Verify Email</a></center></p>
                                    <p>Thanks for registring with us.</p>
                                    <p>If you have not performed this activity, then please ignore this email.</p>
                                  </td>
                                </tr>
                              </table>
                            </td>
                          </tr>
            
                        <!-- END MAIN CONTENT AREA -->
                        </table>
            
                        <!-- START FOOTER -->
                        <div class='footer'>
                          <table border='0' cellpadding='0' cellspacing='0'>
                            <tr>
                              <td class='content-block'>
                                <span class='apple-link'>Yummyfood, Tunisia</span>
                                <br> This is mandatory service email sent to you by Yummyfood.
                              </td>
                            </tr>
                            <tr>
                              <td class='content-block powered-by'>
                                Powered by <a href='#'>yummyfood</a>.
                              </td>
                            </tr>
                          </table>
                        </div>
                        <!-- END FOOTER -->
            
                      <!-- END CENTERED WHITE CONTAINER -->
                      </div>
                    </td>
                    <td>&nbsp;</td>
                  </tr>
                </table>
              </body>
            </html>";
                    
            require_once "phpmailer/class.phpmailer.php";
                    // php mailer code starts
                    $mail = new PHPMailer(true);
                    $mail->IsSMTP(); // telling the class to use SMTP
            
                    //$mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
                    $mail->SMTPAuth = true;                  // enable SMTP authentication
                    $mail->SMTPSecure = "tls";                 // sets the prefix to the server
                    $mail->Host = 'smtp.gmail.com';     // replace with your SMTP server
                    $mail->Port = 587;                   // set the SMTP port for the your server
            
                    $mail->Username = 'jemaaoussama64@gmail.com';          // SMTP username
            $mail->Password = 'rourousousou9899@.'; //put the password here
            
            $mail->setFrom('jemaaoussama64@gmail.com', 'oussama jemaa'); //replace with your values
                    $mail->AddAddress($email);
            
                    $mail->Subject = trim("Email Verification - Yummyfood"); //email subject body
                    $mail->MsgHTML($message);
            
                    try {
                      $mail->send();
                      $msg = "Successfully Registered! Please verify your email.";
                      $msgType = "success";
                    } catch (Exception $ex) {
                      $msg = $ex->getMessage();
                    }
                  } else {
                    $msg = "Failed to create User";
                    $msgType = "danger";
                  }
                }
              } catch (Exception $ex) {
                echo $ex->getMessage();
              }
            }









              }     

if(isset($_POST['btn_login']))	//button name is "btn_login" 
{
   
	$username=$_POST["email"];	//textbox name "txt_username_email"
	$email=$_POST["email"];	//textbox name "txt_username_email"
	$password=$_POST["password"];			//textbox name "txt_password"
		
	if(empty($username)){						
		$errorMsg[]="please enter username or email";	//check "username/email" textbox not empty 
	}
	else if(empty($email)){
		$errorMsg[]="please enter username or email";	//check "username/email" textbox not empty 
	}
	else if(empty($password)){
		$errorMsg[]="please enter password";	//check "passowrd" textbox not empty 
	}
	else
	{
		try
		{
            $db = config::getConnexion();
			$select_stmt=$db->prepare("SELECT * FROM utilisateur WHERE login=:ulogin OR email=:uemail"); //sql select query
			$select_stmt->execute(array(':ulogin'=>$username, ':uemail'=>$email));	//execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			
			if($select_stmt->rowCount() > 0)	
			{ 




if (($row['role']=='admin')&&($username==$row["login"])&&($password==$row["password"])){
 

  $_SESSION["e"] = $row["email"];	//session name is "user_login"
							//user login success message
						header("Location: tables.php");
}

             /*   if( $_POST["email"]=="admin"&&$_POST["password"]=="admin"){
                    
              
            }*/
               
				if($username==$row["login"] OR $email==$row["email"]) //check condition user taypable "username or email" are both match from database "username or email" after continue
				{
                    if(password_verify($password, $row["password"]))
					//if($password==$row["password"])check condition user taypable "password" are match from database "password" using password_verify() after continue
					{
						$_SESSION["e"] = $row["email"];
        
            
            
            	//session name is "user_login"
						$loginMsg = "Successfully Login...";		//user login success message
						header("refresh:2; ProfilUser.php");			//refresh 2 second after redirect to "welcome.php" page
					}
					else
					{
						$errorMsg[]="wrong password";
					}
				}
				else
				{
					$errorMsg[]="wrong username or email";
				}


























                
			}
			else
			{
				$errorMsg[]="wrong username or email";
			}
		}
		catch(PDOException $e)
		{
			$e->getMessage();
		}		
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:40 GMT -->
<head>
<meta charset="utf-8">
<title>Tomato Responsive Restaurant HTML5 Template</title>
<meta name="author" content="Surjith S M">

<meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
<meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

<script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script><link rel="shortcut icon" href="img/favicon.ico">

<meta name="viewport" content="width=device-width">
<script src="verif.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
<!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
</head>
<script> 

         function validateForm()                                 
         { 
             var name = document.forms["form1"]["nom"];   
             var prenom =  document.forms["form1"]["prenom"]; 
             var adresse= document.forms["form1"]["email"];
             var login= document.forms["form1"]["login"];
             var pass=document.forms["form1"]["password"];
             //contorle de saisie pour le prenom 
             if (prenom.value == ""){ 
                 document.getElementById('errorname2').innerHTML="Veuillez entrez un prenom ";  
                 prenom.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorname2').innerHTML="";  
             }



if (prenom.value.substring(0,1)<'A'||prenom.value.substring(0,1)>'Z' ){ 
                 document.getElementById('errorname2').innerHTML="Veuillez entrez un prenom en majuscule";  
                 prenom.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorname2').innerHTML="";  
             }

// controle de saise pour le nom 

             if (nom.value == ""){ 
                 document.getElementById('errorname').innerHTML="Veuillez entrez un nom ";  
                 nom.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorname').innerHTML="";  
             }



             if (name.value.substring(0,1)<'A'||name.value.substring(0,1)>'Z' ){ 
                 document.getElementById('errorname').innerHTML="Veuillez entrez un nom en majuscule";  
                 name.focus(); 
                 return false; 
             }else{
                 document.getElementById('errorname').innerHTML="";  
             }

    //controle de saisie pour le mail

            /* Any letter or number: a-z, A-Z, 0-9.
A dot (.) but should not be first or last character.
punctuation: “(),:;<>@[]
special characters: !#$%&’*+-/=?^_{|}~
The domain part of the email address can contain the following:

Any letter or number: a-z, A-Z, 0-9.
The hyphen (-) but should not be first or last character*/
     
       
        var  re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(adresse.value.match(re)) {
  
  document.getElementById('errorname4').innerHTML=""; 
          
           }
           else{
              document.getElementById('errorname4').innerHTML="Invalid email";  
           return false ;
           }
//controle de saise pour le login 

 var letters = /^[0-9a-zA-Z]+$/;
        if(login.value.match(letters)) {
  
  document.getElementById('errorname5').innerHTML=""; 
          
           }
           else{
              document.getElementById('errorname5').innerHTML="Invalid login";  
           return false ;
           }

//controle de saise pour le mot de passe 
 //To check a password between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;

if(pass.value.match(passw)) {
  
    document.getElementById('errorname1').innerHTML=""; 
            
             }
             else{
                document.getElementById('errorname1').innerHTML="password wrong";  
             return false ;
             }
     



var password = document.getElementById("pass").value;
        var confirmPassword = document.getElementById("pass1").value;
        if (password != confirmPassword) {
            //alert("Passwords do not match.");
            document.getElementById('errorname1').innerHTML="password doesn't match";  
                 
            return false;
        }
        else{
                 document.getElementById('errorname1').innerHTML=""; 
  
        }






         }


      </script> 
      <style>
         .error{
            color: #D8000C;
            background-color: #FFBABA;
         }
        button a{
             color:black;
         }
      
      </style>

<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<?php
		if(isset($errorMsg))
		{
			foreach($errorMsg as $error)
			{
			?>
				<div class="alert alert-danger">
					<strong>WRONG ! <?php echo $error; ?></strong>
				</div>
            <?php
			}
		}
		if(isset($registerMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $registerMsg; ?></strong>
			</div>
        <?php
		}
		?>  
<?php
		
		if(isset($loginMsg))
		{
		?>
			<div class="alert alert-success">
				<strong><?php echo $loginMsg; ?></strong>
			</div>
        <?php
		}
		?>  

<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Account</h2>
<p>Please login or signup to continue with your purchase</p>
</div>
</div>
</div>
</section>

<section class="shop-content">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="row shop-login"> <!--starts here -->


    <div class="col-md-6">
        <div class="box-content">
        <h3 class="text-center">Register An Account</h3>
        <br>
        <form  action=""  method="POST"  name ="form1" onsubmit="return validateForm()"  class="logregform">
     


        <div class="row">
            <div class="form-group">
            <div class="col-md-12">
            <label>First name</label>
            <p><input type="text"  maxlength="20" name="prenom" id="prenom" class="form-control"><span class="error" id="errorname2"></span></p>
            </div>
            </div>
            </div>


            <div class="row">
                <div class="form-group">
                <div class="col-md-12">
                <label>Last name</label>
                <p> <input type="text"   maxlength="20" name="nom" id="nom" class="form-control"> <span class="error" id="errorname"></span> </p>
                </div>
                </div>
                </div>

                <div class="row">
                <div class="form-group">
                <div class="col-md-12">
                <label>Gender</label>
<br><br>
<label class="radio-inline"><input type="radio" name="genre" value="Male"required>Male</label>
<label class="radio-inline"><input type="radio" name="genre" value="Female"required>Female</label>





</div>
</div>
</div>
<br>
                <div class="row">
                    <div class="form-group">
                    <div class="col-md-12">
                    <label>E-mail Address</label>
                    <p><input type="text"  name="email" class="form-control"><span class="error" id="errorname4"></span> </p>
                    </div>
                    </div>
                    </div>





                    <div class="row">
                        <div class="form-group">
                        <div class="col-md-12">
                        <label>Login</label>
                        <p> <input type="text" name="login" class="form-control"> <span class="error" id="errorname5"></span> </p>
                        </div>
                        </div>
                        </div>

        <div class="clearfix space20"></div>
        <div class="row">
        <div class="form-group">
        <div class="col-md-6">
        <label>Password</label>
        <input type="password" name="password"  id="pass" class="form-control">
        </div>
        <div class="col-md-6">
        <label>Re-enter Password</label>
        <input type="password" id="pass1"  class="form-control">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12">
         <div class="space20"></div>
         <span class="error" id="errorname1"></span>
         
        
        <button type="submit" name="btn_register" class="btn btn-default pull-right">Register</button>
        </div>
        </div>
        </form>
        </div>
        </div>







<div class="col-md-6">
<div class="box-content">
<h3 class="text-center">Existing Customer</h3>
<br>
<form  action="" method="POST" class="logregform">
<div class="row">
<div class="form-group">
<div class="col-md-12">
<label>Username or E-mail Address</label>
 <input type="text" name="email" class="form-control">
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="form-group">
<div class="col-md-12">
<a class="pull-right" href="forget.php">(Lost Password?)</a>
<label>Password</label>
<input type="password" name="password" class="form-control">
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="col-md-6">
<span class="remember-box checkbox">
<label for="rememberme">
<input type="checkbox" id="rememberme" name="rememberme">Remember Me
</label>
</span>
</div>
<div class="col-md-6">
<button type="submit" name="btn_login" class="btn btn-default pull-right">Login</button>
</div>
</div>
</form>
</div>
</div> <!--ends here-->








<!-- register ends here-->
</div>
</div>
</div>
</div>
</section>

<section class="subscribe">
<div class="container">
<div class="row">
<div class="col-md-12">
<h1>Subscribe</h1>
<p>Get updates about new dishes and upcoming events</p>
<form class="form-inline" action="https://demo.web3canvas.com/themeforest/tomato/php/subscribe.php" id="invite" method="POST">
<div class="form-group">
<input class="e-mail form-control" name="email" id="address" type="email" placeholder="Your Email Address" required>
</div>
<button type="submit" class="btn btn-default">
<i class="fa fa-angle-right"></i>
</button>
</form>
</div>
</div>
</div>
</section>

<section class="footer">
<div class="container">
<div class="row">
<div class="col-md-4 col-sm-12">
<h1>About us</h1>
<p>Duis leo justo, condimentum at purus eu,Aenean sed dolor sem. Etiam massa libero, auctor vitae egestas et, accumsan quis nunc.Duis leo justo, condimentum at purus eu, posuere pretium tellus.</p>
<a href="about.html">Read more &rarr;</a>
</div>
<div class="col-md-4  col-sm-6">
<h1>Recent post</h1>
<div class="footer-blog clearfix">
<a href="blog_right_sidebar.html">
<img src="img/thumb8.png" class="img-responsive footer-photo" alt="blog photos">
<p class="footer-blog-text">Hand picked ingredients for our best customers</p>
<p class="footer-blog-date">29 may 2015</p>
</a>
</div>
<div class="footer-blog clearfix last">
<a href="blog_right_sidebar.html">
<img src="img/thumb9.png" class="img-responsive footer-photo" alt="blog photos">
<p class="footer-blog-text">Daily special foods that you will going to love</p>
<p class="footer-blog-date">29 may 2015</p>
</a>
</div>
</div>
<div class="col-md-4  col-sm-6">
<h1>Reach us</h1>
<div class="footer-social-icons">
<a href="https://www.facebook.com/">
<i class="fa fa-facebook-square"></i>
</a>
<a href="https://www.twitter.com/">
<i class="fa fa-twitter"></i>
</a>
<a href="https://plus.google.com/">
<i class="fa fa-google"></i>
</a>
<a href="https://www.youtube.com/">
<i class="fa fa-youtube-play"></i>
</a>
<a href="https://www.vimeo.com/">
<i class="fa fa-vimeo"></i>
</a>
<a href="https://www.pinterest.com/">
<i class="fa fa-pinterest-p"></i>
</a>
<a href="http://www.linkedin.com/">
<i class="fa fa-linkedin"></i>
</a>
</div>
<div class="footer-address">
<p><i class="fa fa-map-marker"></i>28 Seventh Avenue, Neew York, 10014</p>
<p><i class="fa fa-phone"></i>Phone: (415) 124-5678</p>
<p><i class="fa fa-envelope-o"></i>s<a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="700500001f02043002150304110502111e045e131f1d">[email&#160;protected]</a></p>
</div>
</div>
</div>
</div>

<div class="footer-copyrights">
<div class="container">
<div class="row">
<div class="col-md-12">
<p><i class="fa fa-copyright"></i> 2015.Tomato.All rights reserved. Designed with <i class="fa fa-heart primary-color"></i> by Surjithctly</p>
</div>
</div>
</div>
</div>
</section>
</div>
</div>

<div class="b-settings-panel">
<div class="settings-section">
<span>
Boxed
</span>
<div class="b-switch">
<div class="switch-handle"></div>
</div>
<span>
Wide
</span>
</div>
<hr class="dashed" style="margin: 15px 0px;">
<h5>Main Background</h5>
<div class="settings-section bg-list">
<div class="bg-wood_pattern"></div>
<div class="bg-shattered"></div>
<div class="bg-vichy"></div>
<div class="bg-random-grey-variations"></div>
<div class="bg-irongrip"></div>
<div class="bg-gplaypattern"></div>
<div class="bg-diamond_upholstery"></div>
<div class="bg-denim"></div>
<div class="bg-crissXcross"></div>
<div class="bg-climpek"></div>
</div>
<hr class="dashed" style="margin: 15px 0px;">
<h5>Color Scheme</h5>
<div class="settings-section color-list">
<div data-src="css/themes/blue.css" style="background: #45b5f5"></div>
<div data-src="css/themes/brown.css" style="background: #dc8068"></div>
<div data-src="css/themes/cyan.css" style="background: #00becc"></div>
<div data-src="css/themes/green.css" style="background: #5bb75b"></div>
<div data-src="css/themes/orange.css" style="background: #ff7149"></div>
<div data-src="css/themes/pink.css" style="background: #fba1a1"></div>
<div data-src="css/themes/red.css" style="background: #dc3522"></div>
<div data-src="css/themes/yellow.css" style="background: #fdb813"></div>
</div>
<a data-src="css/style.css" class="reset"><span class="bg-wood_pattern">Reset</span></a>
<div class="btn-settings"></div>
</div>

<script src='https://www.google.com/recaptcha/api.js' async defer ></script>
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery-1.11.2.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/jquery.flexslider-min.js"></script>
<script src="js/vendor/spectragram.js"></script>
<script src="js/vendor/owl.carousel.min.js"></script>
<script src="js/vendor/velocity.min.js"></script>
<script src="js/vendor/velocity.ui.min.js"></script>
<script src="js/vendor/bootstrap-datepicker.min.js"></script>
<script src="js/vendor/bootstrap-clockpicker.min.js"></script>
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/vendor/isotope.pkgd.min.js"></script>
<script src="js/vendor/slick.min.js"></script>
<script src="js/vendor/wow.min.js"></script>
<script src="js/animation.js"></script>
<script src="js/vendor/vegas/vegas.min.js"></script>
<script src="js/vendor/jquery.mb.YTPlayer.js"></script>
<script src="js/vendor/jquery.stellar.js"></script>
<script src="js/main.js"></script>
<script src="js/vendor/mc/jquery.ketchup.all.min.js"></script>
<script src="js/vendor/mc/main.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:40 GMT -->
</html>
