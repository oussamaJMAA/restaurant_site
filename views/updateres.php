<?PHP
	include "../controller/reservationC.php";

	$resC=new resC();
	
	if (isset($_POST["id"])){
		$resC->update($_POST["id"],$_POST["dater"],$_POST["time"],$_POST["guests"],$_POST["phone"],$_POST["email"]);
		header('Location:consulter_res.php');
	}

?>