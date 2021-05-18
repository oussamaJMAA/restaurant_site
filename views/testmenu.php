
<?php

include_once "../model/reservation.php";
include "../controller/reservationC.php";


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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>



<div class="body">
<div class="main-wrapper">

<?php include_once 'header.php'; ?> 




<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Shop Listing</h2>
<p>Tomato is a delicious restaurant website template</p>
</div>
</div>
</div>
</section>

<section class="shop-content">
<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-1">
<div class="shop-grid">
<select>
<option>Default Sorting</option>
<option>Cakes</option>
<option>Breads</option>
<option>Fries</option>
<option>Pizza</option>
</select>
<div class="sg-list">
<a href="shop_left_sidebar.html"><i class="fa fa-th-large"></i></a>
<a href="shop_right_sidebar.html"><i class="fa fa-reorder"></i></a>
</div>
<span>Showing 1-9 of 80 Results</span>
</div>
<div class="row">
	<?php
$PlatC=new PlatC();
$listePlat=$PlatC->afficherlist_plat();
foreach($listePlat as $row)
{



	?>
	<div class="shop-products">
		<div class="col-md-4 col-sm-6">
            <div class="product-info">
			<a href="#"><img class="product-img" src="z-front/img/menu/1/<?php echo $row['image']; ?>"></a>
		
            <div class="card-body">
				<h4 class="card-title text-primary"><?php echo $row['nom']; ?> </h4>
                <div class="product-price"><?php echo $row['prix']; ?></div>

      <div class="card-footer">
			
					<div class="shop-meta">

 
				<form method="POST" action="ajouter_card.php">
<!--<a href="shop_cart.php"  class="pull-left"><i class="fa fa-shopping-cart"></i> Add to cart</a>-->
<input type="submit" name="addtocart" value="Add to Cart" style="background-color: rgba(0,0,0,0); border-color:rgba(0,0,0,0);font-size:18px" class="pull-left"><i class="fa fa-heart-o  pull-left"></i>	
<input type="hidden" value=<?PHP echo $row['id_plat']; ?> name="id_plat">
<input type="hidden" value=<?PHP echo $row['nom']; ?> name="nom_plat">
<input type="hidden" value=<?PHP echo $row['prix']; ?> name="prix_plat">
<input type="hidden" value=<?PHP echo $row['image']; ?> name="image_plat">
<input type="hidden" value=<?PHP echo $userRow['id']; ?> name="idclient">



	</form>



<form method="POST" action="ajouter_wish.php">
<i class="fa fa-heart-o  pull-right"></i><input type="submit" name="addwishl" value="Wishlist" style="background-color: rgba(0,0,0,0); border-color:rgba(0,0,0,0);font-size:18px" class="pull-right">						
<!--<a href="Wishlist.php" id ="addItem" class="pull-right"><i class="fa fa-heart-o"></i> Wishlist</a>-->
<input type="hidden" value=<?PHP echo $row['id_plat']; ?> name="id_plat">
<input type="hidden" value=<?PHP echo $row['nom']; ?> name="nom_plat">
<input type="hidden" value=<?PHP echo $row['prix']; ?> name="prix_plat">
<input type="hidden" value=<?PHP echo $row['image']; ?> name="image_plat">
</form>



            </div>
		
            </div>
			  
            </div>
        </div>
		</div>
	<?php

}
	?>
</div>

</div>
</div></body>
</html>