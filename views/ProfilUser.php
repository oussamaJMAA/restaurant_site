<?php
// On prolonge la session
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:14:45 GMT -->
<head>
<meta charset="utf-8">
<title>YummyFood</title>
<meta name="author" content="Surjith S M">

<meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
<meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

<script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script><link rel="shortcut icon" href="img/icon.png">

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
<!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
       
        <![endif]-->

<style>
.sp{
    margin-top:13px;
}
</style>
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window,
        document, 'script', '../../../connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1530003103982991');
    fbq('track', "PageView");
    </script>
<noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1530003103982991&amp;ev=PageView&amp;noscript=1" /></noscript>

</head>
<body>
<!--[if lt IE 8]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->



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
<!--- index2 normalment -->
<img src="img/nav-logo11.png" alt="nav-logo">
</a>

</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="index-2.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Home</a>

</li>
<li>
<a href="test3.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Menu</a>
<ul class="dropdown-menu">

</ul>
</li>
<li>
<a href="ajouter_res.php" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservation</span></a>
<ul class="dropdown-menu">

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
<li><a href="contact.html">Contact</a></li>
<li class="dropdown">
<a href="deconnexion.php"  ><span class="glyphicon glyphicon-log-out"></span></a>

</li>
<li class="dropdown">
<a href="test2.php"  > <span class="glyphicon glyphicon-cog"></span></a>

</li>
<li><img   id="current_photo" style ="margin-top:13px" src="<?php echo $_SESSION['location'] ?>"  onerror="this.onerror=null; this.src='img/default.png'" class="img-rounded" width="32x" height="32px" /></li>
<li><a href="#"><?php echo $_SESSION['login']; ?></a></li>
<!--
<button><a href="deconnexion.php">Déconnecter</a></button>
<button><a href="test2.php">Account settings</a></button> -->
</ul>

</div>

</div>
</nav>

<section class="home">

<div class="tittle-block">
<div class="logo">
<a href="index-2.html">
<img src="img/logo2.png" alt="logo">
</a>
</div>

<h1>DELICIOUS Food</h1>
<h2>Welcome <?php echo $_SESSION['prenom'];?> to YummyFood !</h2>
</div>
<div class="scroll-down hidden-xs">
<a href="#about">
<img src="img/arrow-down.png" alt="down-arrow">
</a>
</div>
</section>

<section class="about" id="about">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1>the restaurant<small>A little about us and a breif history of how we started.</small></h1>
</div>
</div>
</div>
<div class="row wow fadeInUp">
<div class="col-md-4">
<div class="container-fluid">
<div class="row">
<div class="col-xs-12 hidden-sm about-photo">
<div class="image-thumb">
<img src="img/thumb1.png" data-mfp-src="img/fullImages/pic1.jpg" class="img-responsive" alt="logo">
</div>
</div>
</div>
<div class="row">
<div class="col-sm-6 about-photo hidden-xs">
<img src="img/thumb2.png" data-mfp-src="img/fullImages/pic2.jpg" class="img-responsive" alt="logo">
</div>
<div class="col-sm-6 about-photo hidden-xs">
<img src="img/thumb3.png" data-mfp-src="img/fullImages/pic3.jpg" class="img-responsive" alt="logo">
</div>
</div>
</div>
</div>
<div class="col-md-8">
<p>
Cras ut viverra eros. Phasellus sollicitudin sapien id luctus tempor. Sed hend rerit inter dum sagittis. Donec nunc lacus, dapibus nec interdum eget, ultrices eget justo. Nam purus lacus, efficitur eget laoreet sed, finibus nec neque. Cras eget enim in diam dapibus sagittis. In massa est, dignissim in libero ac, fringilla ornare mi. Etiam interdum ligula purus.
</p>
<br>
<p>
Ultrices eget justo. Nam purus lacus, efficitur eget laoreet sed, finibus nec neque. Cras eget enim in diam dapibus sagittis. In massa est, dignissim in libero ac, fringilla ornare.
</p>
<img src="img/signature.png" alt="signature">
</div>
</div>
</div>
</section>

<section class="special">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1 class="white">today's specials<small>A little about us and a breif history of how we started.</small></h1>
</div>
</div>
</div>
<div class="row wow fadeInUp">
<div class="col-md-offset-1 col-md-10">
<div class="flexslider special-slider">
<ul class="slides">
<li>
<div class="slider-img">
<img src="img/thumb4.png" alt="" />
</div>
<div class="slider-content">
<div class="page-header">
<h1>1 Pancake with Caramel<small>If you are a fan of caramel cake, then you'll love our Pancake with caramel icecream. It's not thick, but very tasty.</small></h1>
</div>
<p>Ultrices In massa est, dignissim in libero ac, fringilla ornare mi.Ultrices eget justo. Nam purus lacus, efficitur eget laoreet sed, finibus nec neque. Cras eget enim in diam dapibus sagittis. accumsan, habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
<a class="btn btn-default" href="index-2.html" role="button">Order now</a>
<a class="btn btn-secondary" href="index-2.html" role="button">Add to cart</a>
</div>
</li>
<li>
<div class="slider-img">
<img src="img/thumb4.png" alt="" />
</div>
<div class="slider-content">
<div class="page-header">
<h1>2 Pancake with Caramel<small>If you are a fan of caramel cake, then you'll love our Pancake with caramel icecream. It's not thick, but very tasty.</small></h1>
</div>
<p>Ultrices In massa est, dignissim in libero ac, fringilla ornare mi.Ultrices eget justo. Nam purus lacus, efficitur eget laoreet sed, finibus nec neque. Cras eget enim in diam dapibus sagittis. accumsan, habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
<a class="btn btn-default" href="index-2.html" role="button">Order now</a>
<a class="btn btn-secondary" href="index-2.html" role="button">Add to cart</a>
</div>
</li>
<li>
<div class="slider-img">
<img src="img/thumb4.png" alt="" />
</div>
<div class="slider-content">
<div class="page-header">
<h1>3 Pancake with Caramel<small>If you are a fan of caramel cake, then you'll love our Pancake with caramel icecream. It's not thick, but very tasty.</small></h1>
</div>
<p>Ultrices In massa est, dignissim in libero ac, fringilla ornare mi.Ultrices eget justo. Nam purus lacus, efficitur eget laoreet sed, finibus nec neque. Cras eget enim in diam dapibus sagittis. accumsan, habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.</p>
<a class="btn btn-default" href="index-2.html" role="button">Order now</a>
<a class="btn btn-secondary" href="index-2.html" role="button">Add to cart</a>
</div>
</li>
</ul>
<div class="direction-nav hidden-sm">
<div class="next">
<a><img src="img/right-arrow.png" alt="" /></a>
</div>
<div class="prev">
<a><img src="img/left-arrow.png" alt="" /></a>
</div>
 </div>
</div>
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
<form action="https://demo.web3canvas.com/themeforest/tomato/php/reservation.php" id="reservationform" method="POST">
<div class="row">
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="datepicker">Date</label>
<input type="text" name="date" class="form-control" id="datepicker" placeholder="Pick a date" title="Please choose a date" required>
<i class="fa fa-calendar-o"></i>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="name">Your Name</label>
<input type="text" class="form-control" id="name" name="name" placeholder="Full Name" title="Your Full Name please" required>
<i class="fa fa-pencil-square-o"></i>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="timepicker">Time</label>
<input type="text" class="form-control" id="timepicker" name="time" placeholder="Pick a time" title="Choose Preferred Time" required>
<i class="fa fa-clock-o"></i>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="email">Email Address</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Your Email ID" title="Please enter your email id" required>
<i class="fa fa-envelope-o"></i>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="guests">Guests</label>
<input class="form-control" type="number" id="guests" name="guests" placeholder="How many of you?" title="Please enter number of guests" required>
<i class="fa fa-user"></i>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="phone">Phone Number</label>
<input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" title="Please enter your phone number" required>
<i class="fa fa-phone"></i>
</div>
</div>
 <div class="col-md-12 col-sm-12">
<div class="reservation-btn">
<button type="submit" class="btn btn-default btn-lg" id="js-reservation-btn">Make Reservation</button>
<div id="js-reservation-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>
</div>
</div>
</div>
</form>
</div>
<div class="reservation-footer">
<p>You can also call: <strong>+1 224 6787 004</strong> to make a reservation.</p>
<span></span>
</div>
</div>
</section>

<section class="features">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1 class="white">Our features<small>Little things make us best in town</small></h1>
</div>
</div>
</div>
<div class="row wow fadeInUp">
<div class="col-md-4 col-sm-6">
<div class="features-tile">
<div class="features-img">
<img src="img/thumb5.png" alt="" />
</div>
<div class="features-content">
<div class="page-header">
<h1>Serving with love</h1>
</div>
<p>Aenean suscipit vehicula purus quis iaculis. Aliquam nec leo nisi. Nam urna arcu, maximus eget ex nec, consequat pellentesque enim. Aliquam tempor fringilla odio, vel ullamcorper turpis varius eu.</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-tile">
<div class="features-img">
<img src="img/thumb6.png" alt="" />
</div>
<div class="features-content">
<div class="page-header">
<h1>Serving with love</h1>
</div>
<p>Aenean suscipit vehicula purus quis iaculis. Aliquam nec leo nisi. Nam urna arcu, maximus eget ex nec, consequat pellentesque enim. Aliquam tempor fringilla odio, vel ullamcorper turpis varius eu.</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="features-tile">
<div class="features-img">
<img src="img/thumb7.png" alt="" />
</div>
<div class="features-content">
<div class="page-header">
<h1>Serving with love</h1>
</div>
<p>Aenean suscipit vehicula purus quis iaculis. Aliquam nec leo nisi. Nam urna arcu, maximus eget ex nec, consequat pellentesque enim. Aliquam tempor fringilla odio, vel ullamcorper turpis varius eu.</p>
</div>
</div>
</div>
<div class="col-md-4 col-sm-6 visible-sm">
<div class="features-tile">
<div class="features-img">
<img src="img/thumb5.png" alt="" />
</div>
<div class="features-content">
<div class="page-header">
<h1>Serving with love</h1>
</div>
<p>Aenean suscipit vehicula purus quis iaculis. Aliquam nec leo nisi. Nam urna arcu, maximus eget ex nec, consequat pellentesque enim. Aliquam tempor fringilla odio, vel ullamcorper turpis varius eu.</p>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="menu">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1>Our menu<small>These fine folks trusted the award winning restaurant.</small></h1>
</div>
</div>
</div>
<div class="food-menu wow fadeInUp">
<div class="row">
<div class="col-md-12">
<div class="menu-tags">
<span data-filter="*" class="tagsort-active">All</span>
<span data-filter=".starter">starters</span>
<span data-filter=".breakfast">breakfast</span>
<span data-filter=".lunch">lunch</span>
<span data-filter=".dinner">dinner</span>
<span data-filter=".desserts">desserts</span>
</div>
</div>
</div>
<div class="row menu-items">
<div class="menu-item col-sm-6 col-xs-12 starter dinner desserts">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 starter">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 breakfast desserts starter">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 breakfast">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 lunch starter breakfast">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 lunch">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 dinner breakfast lunch">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 dinner">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 desserts lunch dinner">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
<div class="menu-item col-sm-6 col-xs-12 desserts">
<div class="clearfix menu-wrapper">
<h4>English asparagus</h4>
<span class="price">$14.95</span>
<div class="dotted-bg"></div>
</div>
<p>pellentesque enim. Aliquam tempor</p>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="menu-btn">
<a class="btn btn-default btn-lg" href="menu_all.html" role="button">Explore our menu</a>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="trusted">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1>Trusted By<small>These fine folks trusted tha award winning restaurant</small></h1>
</div>
</div>
</div>
<div class="row wow fadeInUp">
 <div class="col-md-12">
<div class="trusted-sponsors">
<img src="img/sponsor/foodsquare.png" alt="sponsors">
<img src="img/sponsor/opentable.png" alt="sponsors">
<img src="img/sponsor/tripadvisor.png" alt="sponsors">
<img src="img/sponsor/zomato.png" alt="sponsors">
<img src="img/sponsor/foodsquare.png" alt="sponsors">
<img src="img/sponsor/opentable.png" alt="sponsors">
<img src="img/sponsor/tripadvisor.png" alt="sponsors">
<img src="img/sponsor/zomato.png" alt="sponsors">
</div>
</div>
</div>
</div>

<div class="trusted-quote">
<div class="container">
<div class="row">
<div class="col-md-offset-1 col-md-10">
<div class="trusted-slider">
<ul class="slides">
<li>
<img src="img/quote.png" alt="quote">
<p class="quote-body">The world’s a big, big stage for this notorious deli smack in the middle of the theatre district, infamously famous for its over-the-top corned beef and pastrami sandwiches, chopped liver, blintzes, celebrities, salami, smoked fish and New York’s finest cheesecake.</p>
<p class="quote-author">Anthony Reed, <span>New York</span></p>
</li>
<li>
<img src="img/quote.png" alt="quote">
<p class="quote-body">You might not find dragon meat on the menu, but you’ll find pretty much anything else that walks, swims or flies, cooked up in more ways than there are people in the Guangdong province. This Midtown mainstay has a 20-year history of delivering mouth-watering and Cantonese style chow.</p>
<p class="quote-author">Gemma Arterton, <span>Bay Area</span></p>
</li>
<li>
<img src="img/quote.png" alt="quote">
<p class="quote-body">This NYC historical landmark in the heart of the Theatre District has been serving up suds and down home pub food since 1892, surviving prohibition by renting the front of its then Rockefeller Center façade to Greek florists, while the Hurley brothers ran a speak-easy in back.</p>
<p class="quote-author">Zachary Burton, <span>Sanfransisco</span></p>
</li>
</ul>
</div>
</div>
</div>
</div>
</div>
</section>
<section class="instagram">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1>Instagram<small>We love posting photos of our coustomers having a good time</small></h1>
</div>
</div>
</div>
</div>


<div id="instafeed" data-username="instaphotosdemo" data-access-token="3401121086.ca9c5d8.49a154f2d6034846ae4e37962de804e8" data-client-id="a42e80c86661419b94a5ac01dc022221">
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
<p><i class="fa fa-map-marker"></i>Ariana, Ariana,2083 </p>
<p><i class="fa fa-phone"></i>Phone: +216-123-123-12</p>
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c9babcb9b9a6bbbd89bbacbabda8bcbba8a7bde7aaa6a4">[email&#160;protected]</a></p>
</div>
</div>
</div>
</div>

<div class="footer-copyrights">
<div class="container">
<div class="row">
<div class="col-md-12">
<p><i class="fa fa-copyright"></i> 2021.YummyFood.All rights reserved. Designed with <i class="fa fa-heart primary-color"></i> by WeDon'tByte</p>
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
<script src="js/vendor/validate.js"></script>
<script src="js/reservation.js"></script>

<script src="js/main.js"></script>
</body>

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/ by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:07 GMT -->
</html>
