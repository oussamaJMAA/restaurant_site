<?php 

require_once 'mail.php';
$mail->setFrom('yummyfoodd3@gmail.com', 'Chebbi Meriem');
$mail->addAddress('chebbimeriem1@gmail.com'); 
$mail->Subject = 'Carte Fidélité';
$mail->Body    = 'Votre Carte Fidélité a été ajoutée avec succes <b>Bravo</b>';

$mail->send();

?>