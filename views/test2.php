

<?php
include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   }
   else  {
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

/* 
hedha iji ta7t el body <div id="error">
	<?php echo $error;?>
	</div>
	<div>
	<?php
	if($suc==1)
	$userC->update($u1);	
    tetsaker el balise mta el php
	
	</div>
	<div>*/
  
 
  $suc=0;
  $u1=null;
  $error="";
  if(isset($_POST['nom']) && isset($_POST['prenom'])
  &&isset($_POST['email'])&& isset($_POST['login'])
  && isset($_POST['password'])&&!empty($_POST['password']))
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/reservation.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:31 GMT -->
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
<!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
</head>
<style>
         .error{
            color: #D8000C;
            background-color: #FFBABA;
            
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
















      </style>









<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<div id="error">
	<?php echo $error;?>
	</div>
	<div>
 
	<?php
	if($suc==1){
        
        if ( preg_match ( " /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/ " , $password ) )
        {
            $userC->update($u1);
        ?>
                                                                        
<div class="alert alert-success">
				<strong><?php echo "password changed succesfully"; ?></strong>
			</div>
        <?php
        }  else {
        ?>
        <?php
      
?><div class="alert alert-danger">
<strong><?php echo "wrong password" ?></strong>
</div>
<?php
        }
		?>
<?php 
  if(isset($_POST['delete'])){
    
    $userC->delete($u1);
    header(" Location :deconnexion.php");}
  }
    ?>



    



 
	</div>
	<div>

<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Reservation</h2>
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
<h1>Reservations<small>Book a table online. Leads will reach in your email.</small></h1>
</div>
</div>
</div>
<div class="reservation-form wow fadeInUp">
<form action="" method="POST">
<div class="row">
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="datepicker" style="color:white">Date</label>
 <input type="text" name="nom" class="form-control"  placeholder="Pick a date" style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="name">Your Email Adress</label>
<input type="text" class="form-control" value="<?php print($userRow['email']) ?>"   name="email" placeholder="Enter your Email Adress"  >

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label  style="color:white" for="timepicker">Time</label>
<input type="text" class="form-control"  name="prenom" placeholder="Pick a time"  style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label   style="color:white" for="email">Email Address</label>
<input type="email" class="form-control"   placeholder="Your Email ID"  style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label  style="display:none" for="guests">Guests</label>
<input class="form-control" type="number"  name="login" placeholder="How many of you?"  style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="phone">New Password </label>
<input type="text"  name="password" class="form-control"  placeholder="Enter your New Password" >

</div>
</div>
<div class="col-md-12 col-sm-12">
<div class="reservation-btn">
<button type="submit"   class="btn btn-default btn-lg" >Save Changes</button>
<div id="js-reservation-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>
<br>
<br>
<h6>To delete your Account press this button</h6>
<button style="color:red" type="submit" name="delete" class="glyphicon glyphicon-trash" ></button>
</div>
</div>
</div>
</form>
</div>
<!-- uplaod an image -->
<form action="addim.php" method="post" enctype="multipart/form-data" name="addroom">
  
 <input  type="file" name="image" class="ed"><br />
 
 <input  style ="display:none" value ="<?php echo $userRow['prenom'] ;?>"name="caption" type="text" class="ed" id="brnu" />
 <br />
 <input type="submit" class="btn btn-default btn-lg"    name="Submit" value="Upload a photo " id="button1" />
 </form>
<br />

<br />
<br />
<?php

try{
    $user= $_SESSION['e'];
$db = config::getConnexion();
$select_stmt=$db->prepare("SELECT * FROM utilisateur WHERE email=:user "); //  lezem where email:=user_id 
$select_stmt->execute(array(":user"=>$user_id));



//$result = mysql_query("SELECT * FROM photos");
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
