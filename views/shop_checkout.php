
<?php

include_once "../model/commande.php";
include "../controller/commandeC.php";

require_once "../model/lcommande.php";


session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   }
   else {
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



     $aa=new commandeC();
     $liste=$aa->afficher_commande($userRow['id']);
     foreach($liste as $aa){


        $idp=$aa['idplat'];
        require_once "dbconfig.php";
        $select_stmt=$db->prepare("SELECT * FROM menu where id_plat=:idp ");	
        $select_stmt->execute(array(
        ':idp'=>$idp
        
        ));
        while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
        {
        



     $suc=0;
     $a1=null;
     $error="";
     if (isset($_POST['adr']) && isset($_POST['phone']) && isset($_POST['date'])) {
        
             $adr = $_POST['adr'];
             $phone = $_POST['phone'];
             $date = $_POST['date'];
    $idp=$aa['idplat'];
     $p=$_POST['payment'];
      $price=$row['prix_plat'];   
     $a1=new lcommande($userRow["id"],$idp,$adr,$phone,$p,$date);
     $commandeC=new commandeC();
     $suc=1;
     }
     else $error="missing information";




    }
     }

?>


<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/shop_cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:16:03 GMT -->
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
<?php
	if($suc==1)
	$commandeC-> ajouter_lcommande($a1);
    if(isset($_POST["paynow"])){
        header("Location:shop_account_detail.php");
    }
    
   	
	?>
<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Shop Cart</h2>
<p>Checkout or add some items to your Shop Cart</p>
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
<th>remove </th> 
<th> USER </th> 
  
<th>Product ID</th>
<th>Price</th>

<th>Image</th>
</tr>
</thead>
<tbody>
<?php

$com=new commandeC();
$liste=$com->afficher_commande($userRow['id']);
foreach($liste as $com){

?>

<tr>
<td>
<form method="POST" action="delete_shop.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $com['idplat']; ?> name="idplat">
						</form>

</td>


<?php

$idp=$com['idplat'];
require_once "dbconfig.php";
$select_stmt=$db->prepare("SELECT * FROM menu where id_plat=:idp ");	
$select_stmt->execute(array(
':idp'=>$idp

));
while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
{


?>

<form method="POST">
<td>

<input type="text" name="user" value="<?php echo $userRow['login']; ?>" style="border-color:rgba(0,0,0,0);text-align:center">

</td>


<td>

<input type="text" name="idplat" value="<?php echo $com['idplat']; ?>" style="border-color:rgba(0,0,0,0);text-align:center">
</td>
<td>

<input type="text" name="prix" value="<?php echo $row['prix_plat']; ?>" style="border-color:rgba(0,0,0,0);text-align:center">
</td>


<td>
<img  src="img/shop/<?php echo $row['image_plat']; ?>">
</td>
<?php
}
    }
?>
</tbody>
</table>

<div class="btn btn-default pull-left" style="display:none">
<form name ="form-btn" method="post" >
<input type="submit" id="btn-check" name="checkout" value="Checkout">

</form>
<br>
</div>
<form method="post" style="display:none">
<div class="btn btn-default">
<input type="submit" name="update_recu" value="Update Receit" style="background-color:rgba(0,0,0,0);border-color:rgba(0,0,0,0)" >
<?php

if(isset($_POST["update_recu"])){
    header("Location:shop_cart_updated.php");
}
?>
</form>


</div>
</form>




<br>
<br>
<br>
<script>
function verif(){
var phone = document.getElementById('phone');

var t = /^\d{8}$/;
if (!(isNaN(phone)) || phone.value.match(t) ){

    document.getElementById('errorname').innerHTML=""; 
          
        }
        else{
           document.getElementById('errorname').innerHTML="Votre Telephone est Invalide";  
        return false ;
        }

        var date = document.getElementById('date');
        var today=new Date();
     var dd=today.getDate();
     var mm=today.getMonth()+1;
     var yy=today.getFullYear();
var dispo= dd+'-'+mm+'-'+yy;
     if(date === ""){
    document.getElementById('errorname').innerHTML="Vous Devez Choisir Un date <br> Nous Somme Disponible a partir de " +dispo;
return false;

}

 var adr=document.getElementById('adr');


for(let i=0;i<adr.length;i++)
{
    if(!isNaN(adr.charAt(i))){
        document.getElementById('errorname').innerHTML="Votre Adresse Doit Etre Detaillé Qui Contient Le Code Postal";  
        return false;
    }
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


<form name="form-checkn" id="form-check" method="POST" onsubmit="return verif()">

<p class="error" id="errorname"></p>
<div class="clearfix space20"></div>
<div class="row">
<div class="col-md-6">
<label>First Name </label>
<input class="form-control" value="<?php echo $userRow["prenom"]?>"  type="text" disabled>
</div>
<div class="col-md-6">
<label>Last Name </label>
<input class="form-control" placeholder="" value="<?php echo $userRow["nom"]?>" type="text" disabled>
</div>
</div>

<div class="clearfix space20"></div>
<label>Address </label>
<input class="form-control" name="adr" id="adr" placeholder="Detailed Street address + PostCode" type="text">

<div class="clearfix space20"></div>
<label>Email Address </label>
<input class="form-control" placeholder="" value="<?php echo $userRow["email"]?>" type="text" disabled>
<div class="clearfix space20"></div>
<label>Phone </label>
<input class="form-control" id="phone" name="phone" placeholder="+216 12 345 678"  type="text">
<div class="clearfix space20"></div>
<label>Date</label>
<input class="form-control" name="date" id="date" type="date">






<br>

<br>
<br>
<h4 class="text-left">Payment Method</h4>
<br>
<div class="payment-method">
<div class="row">

<div class="col-md-4">
<label>
<input name="payment" id="radio1" class="css-checkbox" type="radio" value="Direct Bank Transfer"><span>Direct Bank Transfer</span></label>
<div class="space20"></div>
<p>Make payment directly into our bank account and use your Order ID as the reference. </p>
</div>
<div class="col-md-4">
<label>
<input name="payment" id="radio2" class="css-checkbox" type="radio" value="Cheque Payment"><span>Cheque Payment</span></label>
<div class="space20"></div>
<p>Please send your cheque to BLVCK Fashion House, Oatland Rood, UK, LS71JR</p>
</div>
<div class="col-md-4">
<label>
<input name="payment" id="radio3" class="css-checkbox" type="radio" value="Paypal"><span>Paypal</span></label>
<div class="space20"></div>
<p>Pay via PayPal; you can pay with your credit card if you don't have a PayPal account</p>
</div>

</div>

<div class="btn btn-default pull-left">

<input type="submit" value="PAY NOW" name="paynow" style="background-color:rgba(0,0,0,0);border-color:rgba(0,0,0,0)">


</form>
</div>
</div>

<br>
<br>
<?php

$com=new commandeC();
$result=$com->affiche_somme($userRow["id"]);


?>

<br>
<br>
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
</div>
</div>
</div>
</section>



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
<form class="form-inline" id="invite" method="POST">
<div class="form-group">
<input class="e-mail form-control" name="email" id="address" type="email" placeholder="Your Email Address">
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
