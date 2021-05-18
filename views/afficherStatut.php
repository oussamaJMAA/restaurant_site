<?php 
include "../controller/formC.php";
include"../controller/commentsC.php";

 
 session_start();
 if (empty($_SESSION['id']))
 {
    echo "<script type='z-front/text/javascript'>";	
	echo "alert('Please Login First');window.location.href='cnx.php';";
	echo "</script>";
 }
 

$FormC=new FormC();
$listeForms=$FormC->afficherlist_form(); 
 


?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<title>YummyFood! Blog</title>
<meta name="author" content="Surjith S M">
<meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
<meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">
<script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script>
<link rel="shortcut icon" href="img/favicon.ico">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
</head>


<body>
<div class="preloder animated">
<div class="scoket">
<img src="img/preloader.svg" alt="" />
</div>
</div>
<div class="body">
<div class="main-wrapper">

<!--***********************************Header********************************************* -->
<?php include_once 'header.php'; ?> 


</div>
</div>

<section class="page_header">

<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase wow fadeInDown">Accueil</h2>
<p class="wow fadeInUp">YummyFood! is a delicious restaurant</p>
</div>
</div>
</div>
</section>

<div class="blog-content">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<hr>
<center>
<a href="ajouterStatut.php" class="btn btn-default" 
style="border-top-right-radius:10px;border-top-left-radius:10px;">Ajouter Post</a>
<a href="affichermesStatut.php" class="btn btn-default" 
style="border-top-right-radius:10px;border-top-left-radius:10px;">Mes Statuts</a>
</center>
<hr>

<?php
$CommentsC=new CommentsC();
foreach($listeForms as $row) 
{
	if($_SESSION['id']==$row['id_User'])
	{
		$myPost=1;
	}
	else
		$myPost=0;
 		
 	$nbrComments=$CommentsC->count($row['id']);	
    	


	
?>

<article class="wow fadeInUp" style="background-color:#ffeaea4f;" >
<div class="post-img">
<img src="img/blog/<?php echo $row['image'] ?>" class="img-responsive" alt="" style="border-radius: 30px;" />
<div class="post-format"><i class="fa fa-file-image-o"></i></div>
</div>
<div class="row">
<div class="col-md-7 col-sm-7">
<h4><a ><?php echo $row['titre'] ?></a></h4>
</div>
<div class="col-md-7 col-sm-7" style="margin-left: -20%;margin-top:-3%;text-align: right;">
<div class="post-date">
	<?php echo $row['likes'] ?>
	<a href="ajouterLikesC.php?id=<?php echo $row['id']; ?>" >
		<img src="img/like.png" style="height: 30px; margin-bottom: 5px;">Likes</a>|

	<?php echo $nbrComments; ?>
	<a href="afficherComments.php?id=<?php echo $row['id'];?>"><img src="img/commentaire.png" style="height: 20px; margin-bottom: 6px;">Comments</a><?php       
	

	if($myPost==1)
	{echo'
	 |<a href="modifierStatut.php?id='?><?php echo $row['id'];?><?php echo'"><img src="img/edit.png" style="width: 20px; margin-bottom:8px ;" > Edit</a>|
	 <a href="supprimerStatut.php?id='?><?php echo $row['id'];?><?php echo'"><img src="img/Remove.png" style="width: 20px; margin-bottom:6px ;" >Remove</a><br>';
	}?>
	<a style="color:#8e8e8e ;margin-left: 70%;"><?php echo $row['Date'] ?> </a>



</div>
</div>
</div>
<hr><p><?php echo $row['contenu'] ?></p>
</article>
<?php  } ?>














<div class="clearfix"></div>
<ul class="pagi_nation">
<li class="active"><a href="blog_fullwidth.html">1</a></li>
<li><a href="blog_fullwidth.html">2</a></li>
<li><a href="blog_fullwidth.html">3</a></li>
</ul>
</div>
</div>
</div>
</div>

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
<p class="footer-blog-date">24 Apr 2021</p>
</a>
</div>
<div class="footer-blog clearfix last">
<a href="blog_right_sidebar.html">
<img src="img/thumb9.png" class="img-responsive footer-photo" alt="blog photos">
<p class="footer-blog-text">Daily special foods that you will going to love</p>
<p class="footer-blog-date">24 Apr 2021</p>
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
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="74070104041b06003406110700150106151a005a171b19">[email&#160;protected]</a></p>
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/blog_fullwidth.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:55 GMT -->
</html>