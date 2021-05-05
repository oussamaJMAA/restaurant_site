
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
	require_once "dbconfig.php";
	$select_stmt=$db->prepare("SELECT * FROM menu");	
	$select_stmt->execute();
	while($row=$select_stmt->fetch(PDO::FETCH_ASSOC)){
	?>
	<div class="shop-products">
		<div class="col-md-4 col-sm-6">
            <div class="product-info">
			<a href="#"><img class="product-img" src="img/shop/<?php echo $row['image_plat']; ?>"></a>
		
            <div class="card-body">
				<h4 class="card-title text-primary"><?php echo $row['nom_plat']; ?> </h4>
                <div class="product-price"><?php echo $row['prix_plat']; ?></div>

      <div class="card-footer">
			
					<div class="shop-meta">


				<form method="POST" action="ajouter_card.php">
<!--<a href="shop_cart.php"  class="pull-left"><i class="fa fa-shopping-cart"></i> Add to cart</a>-->
<input type="submit" name="addtocart" value="Add to Cart" style="background-color: rgba(0,0,0,0); border-color:rgba(0,0,0,0);font-size:18px" class="pull-left"><i class="fa fa-heart-o  pull-left"></i>	
<input type="hidden" value=<?PHP echo $row['id_plat']; ?> name="id_plat">
<input type="hidden" value=<?PHP echo $row['nom_plat']; ?> name="nom_plat">
<input type="hidden" value=<?PHP echo $row['prix_plat']; ?> name="prix_plat">
<input type="hidden" value=<?PHP echo $row['image_plat']; ?> name="image_plat">
	</form>



<form method="POST" action="ajouter_wish.php">
<i class="fa fa-heart-o  pull-right"></i><input type="submit" name="addwishl" value="Wishlist" style="background-color: rgba(0,0,0,0); border-color:rgba(0,0,0,0);font-size:18px" class="pull-right">						
<!--<a href="Wishlist.php" id ="addItem" class="pull-right"><i class="fa fa-heart-o"></i> Wishlist</a>-->
<input type="hidden" value=<?PHP echo $row['id_plat']; ?> name="id_plat">
<input type="hidden" value=<?PHP echo $row['nom_plat']; ?> name="nom_plat">
<input type="hidden" value=<?PHP echo $row['prix_plat']; ?> name="prix_plat">
<input type="hidden" value=<?PHP echo $row['image_plat']; ?> name="image_plat">
</form>



            </div>
		
            </div>
			  
            </div>
        </div>
		</div>
	<?php
	}
	?>

</div></body>
</html>