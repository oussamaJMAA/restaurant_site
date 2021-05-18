
<?php
include_once "../model/utilisateur.php";
include "../controller/UtilisateurC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['email']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   } 

   



  
?>

<?php

?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/recipe_detail-image.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:47 GMT -->
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
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">

</head>

<style>
        .star{
          color: goldenrod;
          font-size: 2.0rem;
          padding: 0px; /* space out the stars */
        }
        .star::before{
          content: '\2606';    /* star outline */
          cursor: pointer;
        }
        .star.rated::before{
          /* the style for a selected star */
          content: '\2605';  /* filled star */
        }
        
        .stars{
            counter-reset: rateme 0;   
            font-size: 2.0rem;
            font-weight: 900;
        }
        .star.rated{
            counter-increment: rateme 1;
        }
        .stars::after{
            content: counter(rateme) '/5';
        }
    </style>
<script>
        
        //initial setup
        document.addEventListener('DOMContentLoaded', function(){
            let stars = document.querySelectorAll('.star');
            stars.forEach(function(star){
                star.addEventListener('click', setRating); 
            });
            
            let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
            let target = stars[rating - 1];
            target.dispatchEvent(new MouseEvent('click'));
        });

        function setRating(ev){
            var  span = ev.currentTarget;
            var stars = document.querySelectorAll('.star');
            var match = false;
            var num = 0;
            stars.forEach(function(star, index){
                if(match){
                    star.classList.remove('rated');
                }else{
                    star.classList.add('rated');
                }
                //are we currently looking at the span that was clicked
                if(star === span){
                    match = true;
                    num = index + 1;
                }
            });
            document.querySelector('.stars').setAttribute('data-rating', num);
            
            document.getElementById("hi").value = num;
        
        }


    </script>


<body>





<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Recipies</h2>
<p>Tomato is a delicious restaurant website template</p>
</div>
</div>
</div>
</section>

<section class="recipie-single single-recipe">
<div class="container">
<div class="row">

<?php

	require_once "../config.php";
    if(isset($_POST['add'])){
    $id=$_POST['idr'];
  
	$db = config::getConnexion();
	$select_stmt=$db->prepare("SELECT * FROM recette where id_recette=:uid ");	
	$select_stmt->execute(array(':uid'=>$id));
 
            while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
            {
   ?>
<div class="col-md-6">
<div class="single-recipe-image">
<img class="img-responsive" src="img/recipie/<?php echo $row['image']; ?>" width="500px" />


</div>
<?php } }?>
<div class="clearfix"></div>

<h3>Direction</h3>
<br>
<ol class="directions-list">
<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exe rcitation ullamco laboris nisi ut aliquip exea commodo consequat.</li>
<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exe rcitation ullamco laboris nisi ut aliquip exea commodo consequat.</li>
<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exe rcitation ullamco laboris nisi ut aliquip exea commodo consequat.</li>
<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exe rcitation ullamco laboris nisi ut aliquip exea commodo consequat.</li>
<li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incid idunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exe rcitation ullamco laboris nisi ut aliquip exea commodo consequat.</li>
</ol>
<?php
$k=$_POST['idr'];
$db = config::getConnexion();
			$select_stmt=$db->prepare("SELECT * FROM recette where id_recette = :uid"); //sql select query
			$select_stmt->execute(array('uid' =>$k));	//execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
			?>
<form method="POST" action="rate.php" >
<h1>Rate the recipie</h1>
    <h1 class="stars" data-rating="0">
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
        <span class="star"></span>
    </h1>
<input type="hidden"  name="rate" id="hi" >
<input type="hidden"  name="idrec" value="<?php echo $row['id_recette']?>" >
<input type="hidden" name="id" value="<?php echo $_SESSION['id']?>">

<input type="submit" name="go_rate" value="submit rate">
</form>
</div>
<div class="col-md-6">
<h3>Pasta With Fried Lemons</h3>
<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet.</p>
<div class="ingredients">
<h4 class="title">Ingredients</h4>
<ul>
<li><i class="fa fa-check-square-o"></i>1/2 cup chopped red onions</li>
<li><i class="fa fa-check-square-o"></i>2 ounce lemon drops chupas chups bear</li>
<li><i class="fa fa-check-square-o"></i>3 pound seasme snaps powder gingerbread</li>
<li><i class="fa fa-check-square-o"></i>1/4 cup jujubes jelly chupa</li>
<li><i class="fa fa-check-square-o"></i>1/2 cup sour cream (optional)</li>
<li><i class="fa fa-check-square-o"></i>1 ounce suger plum pastry fruitcake</li>
<li><i class="fa fa-check-square-o"></i>1/4 cup jujubes jelly chupa</li>
</ul>
</div>
<h3 class="heading-bottom-line">Descriptions</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
<div class="nutrition-table">
<h3 class="heading-bottom-line">Nutrition</h3>
<div class="table-responsive">
<table>
<tbody>
<tr>
<th>Nutrient</th>
<th>DV</th>
<th>%DV</th>
</tr>
<tr>
<td>Protein</td>
<td>3.2 gr</td>
<td>5%<span class="progressbar"><span class="level-3"></span></span>
</td>
</tr>
<tr>
<td>Fat</td>
<td>6.5 gr</td>
<td>6%<span class="progressbar"><span class="level-6"></span></span>
</td>
</tr>
<tr>
<td>Carbohydrates</td>
<td>3.2 gr</td>
<td>9%<span class="progressbar"><span class="level-4"></span></span>
</td>
</tr>
<tr>
<td>Calories</td>
<td>4.8 gr</td>
<td>2%<span class="progressbar"><span class="level-8"></span></span>
</td>
</tr>
<tr>
<td>Cholesterol</td>
<td>102 kcal</td>
<td>8%<span class="progressbar"><span class="level-10"></span></span>
</td>
</tr>
</tbody>
 </table>
</div>
</div>
</div>
</div>
</div>
</section>

<section class="featured-recipie">
<div class="container">
<hr>
<h3>Featured Recipe</h3>
<div class="row">
<div class="featured-recipies">
<div class="fp-content">
<a href="recipe_detail-image.html"><img src="img/recipie/1/1.jpg" class="img-responsive" alt="" /></a>
<h4><a href="recipe_detail-image.html">Food Name</a></h4>
<div class="rc-ratings">
<span class="fa fa-star"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
</div>
</div>
<div class="fp-content">
<a href="recipe_detail-image.html"><img src="img/recipie/1/2.jpg" class="img-responsive" alt="" /></a>
<h4><a href="recipe_detail-image.html">Food Name</a></h4>
<div class="rc-ratings">
<span class="fa fa-star"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
</div>
</div>
<div class="fp-content">
<a href="recipe_detail-image.html"><img src="img/recipie/1/3.jpg" class="img-responsive" alt="" /></a>
<h4><a href="recipe_detail-image.html">Food Name</a></h4>
<div class="rc-ratings">
<span class="fa fa-star"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
</div>
</div>
<div class="fp-content">
<a href="recipe_detail-image.html"><img src="img/recipie/1/4.jpg" class="img-responsive" alt="" /></a>
<h4><a href="recipe_detail-image.html">Food Name</a></h4>
<div class="rc-ratings">
<span class="fa fa-star"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
</div>
</div>
<div class="fp-content">
<a href="recipe_detail-image.html"><img src="img/recipie/1/2.jpg" class="img-responsive" alt="" /></a>
<h4><a href="recipe_detail-image.html">Food Name</a></h4>
<div class="rc-ratings">
<span class="fa fa-star"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
</div>
</div>
<div class="fp-content">
<a href="recipe_detail-image.html"><img src="img/recipie/1/3.jpg" class="img-responsive" alt="" /></a>
<h4><a href="recipe_detail-image.html">Food Name</a></h4>
<div class="rc-ratings">
<span class="fa fa-star"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
<span class="fa fa-star active"></span>
</div>
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
<p><i class="fa fa-envelope-o"></i><a href="https://demo.web3canvas.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="f2818782829d8086b280978186938780939c86dc919d9f">[email&#160;protected]</a></p>
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

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/recipe_detail-image.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:48 GMT -->
</html>
