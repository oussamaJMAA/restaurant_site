<?php 
include "../../Controller/ReclamationC.php";
 
 $reclamationC=new reclamationC();

$listereclamation=$reclamationC->afficherReclamation(); 

?>

<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:16:03 GMT -->
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



<script> 






         function validateForm()                                 
         { 
             var name = document.forms["form1"]["nom"];   
             var prenom =  document.forms["form1"]["prenom"]; 
             var adresse= document.forms["form1"]["email"];


 
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






       
        var  re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(adresse.value.match(re)) {
  
  document.getElementById('errorname4').innerHTML=""; 
          
           }
           else{
              document.getElementById('errorname4').innerHTML="Invalid email";  
           return false ;
           }



         }

</script> 







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

<nav class="navbar navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="index-2.html">
<img src="img/nav-logo.png" alt="nav-logo">
</a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="index-2.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="index-2.html">Home - Image</a></li>
<li><a href="index_slider.html">Home - Header Slider</a></li>
<li><a href="index_video.html">Home - Video Background</a></li>
<li><a href="index_parallax.html">Home - Parallax</a></li>
<li><a href="index_animation.html">Home - Scroll Animation</a></li>
</ul>
</li>
<li class="dropdown">
<a href="menu_all.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="menu_list.html">Menu - List</a></li>
<li><a href="menu_overlay.html">Menu - Overlay</a></li>
<li><a href="menu_tile.html">Menu - Tile</a></li>
<li><a href="menu_grid.html">Menu - Grid</a></li>
<li><a href="menu_all.html">Menu All</a></li>
</ul>
</li>
<li class="dropdown">
<a href="reservation.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservation<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="reservation.html">Reservation</a></li>
<li><a href="reservation-ot.html">Reservation - Opentable</a></li>
</ul>
</li>
<li class="dropdown">
<a href="about.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="about.html">About</a></li>
<li><a href="gallery.html">Gallery</a></li>
<li><a href="elements.html">Shortcodes</a></li>
<li><a href="shop_account.html">Login / Signup</a></li>
<li><a href="404.html">404 Page</a></li>
</ul>
</li>
<li class="dropdown">
<a href="recipe.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Recipe<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="recipe.html">Recipe - 2Col</a></li>
<li><a href="recipe_3col.html">Recipe - 3Col</a></li>
<li><a href="recipe_4col.html">Recipe - 4Col</a></li>
<li><a href="recipe_masonry.html">Recipe - Masonry</a></li>
<li>
<a href="recipe_detail-image.html">Recipe - Single <span class="caret-right"></span></a>
<ul class="dropdown-menu">
<li><a href="recipe_detail-image.html">Recipe - Image</a></li>
<li><a href="recipe_detail-slider.html">Recipe - Gallery</a></li>
<li><a href="recipe_detail-video.html">Recipe - Video</a></li>
</ul>
</li>
</ul>
</li>
<li class="dropdown">
<a href="blog_right_sidebar.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="blog_right_sidebar.html">Blog - Right Sidebar</a></li>
<li><a href="blog_left_sidebar.html">Blog - Left Sidebar</a></li>
<li><a href="blog_fullwidth.html">Blog - Fullwidth</a></li>
<li><a href="blog_masonry.html">Blog - Masonry</a></li>
<li>
<a href="blog_single_image.html">Blog - Single <span class="caret-right"></span></a>
<ul class="dropdown-menu">
<li><a href="blog_single_image.html">Blog - Image</a></li>
<li><a href="blog_single_slider.html">Blog - Gallery</a></li>
<li><a href="blog_single_video.html">Blog - Video</a></li>
</ul>
 </li>
</ul>
</li>
<li class="dropdown">
<a href="shop_fullwidth.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Shop<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="shop_fullwidth.html">Shop - Full</a></li>
<li><a href="shop_left_sidebar.html">Shop - Left Sidebar</a></li>
<li><a href="shop_right_sidebar.html">Shop - Right Sidebar</a></li>
<li>
<a href="shop_single_full.html">Shop - Single <span class="caret-right"></span></a>
<ul class="dropdown-menu">
<li><a href="shop_single_full.html">Shop - Full</a></li>
<li><a href="shop_single_left.html">Shop - Left Sidebar</a></li>
<li><a href="shop_single_right.html">Shop - Right Sidebar</a></li>
</ul>
</li>
<li><a href="shop_cart.html">Shop - Cart</a></li>
<li><a href="shop_checkout.html">Shop - Checkout</a></li>
<li><a href="shop_account.html">Shop - Account</a></li>
<li><a href="shop_account_detail.html">Shop - Account Detail</a></li>
</ul>
</li>
<li><a href="ajouterreclamation.php">Contact</a></li>
<li class="dropdown">
<a class="css-pointer dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-shopping-cart fsc pull-left"></i><span class="cart-number">3</span><span class="caret"></span></a>
<div class="cart-content dropdown-menu">
<div class="cart-title">
<h4>Shopping Cart</h4>
</div>
<div class="cart-items">
<div class="cart-item clearfix">
<div class="cart-item-image">
<a href="shop_single_full.html"><img src="img/cart-img1.jpg" alt="Breakfast with coffee"></a>
</div>
<div class="cart-item-desc">
<a href="shop_single_full.html">Breakfast with coffee</a>
<span class="cart-item-price">$19.99</span>
<span class="cart-item-quantity">x 2</span>
<i class="fa fa-times ci-close"></i>
</div>
</div>
<div class="cart-item clearfix">
<div class="cart-item-image">
<a href="shop_single_full.html"><img src="img/cart-img2.jpg" alt="Chicken stew"></a>
</div>
<div class="cart-item-desc">
<a href="shop_single_full.html">Chicken stew</a>
<span class="cart-item-price">$24.99</span>
<span class="cart-item-quantity">x 3</span>
 <i class="fa fa-times ci-close"></i>
</div>
</div>
</div>
<div class="cart-action clearfix">
<span class="pull-left checkout-price">$ 114.95</span>
<a class="btn btn-default pull-right" href="shop_cart.html">View Cart</a>
</div>
</div>
</li>
</ul>
</div>

</div>
</nav>

<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Contact</h2>
<p>Tomato is a delicious restaurant website template</p>
</div>
</div>
</div>
</section>

<section class="main-content contact-content">
<div class="container">
<div class="col-md-10 col-md-offset-1">
<div class="row">
<div class="col-md-6">
<h3 class="text-left no-margin-top">Address</h3>
<div class="footer-address contact-info">
<p><i class="fa fa-map-marker"></i>28 Seventh Avenue, Neew York, 10014</p>
<p><i class="fa fa-phone"></i>Phone: (415) 124-5678</p>
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="ec9f999c9c839e98ac9e899f988d999e8d8298c28f8381">[email&#160;protected]</a></p>
</div>
<br>
<h3 class="text-left no-margin-top">Working hours</h3>
<div class="contact-info text-muted">
<p>10:00 am to 11:00 pm on Weekdays</p>
<p>11:00 am to 11:30 pm on Weekends</p>
</div>
<br>
<h3 class="text-left no-margin-top">Follow Us</h3>
<div class="contact-social">
<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
<a href="https://www.twitter.com/"><i class="fa fa-twitter"></i></a>
<a href="https://www.dribbble.com/"><i class="fa fa-dribbble"></i></a>
<a href="https://www.instagram.com/"><i class="fa fa-instagram"></i></a>
</div>
</div>
<div class="col-md-6">
<form method="POST" action="ajouterreclamationC.php" >
<div class="form-group">
<input class="form-control" name="nom" id="nom" placeholder="Full Name" type="text" required="required" />
</div>
<div class="form-group">
<input class="form-control" type="email" name="email" id="email" placeholder="Email Address" required="required" />
</div>
<div class="form-group">
<!--<input class="form-control" placeholder="Subject" type="text" id="sujet" name="sujet" required="required"> -->
<select class="form-control" id="sujet">
<option value="">Subject</option>
<option value="Plats">Plats</option>
<option value="Service">Service</option>
<option value="Articles">Articles</option>
<option value="Reservation">Reservation</option>
<option value="Prix">Prix</option>
</select>
</div>
<div class="form-group">
<textarea class="form-control" name="message" id="message" placeholder="Message" rows="5" required="required"></textarea>
</div>
<!--<a href="ajouterreclamationC.php"><input type="button" value="Send Message"  /></a>-->
<!--<div class="form-group mt-4 mb-0"><a class="btn btn-primary btn-block"  href="ajouterreclamationC.php">Send Message</a></div>-->
<div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" >Send Message</button></div>


                            <table id="dataTable" width="100%" cellspacing="0" border="3" align="center">
                                        <thead>
                                            <tr>
                                                
                                                <th>id  </th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Sujet</th>
                                                <th>Message</th>
                                                <th>Modifier Reclamation</th>

                                            </tr>
                                        </thead>
                                        <tfoot>
                                                
                                                <th>id</th>
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Sujet</th>
                                                <th>Message</th>
                                                <th>Modifier Reclamation</th>

                                        </tfoot>
                                        <tbody>
                                             <?PHP

                                                foreach($listereclamation as $row){


                                                ?>
                                            <tr>
                                                <td><?php echo $row['id'] ;?></td>

                                                
                                                <td><?php echo $row['nom']; ?></td>
                                                <td><?php echo $row['email'] ;?></td>
                                                <td><?php echo $row['sujet'] ;?></td>
                                                <td><?php echo $row['message'];?></td>
                                                
                                                <td> 
                                                    <form method="POST" action="modifierreclamation.php">
                                                    <button  class="btn">Modifier
                                                   </button>
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['id']; ?>" name="id">
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['nom']; ?>" name="nom">
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['email']; ?>" name="email">
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['sujet']; ?>" name="sujet">
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['message']; ?>" name="message"></form>
                                                </td>

                                            </tr>
                                        </tbody>
                                    
                                        <?PHP }?>

                                    </table>    





</form>
 <div id="js-contact-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>  
</div>
</div>
</div>
</div>
</section>


<div id="map" data-latitude="40.6700" data-longitude="-73.9400"></div>

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
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="790a0c0909160b0d390b1c0a0d180c0b18170d571a1614">[email&#160;protected]</a></p>
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
<script src="js/vendor/mc/jquery.ketchup.all.min.js"></script>
<script src="js/vendor/mc/main.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script src="js/vendor/map.js"></script>

<script src="js/vendor/validate.js"></script>
<script src="js/contact.js"></script>

<script src="js/main.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/contact.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:16:04 GMT -->
</html>