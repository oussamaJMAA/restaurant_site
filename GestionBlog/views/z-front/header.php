<header>
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
<li><a href="afficherPlat&Promotion.php">Menu</a></li>
<li class="dropdown">
<a href="reservation.html" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reservation<span class="caret"></span></a>
<ul class="dropdown-menu">
<li><a href="reservation.html">Reservation</a></li>
<li><a href="reservation-ot.html">Reservation - Opentable</a></li>
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
</ul></li></ul></li>
<li><a href="afficherStatut.php">Blog</a></li>
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
<li><a href="contact.php">Contact</a></li>
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

<?php


if (empty($_SESSION['id']))
 	echo '<li><a href="signin.php">Login</a></li>';
else
	echo '<li><a href="logout.php">Logout</a></li>';
?>

</ul>
</div>

</div>
</nav>

</header>

