<?php

require_once "dbconfig.php";
require_once "libs/fpdf.php" ;

$client = $_POST["idclient"];

$select_stmt=$db->prepare("SELECT * FROM utilisateur where id=:client ");	
$select_stmt->execute(array(
':client'=>$client

));
while($row=$select_stmt->fetch(PDO::FETCH_ASSOC))
{

$bb=$row["nom"];
$cc=$row['prenom'];

$plat =$_POST['idplat'];
$adresse =$_POST['adresse'];
$date =$_POST['datec'];
$prix =$_POST['prix'];
$phone=$_POST['phone'];

$pdf = new FPDF(); 
$pdf->AddPage();

$pdf->SetFont('courier','I',18);
$pdf->SetTextColor(255,0,0);
$pdf->Cell(0,10,'Facture De Commades :',0,true,'C');

$pdf->SetTextColor(0,0,0);
$pdf->SetFont('courier','I',18);

$x=10;
$y=110;
$width=25;
$height=25;
$pdf->Multicell(0,15,"CLIENT(E) : ".$bb." ".$cc."\nID PLAT : ".$plat."\nDESTINATION : ".$adresse."\nDATE : ".$date."\nPHONE : ".$phone."\nPRIX : ".$prix); 
$pdf->Image('logo.png', 95, $y, $width, $height);
$pdf->Output();

}


?>
