<?php
include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['email']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>Tomato Responsive Restaurant HTML5 Template</title>
<meta name="author" content="Surjith S M">

<meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
<meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

<script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script><link rel="shortcut icon" href="img/favicon.ico">

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">

</head>

<script>


function verifier()                                 
         { 
      
            
             var pass=document.forms["form1"]["password"];
           
            


//controle de saise pour le mot de passe 
 //To check a password between 6 to 20 characters which contain at least one numeric digit, one uppercase and one lowercase letter
var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
if(pass.value!=""){
if(pass.value.match(passw)) {

    document.getElementById('errorname1').innerHTML=""; 
            
             }
             else{
                document.getElementById('errorname1').innerHTML="wrong password";  
             return false ;
             }
     



var password = document.getElementById("pass").value;
        var confirmPassword = document.getElementById("pass1").value;
        if (password != confirmPassword) {
            //alert("Passwords do not match.");
            document.getElementById('errorname1').innerHTML="passwords don't match";  
                 
            return false;
        }
        else{
                 document.getElementById('errorname1').innerHTML=""; 
  
        }


         
}


         }


      </script> 














<style>
         .error{
            color: #D8000C;
            background-color: #FFBABA;
            font-size:20px;
         }
        button a{
             color:black;
         }
      


         .ed{

border-width:thin;

padding:5px;
margin-bottom: 4px;
}
#button1{
text-align:center;

display: block;
    margin-left: auto;
    margin-right: auto;

}
#imagelist{
border: thin solid silver;
float:left;
padding:5px;
width:auto;
margin: 0 5px 0 0;
}
p{
margin:0;
padding:0;
text-align: center;
font-style: italic;
font-size: smaller;
text-indent: 0;
}
#caption{
margin-top: 5px;
}
img{
height: 225px;
}

#del{
    position:relative ; 
    top:50%;
    left:50%;
}

      </style>
<body>
<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Account Settings</h2>
<p>Welcome to YummyFood !</p>
</div>
</div>
</div>
</section>

<section class="reservation">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1>Update Account<small>Change your password.Upload a photo.Delete your Account</small></h1>
</div>
</div>
</div>
<div class="reservation-form wow fadeInUp">
<p class="error" id="errorname1"></p>
<form  name="form1" action="update.php" method="POST"  onsubmit="return verifier()">
<div class="row">
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="datepicker" >Client :</label>
 <input type="text" name="nom" class="form-control" value ="<?php echo $_SESSION['prenom'] . " ".$_SESSION['nom'] ?>"  placeholder="Pick a date" disabled >

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="name">Enter your new password</label>
<input type="text" class="form-control"  id="pass"  name="password" placeholder="Enter your new password"  >
<input type="hidden" class="form-control"  value ="<?php echo $_SESSION['password'] ?>"  name="cpassword" placeholder="Enter your new password"  >
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="timepicker">Current login</label>
<input type="text" class="form-control"  name="clogin" value="<?php echo $_SESSION['login'] ?>"  placeholder="Current login" >

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="email">Email Address</label>
<input type="email" class="form-control"   name="email" value="<?php echo $_SESSION['email'] ?>"  placeholder="Your Email ID"  >

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label   for="guests">Re-enter your password</label>
<input class="form-control" type="text" id="pass1"   placeholder="How many of you?" >

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="phone">New Login </label>
<input type="text"  name="login" class="form-control"  placeholder="Enter your New Login" >

</div>
</div>
<div class="col-md-12 col-sm-12">
<div class="reservation-btn">
<button type="submit"  name="save" class="btn btn-default btn-lg" >Save Changes</button>
<div id="js-reservation-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>

<br>
<br>

</div>
</div>
</div>
</form>
</div>
<form method="post" action="delete_account.php">
<h6>To delete your Account press this button</h6>
<button id="del" style="color:red" type="submit" name="delete" class="glyphicon glyphicon-trash" ></button>
<input type="text" class="form-control" value="<?php echo $_SESSION['email'] ?>"    name="email" placeholder="Enter your Email Adress" style="display:none" >
</form>
<!-- uplaod an image -->
<form action="addim.php" method="post" enctype="multipart/form-data" name="addroom">
  
 <input  type="file" name="image" class="ed"><br />
 
 <input  style ="display:none" value ="<?php echo $_SESSION['prenom'] ?>" name="caption" type="text" class="ed" id="brnu" />
 <br />
 <input type="submit" class="btn btn-default btn-lg"    name="Submit" value="Upload a photo " id="button1" />
 </form>
<br />

<br />
<br />
<?php
try{
    $user= $_SESSION['email'];
$db = config::getConnexion();
$select_stmt=$db->prepare("SELECT * FROM utilisateur WHERE email=:user "); //  lezem where email:=user_id 
$select_stmt->execute(array(":user"=>$user));




while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
{
echo '<div id="imagelist">';
echo '<p><img src="'.$row['location'].'"></p>';
echo '<p id="caption">'.$row['caption'].' </p>';
echo '</div>';
}
}
catch(PDOException $e)
		{
			$e->getMessage();
        }
?>

<div class="reservation-footer">


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
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="12616762627d60665260776166736760737c663c717d7f">[email&#160;protected]</a></p>
</div>
</div>
</div>
</div>

<div class="footer-copyrights">
<div class="container">
<div class="row">
<div class="col-md-12">
<p><i class="fa fa-copyright"></i> 2021.YummyFood.All rights reserved. Designed with <i class="fa fa-heart primary-color"></i> by WEDon'tByte</p>
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
<script src="js/vendor/validate.js"></script>
<script src="js/reservation.js"></script>
<script src="js/vendor/mc/main.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/reservation.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:31 GMT -->
</html>
