<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
//$mpdf->WriteHTML('<h1>Hello World!</h1>');

if(isset($_POST["paste"])){
    $mpdf->WriteHTML('<h3>La reclamation a été écrite par :</h3>');
    $mpdf->WriteHTML('<h4>'.$_POST["email"].'</h4>');

    $mpdf->WriteHTML('<h3>Le sujet de la reclamation est :</h3>');
    $mpdf->WriteHTML('<h4>'.$_POST["sujet"].'</h4>');

    $mpdf->WriteHTML('<h3>La reclamation est :</h3>');
    $mpdf->WriteHTML('<h4>'.$_POST["message"].'</h4>');
    
}

$mpdf->Output("MyPDF.pdf","I");
//$mpdf->Output("MyPDF.pdf",D);


?>
