<?PHP
	include "../controller/UtilisateurC.php";

	$userC=new userC();
	
	if (isset($_POST["email"])){
		$userC->delete($_POST["email"]);
		header('Location:test2.php');
	}

?>