<?php

include_once "../model/commandes.php";
include "../controller/commandesC.php";
include "../controller/promotionC.php"; 
include "../controller/platC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['email']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   }
   else {
    try
         {
    $user_id = $_SESSION['email'];
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


?>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:16:03 GMT -->
<head>
<meta charset="utf-8">
<title>Affiche Cart</title>
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


	

<div class="preloder animated">
<div class="scoket">
<img src="img/preloader.svg" alt="" />
</div>
</div>
<div class="body">
<div class="main-wrapper">

<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Cart</h2>
<p>Checkout or add some items to your cart</p>
</div>
</div>
</div>
</section>

<section class="shop-content">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<table class="cart-table table table-bordered">
<thead>
<tr>
<th>&nbsp;</th> <!-- delete-->
<th>&nbsp;</th> <!-- image plat-->
<th>NOM PLAT</th>
<th>CLIENT(E)</th>
<th>QUANTITE</th>
<th>PRIX TOTAL</th>

</tr>
</thead>
<?php

$c=new commandesC();
$a=new commandesC();
$liste=$c->afficher_panier($userRow['id']);
foreach($liste as $c){

?>
<tbody>

<?php

$PlatC=new PlatC();
$idp=$c['idplat'];
$listePlat=$PlatC->afficher_plat_id($idp);
foreach($listePlat as $row)
{

	?>

<tr>

<td>

<form method="post" action="supprimerpanier.php" >

<button class="btn btn-success" type="submit" name="efface">Delete</button>
<!--<input type="submit" name="modif" value="Update Cart">-->

<input type="hidden" name="idpf" value=<?php echo $row["id_plat"] ?>>

<input type="hidden" name="idcf" value=<?php echo $c["idclient"] ?>>


</form>







</td>

<td>
<img  src="z-front/img/menu/1/<?php echo $row['image']; ?>" width="250">
</td>
<td>
<a href="test3.php"><?php echo $row['nom']; ?></a>
</td>
<input type="hidden" value=<?php echo $row['nom']; ?> name="plat">
<td>
<span class="amount"><?php echo $userRow['nom'].' '.$userRow['prenom']; ?></span>
</td>
<td>

<input type="text" value=<?php echo $c["quantite"] ?> name="test" style="width:25px;border-color:rgba(0,0,0,0)" disabled>



</td>
<td>
<span class="amount"><?php echo $c['prixtotal']; ?></span>
</td>

</tr>
<?php
    
    }
}
?>


</tbody>
</table>

<script>

function verif(){
var phone =document.forms["form-checkout"]["phone"];


var t = /^\d{8}$/;
var t1 = /^\d{4}$/;
if (!(isNaN(phone)) || phone.value.match(t) ){

    document.getElementById('errorname').innerHTML=""; 
          
        }
        else{
           document.getElementById('errorname').innerHTML="Votre Telephone est Invalide";  
        return false ;
        }



}


</script>

<style>
         .error{
            color: #D8000C;
            background-color: #FFBABA;
            text-align:center;
            border-radius:25px;
            
         }
     
      </style>




<div class="text-center top-space-lg">
<button class="btn btn-success" type="submit" onclick="window.open('shop_checkout.php', '_self')">Checkout</button>

    </div>
<br>
<br>

<p class="error" id="errorname"></p>







<form method="post" action="shop_account_detail.php" name="form-checkout" onsubmit="return verif()">

<div class="row">


<div class="col-md-6">
<label>First Name </label>
<input class="form-control" placeholder="" value=<?php echo $userRow["nom"] ?> type="text" disabled>
</div>


<div class="col-md-6">
<label>Last Name </label>
<input class="form-control" placeholder="" value=<?php echo $userRow["prenom"] ?> type="text" disabled>
</div>
</div>


<div class="clearfix space20"></div>
<label>Address </label>
<input class="form-control" placeholder="Street address" value="" type="text" name="location">

<div class="clearfix space20"></div>
<label>Email Address </label>
<input class="form-control" placeholder="" value=<?php echo $userRow["email"] ?> type="text" name="email" disabled>

<div class="clearfix space20"></div>
<label>Date </label>
<?php 

$month = date('m');
$day = date('d');
$year = date('Y');

$today = $year . '-' . $month . '-' . $day;
?>
<input type="date" value="<?php echo $today; ?>" class="form-control" id="date" name="date" min="<?php $Date=date('Y-m-d');echo $Date;?>">



<div class="clearfix space20"></div>
<label>Phone </label>
<input class="form-control" id="billing_phone" placeholder="" value="" type="text" name="phone">
<br>



<?php

$com=new commandesC();
$result=$com->somme_commandes($userRow["id"]);


?>


<table class="table table-bordered extra-padding">
<tbody>
<tr>
<th>Cart Subtotal</th>
<td><?php echo $result ?></td>
</tr>
<tr>
<th>Shipping and Handling</th>
<td>
Free Shipping
</td>
</tr>
<tr>
<th>Order Total</th>
<td><strong><?php echo $result ?></strong> </td>
</tr>
</tbody>
 </table>




</div>
<div class="text-center top-space-lg">
<button class="btn btn-default btn-lg" type="submit" name="pay">Pay Now</button>
<input type="hidden" name="idc" value=<?php echo $c["idclient"] ?>>
<input type="hidden" name="idcomm" value=<?php echo $c["idcommande"] ?>>
<input type="hidden" name="quantite" value=<?php echo $c["quantite"] ?>>
<input type="hidden" name="prtt" value=<?php echo $c["prixtotal"] ?>>
<input type="hidden" name="plat" value=<?php echo $c["idplat"] ?>>
</div>







</form>




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
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="7e0d0b0e0e110c0a3e0c1b0d0a1f0b0c1f100a501d1113">[email&#160;protected]</a></p>
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:16:03 GMT -->
</html>