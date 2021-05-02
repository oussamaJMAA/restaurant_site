<?PHP
	include "../controller/reservationC.php";

	$resC=new resC();
	
	if (isset($_POST["id"])){
		$resC->deleteB($_POST["id"]);
		header('Location:tables.php');
	}

?>