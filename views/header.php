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
<img src="img/nav-logo11.png" alt="nav-logo"></a>
</div>
<div id="navbar" class="navbar-collapse collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="ProfilUser.php">Home</a></li>
<li><a href="afficherPlat&Promotion.php">Menu</a></li>
<li><a href="ajouter_res.php">Reservation</a></li>


 

<li><a href="afficherStatut.php">Blog</a></li>
<li>
<a href="testmenu.php">Shop</a>

</li>
<li><a href="contact.php">Contact</a></li>


<?php


if (empty($_SESSION['id']))
 	echo '<li><a href="signin.php">Login</a></li>';
else
	echo '<li><a href="logout.php">Logout</a></li>';
?>

<li><img   id="current_photo" style ="margin-top:13px" src="<?php echo $userRow['location']; ?>"  onerror="this.onerror=null; this.src='img/default.png'" class="img-rounded" width="32x" height="32px" /></li>
<li><a href="contact.php"><?php echo $_SESSION['login'];?></a></li>
</ul>
</div>

</div>
</nav>

</header>

