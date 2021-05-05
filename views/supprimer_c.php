<?PHP
	include "../controller/commandeC.php";

	$comC=new commandeC();
	
	if (isset($_POST["datec"])){
		$comC->deleteB_lcommande($_POST["datec"]);
		header('Location:tables_commandes.php');
	}

?>