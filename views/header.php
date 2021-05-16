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
<img src="../img/nav-logo11.png" alt="nav-logo"></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="../ProfilUser.php">Home</a></li>
<li><a href="afficherPlat&Promotion.php">Menu</a></li>
<li><a href="../ajouter_res.php">Reservation</a></li>


 

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


<?php


if (empty($_SESSION['id']))
 	echo '<li><a href="signin.php">Login</a></li>';
else
	echo '<li><a href="logout.php">Logout</a></li>';
?>

<li><a href="contact.php"><?php echo $_SESSION['login'];?></a></li>
</ul>
</div>

</div>
</nav>

</header>

