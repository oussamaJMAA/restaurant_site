<?php

require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
//$mpdf->WriteHTML('<h1>Hello World!</h1>');

if(isset($_POST["paste"])){
    $mpdf->WriteHTML('<h3>La reclamation a été écrite par :</h3>');
    $mpdf->WriteHTML($_POST["email"]);

    $mpdf->WriteHTML('<h3>Le sujet de la reclamation est :</h3>');
    $mpdf->WriteHTML($_POST["sujet"]);

    $mpdf->WriteHTML('<h3>La reclamation est :</h3>');
    $mpdf->WriteHTML($_POST["message"]);
    
}

$mpdf->Output("MyPDF.pdf","I");
//$mpdf->Output("MyPDF.pdf",D);


?>
