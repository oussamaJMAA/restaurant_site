<?php
include "../../Controller/carteC.php";
require_once 'mail.php';

    $error = "";
    
    // create form
    $carte = null;
    // create an instance of the controller
    $carteC = new carteC();
    

    echo "0";
    echo $_POST["prenom"];

    if ( !empty($_POST["prenom"]) && !empty($_POST["nom"]) && !empty($_POST["email"]) && !empty($_POST["password"]) 
    && !empty($_POST["totalpoints"]) ) 
    {
        echo "1";
    
    $carte = new carte( $_POST['prenom'],$_POST['nom'],$_POST['email'],$_POST['password'],$_POST['totalpoints']);
        $carteC->ajouterCarte($carte);

        header('Location:Table-Carte.php');
    }
    
    else
        $error = "Missing information";



$mail->setFrom('yummyfoodd3@gmail.com', 'Chebbi Meriem');
$mail->addAddress($_POST["email"]); 
$mail->Subject = 'Carte Fidélité';
$mail->Body    = 'Votre Carte Fidélité a été ajoutée avec succes <b>Bravo</b>';

$mail->send();


    
?>