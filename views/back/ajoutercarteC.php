<?php
include "../../controller/carteC.php";
require_once 'mail.php';

    $error = "";
    
    // create form
    $carte = null;
    // create an instance of the controller
    $carteC = new carteC();
    

    echo "0";
    echo $_POST["etat"];

    if ( !empty($_POST["etat"]) && !empty($_POST["date_creat"]) && !empty($_POST["date_expir"])  ) 
    {
        echo "1";
    
    $carte = new carte( $_POST['etat'],$_POST['date_creat'],$_POST['date_expir']);
        $carteC->ajouterCarte($carte);

        header('Location:Table-Carte.php');
    }
    
    else
        $error = "Missing information";

/*

$mail->setFrom('yummyfoodd3@gmail.com', 'Chebbi Meriem');
$mail->addAddress($_POST["email"]); 
$mail->Subject = 'Carte Fidélité';
$mail->Body    = 'Votre Carte Fidélité a été ajoutée avec succes <b>Bravo</b>';

$mail->send();

*/
    
?>