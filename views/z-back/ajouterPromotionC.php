<?php
include "../../controller/promotionC.php";
include_once "../../controller/UtilisateurC.php";
require_once '../../PHPMailer-5.2-stable/PHPMailerAutoload.php';

    $Date1= new DateTime($_POST['date_activation']);
    $Date2= new DateTime($_POST['date_expiration']);
    if($Date1>$Date2)
    {  
        echo "False";
         echo "<script type='text/javascript'>";
        echo "alert('Date activation obligatoire <  Date date_expiration');
        window.location.href='../z-back/afficherPlat&Promotion.php';";
        echo "</script>";
    }
    else
    {    
    $error = "";
    
    // create form
    $promotion = null;
    // create an instance of the controller
    $PromotionC = new PromotionC();
    echo $_POST["val_promo"];
    echo $_POST["date_activation"];
    echo $_POST["date_expiration"];
    echo $_POST["id_plat"];

    if ( isset($_POST["val_promo"]) && isset($_POST["date_activation"]) && isset($_POST["date_expiration"]) && isset($_POST["id_plat"]) ) 
        {
        if ( !empty($_POST["val_promo"]) && !empty($_POST["date_activation"]) && !empty($_POST["date_expiration"])  && !empty($_POST["id_plat"]) ) 
        {
        $promotion = new promotion( $_POST['val_promo'],$_POST['date_activation'],$_POST['date_expiration'],$_POST['id_plat']);

            $PromotionC->ajouterpromo($promotion);

            header('Location:afficherPlat&Promotion.php');

            $UtilisateurC=new UtilisateurC();
        $listeusers=$UtilisateurC->afficher_mail_user();


foreach ($listeusers as $row) 
{
           
    echo $row['email'];
    $mail = new PHPMailer;
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = '@esprit.tn';                 // SMTP username
    $mail->Password = '00';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('nasreddine.elmadhkour@esprit.tn', 'Restaurent');
    $mail->addAddress($row['email'], 'Joe User');     // Add a recipient

    $mail->Subject = 'Promotion Tomato';
    $mail->Body    = '<h2>Promo<h2>';
    $mail->AltBody = 'On a fait une nouvelle promition , on vous invite a consulter le site';

    if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
    echo 'Message has been sent';
    }
}
        }
        else
            $error = "Missing information";
    }

    }
?>