<?php
session_start();
include_once '../model/Utilisateur.php';
include_once '../controller/UtilisateurC.php';
$message="";
$userC = new UtilisateurC();
if (isset($_POST["email"]) &&
    isset($_POST["password"])) {
    if (!empty($_POST["email"]) &&
        !empty($_POST["password"]))
    {   $message=$userC->connexionUser($_POST["email"],$_POST["password"]);
        if( $_POST["email"]=="admin"&&$_POST["password"]=="admin"){
            header('Location:afficherUtilisateurs.php');
        }
         $_SESSION['e'] = $_POST["email"];// on stocke dans le tableau une colonne ayant comme nom "e",
        //  avec l'email à l'intérieur
        if($message!='pseudo ou le mot de passe est incorrect'){
           header('Location:ProfilUser.php');}
        else{
            $message='pseudo ou le mot de passe est incorrect';
        }}
    else
        $message = "Missing information";}
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

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
<!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
</head>
<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->



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
        <form  action=""  method="POST" name ="form" class="logregform">
     


        <div class="row">
            <div class="form-group">
            <div class="col-md-12">
            <label>First name</label>
            <input type="text"  name="prenom" class="form-control">
            </div>
            </div>
            </div>


            <div class="row">
                <div class="form-group">
                <div class="col-md-12">
                <label>Last name</label>
                <input type="text"  name="nom" class="form-control">
                </div>
                </div>
                </div>



                <div class="row">
                    <div class="form-group">
                    <div class="col-md-12">
                    <label>E-mail Address</label>
                    <input type="text"  name="email" class="form-control">
                    </div>
                    </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                        <div class="col-md-12">
                        <label>Login</label>
                        <input type="text" name="login" class="form-control">
                        </div>
                        </div>
                        </div>









        <div class="clearfix space20"></div>
        <div class="row">
        <div class="form-group">
        <div class="col-md-6">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
        </div>
        <div class="col-md-6">
        <label>Re-enter Password</label>
        <input type="password"  class="form-control">
        </div>
        </div>
        </div>
        <div class="row">
        <div class="col-md-12">
         <div class="space20"></div>
        <button type="submit" class="btn btn-default pull-right">Register</button>
        </div>
        </div>
        </form>
        </div>
        </div>







<div class="col-md-6">
<div class="box-content">
<h3 class="text-center">Existing Customer</h3>
<br>




<form action=""  method="POST" name ="form" class="logregform">
<div class="row">
<div class="form-group">
<div class="col-md-12">
<label>Username or E-mail Address</label>
 <input type="text" name="email"  class="form-control" >
 <div>
      <?php if($message!="") { echo $message; } ?>
    </div>
</div>
</div>
</div>
<div class="clearfix"></div>
<div class="row">
<div class="form-group">
<div class="col-md-12">
<a class="pull-right" href="index-2.html">(Lost Password?)</a>
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
<button type="submit" class="btn btn-default pull-right">Login</button>
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
