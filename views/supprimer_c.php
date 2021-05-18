<?PHP
	include "../controller/commandesC.php";

	$comC=new commandesC();
	
	if (isset($_POST["idcommande"])){
		$comC->delete_cB($_POST["idcommande"]);
		header('Location:tables_commandes.php');
	}

?>