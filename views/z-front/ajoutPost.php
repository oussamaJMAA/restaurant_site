<?php
include_once "../../controller/formC.php";
include_once "../../controller/userC.php";
require_once '../../PHPMailer-5.2-stable/PHPMailerAutoload.php';
    $error = "";
    
    session_start();
    // create form
    $form = null;
    // create an instance of the controller
    $FormC = new FormC();
    if ( isset($_POST["titre"]) && isset($_POST["contenu"]) && isset($_POST["image"]) ) 
    {
        if ( !empty($_POST["titre"]) && !empty($_POST["contenu"]) && !empty($_POST["image"]) ) 
        {
        $form = new form( $_POST['titre'],$_POST['image'],$_POST['contenu'],0,$_SESSION['id']);
            $FormC->ajouterform($form);
            header('Location:afficherStatut.php');
        
        $UserC=new UserC();
        $listeusers=$UserC->afficher_mail_user();


        foreach ($listeusers as $row) 
        {
           
            echo $row['mail'];
 


$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'nasreddine.elmadhkour@esprit.tn';                 // SMTP username
$mail->Password = '00021457997';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('nasreddine.elmadhkour@esprit.tn', 'Restaurent');
$mail->addAddress($row['mail'], 'Joe User');     // Add a recipient

$mail->Subject = 'Resto Notification';
$mail->Body    = '<h1>New Post <h1>';
$mail->AltBody = 'new.post now';

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

    
?>