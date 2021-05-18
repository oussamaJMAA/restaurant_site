<?php 
include "../controller/formC.php";
include "../controller/commentsC.php";
 
session_start();
 

 //$LikesC=new LikesC();
 if (empty($_SESSION['id']))
 {
    echo "<script type='text/javascript'>";	
	echo "alert('Please Login First');window.location.href='signin.php';";
	echo "</script>";
 }

if(isset($_GET['id']))
{
	$FormC=new FormC();
	$listeForms=$FormC->recupererform($_GET['id']); 

	foreach($listeForms as $row) 
	{
	$titre=$row->titre;
	$contenu=$row->contenu;
	$image=$row->image;

	}

     $CommentsC=new CommentsC();
 	 $listeComments=$CommentsC->afficherlist_comments($_GET['id']); 

 	$nbrComments=0;

 	$nbrComments=$CommentsC->count($_GET['id']);


}

?>




<!DOCTYPE html>
<html lang="en">
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
</head>
<body>

<div class="preloder animated">
<div class="scoket">
<img src="z-front/img/preloader.svg" alt="" />
</div>
</div>
<div class="body">
<div class="main-wrapper">


<?php include 'header.php'; ?> <!--***************************Header***************************** -->




<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Blog Page</h2>
<p>Tomato is a delicious restaurant website template</p>
</div>
</div>
</div>
</section>

<div class="blog-content">
<div class="container">
<div class="row">
<div class="col-md-9">

	

<article>

<!-------------------------------AFFICHER comments----------------------------------- -->



<div class="post-img">
<img src="z-front/img/blog/<?php echo $image ?>" class="img-responsive" alt="" style="border-radius: 30px;"/>
<div class="post-format"><i class="fa fa-picture-o"></i></div>
</div>
<h4><a ><?php echo $titre ?></a></h4>
<hr>
<p><?php echo $contenu ?></p>
<hr>
<div class="comments-area">
<h3><?php echo $nbrComments ?> Comments</h3>



<ul class="commentlist">
<?php 

foreach($listeComments as $row) {  

  ?>
<li>
<div class="comment">
<span class="comment-image">
<img alt="avatar image" src="img/xtra/1.jpg" class="avatar" height="70" width="70">
</span>
<span class="comment-info d-text-c">
<span>5 days ago &nbsp; / &nbsp; <a class="comment-reply-link d-text-c" href="index-2.html">Reply</a>
</span><?php echo $row->nom." ". $row->prenom ?></span>

<p><?php echo $row->contenu ?></p>

<?php if ($_SESSION['id'] == $row->id_User ) { ?>

<form method="POST" action="supprimerComments.php?id=<?php echo $_GET['id'];?>">
	<button  class="btn btn-danger" style="margin-left: 85%;">
	<i class="fa fa-trash"></i></button>
    <input type="hidden" value="<?php echo $row->id; ?>" name="id_Comment">       
</form>

<form method="POST" action="modifierComments.php?id=<?php echo $_GET['id'];?>">
	<button  class="btn btn-warning" style="margin-left: 93%;margin-top:-61px;">
	<i class="fa fa-edit"></i></button>
    <input type="hidden" value="<?php echo $row->id; ?>" name="id_Comment">       
</form>

<?php } ?>


</div>
<?php } ?>






<hr>
<div id="respond" class="comment-respond">
<h3>Leave a Comment</h3>


<form method="post" id="ajouter-commentaire" class="comment-form" 
action="ajouterComments.php?id=<?php echo $_GET['id'];?>">

<div class="row">
<div class="col-md-6">

</div>
<div style="margin-left: 10%;margin-right: 10%;">
<textarea placeholder="Comment" name="contenu" id="contenu" style="border-top-left-radius: 30px; resize: none;"></textarea>
</div>
<div class="col-md-12">
<button class="btn btn-default btn-block">Post Comment</button>
</div>
</div>
</form>

<script src="js/ajouterCommente.js"></script>


 </div>
</div>
</article>




</div>
<aside class="col-md-3">
<div class="side-widget">
<form class="search">
<input type="text" placeholder="Search">
<button><i class="fa fa-chevron-right"></i></button>
</form>
</div>
<div class="side-widget">
<h5>Categories</h5>
<ul class="side-cat">
<li><i class="fa fa-chevron-right"></i> <a href="blog_single_image.html">Typesetting Industry</a></li>
<li><i class="fa fa-chevron-right"></i> <a href="blog_single_image.html">Lorem Ipsum is simply</a></li>
<li><i class="fa fa-chevron-right"></i> <a href="blog_single_image.html">Unknown printer took</a></li>
<li><i class="fa fa-chevron-right"></i> <a href="blog_single_image.html">Scrmbled it to make</a></li>
<li><i class="fa fa-chevron-right"></i> <a href="blog_single_image.html">Five centuries, but also</a></li>
</ul>
</div>
<div class="side-widget">
<h5>Recent Post</h5>
<ul class="recent-post">
<li>
<img src="z-front/img/blog/1/1.jpg" alt="" />
<div class="rp-info">
<a href="blog_single_image.html">Typesetting Industry</a>
<span>Oct-05-2015</span>
</div>
</li>
<li>
<img src="z-front/img/blog/1/2.jpg" alt="" />
<div class="rp-info">
<a href="blog_single_image.html">Post Heading Here</a>
<span>Oct-06-2015</span>
</div>
</li>
<li>
<img src="z-front/img/blog/1/3.jpg" alt="" />
<div class="rp-info">
<a href="blog_single_image.html">Post Heading Here</a>
<span>Oct-07-2015</span>
</div>
</li>
</ul>
</div>
</aside>
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
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="bac9cfcacad5c8cefac8dfc9cedbcfc8dbd4ce94d9d5d7">[email&#160;protected]</a></p>
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/blog_single_image.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:56 GMT -->
</html>
