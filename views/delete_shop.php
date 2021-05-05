<?PHP
	include "../controller/commandeC.php";

	$commandeC=new commandeC();
	
	if (isset($_POST["idplat"])){
		$commandeC->delete_commande($_POST["idplat"]);
		header('Location:shop_cart.php');
	}

?>