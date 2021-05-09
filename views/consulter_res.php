<?php
include_once "../model/reservation.php";
include "../controller/reservationC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['e']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   }
   else {
    try
         {
    $user_id = $_SESSION['e'];
    $db = config::getConnexion();
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE email=:user_id");
     $stmt->execute(array(":user_id"=>$user_id));
     $userRow=$stmt->fetch(PDO::FETCH_ASSOC);

         }
         catch(PDOException $e)
         {
             $e->getMessage();
         }		
     }
     ?>



<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from demo.web3canvas.com/themeforest/tomato/reservation.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Apr 2021 00:15:31 GMT -->
<head>
<meta charset="utf-8">
<title>Afficher Reservation</title>
<meta name="author" content="Surjith S M">

<meta name="description" content="Tomato is a Responsive HTML5 Template for Restaurants and food related services.">
<meta name="keywords" content="tomato, responsive, html5, restaurant, template, food, reservation">

<script src="../../cdn-cgi/apps/head/OkbNSnEV_PNHTKP2_EYPrFNyZ8Q.js"></script><link rel="shortcut icon" href="img/favicon.ico">

<meta name="viewport" content="width=device-width">

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
<!--[if lt IE 9]>
            <script src="js/vendor/html5-3.6-respond-1.4.2.min.js"></script>
        <![endif]-->
        
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/vendor/jquery-1.11.2.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/vendor/jquery.flexslider-min.js"></script>
<script src="js/vendor/spectragram.js"></script>
<script src="js/vendor/owl.carousel.min.js"></script>
<script src="js/vendor/velocity.min.js"></script>
<script src="js/vendor/velocity.ui.min.js"></script>
<script src="js/vendor/bootstrap-datepicker.min.js"></script>
<script src="js/vendor/bootstrap-clockpicker.min.js"></script>
<script src="js/vendor/jquery.magnific-popup.min.js"></script>
<script src="js/vendor/isotope.pkgd.min.js"></script>
<script src="js/vendor/slick.min.js"></script>
<script src="js/vendor/wow.min.js"></script>
<script src="js/animation.js"></script>
<script src="js/vendor/vegas/vegas.min.js"></script>
<script src="js/vendor/jquery.mb.YTPlayer.js"></script>
<script src="js/vendor/jquery.stellar.js"></script>
<script src="js/main.js"></script>
<script src="js/vendor/mc/jquery.ketchup.all.min.js"></script>
<script src="js/vendor/validate.js"></script>
<script src="js/reservation.js"></script>
<script src="js/vendor/mc/main.js"></script>
</head>




<style>

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgb(255, 196, 108);
}



.styled-table thead tr {
    background-color:#ffc46c;
    color: #ffc46c;
    text-align: left;
}



.styled-table th,
.styled-table td {
    padding: 12px 15px;
}


.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #ffc46c;
}



.styled-table tbody tr.active-row {
    font-weight: bold;
    color: black;
}




</style>


<body>

<div class="body">
<div class="main-wrapper">


<section class="page_header">
<div class="container">
<div class="row">
<div class="col-md-12 text-center">
<h2 class="text-uppercase">Reservation</h2>
<p>Welcome to YummyFood !</p>

</div>
</div>
</div>
</section>

<section class="reservation">
<div class="container">
<div class="row">
<div class="col-md-12">
<div class="page-header wow fadeInDown">
<h1>Reservations<small>Book a table online. Leads will reach in your email.</small></h1>

</div>
</div>
</div>



<table  class="styled-table">
<tr class="active-row">

<th>  FULL NAME</th>
<th> ADRESS </th>
<th> PHONE NUMBER </th>
<th> Guests </th>
<th> DATE </th>
<th>TIME</Th>
<th> UPDATE </th>
<th>DELETE</Th>
</tr>







<script>



function verif()                                 
         { 
       
     
     var phone = document.forms["form1"]["phone"];
              var adresse = document.forms["form1"]["email"];
       
        //Controle de saise pour le mail 

        var  re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        if(adresse.value.match(re)) {
  
  document.getElementById('errorname').innerHTML=""; 
          
           }
           else{
              document.getElementById('errorname').innerHTML="Votre Email est Invalide";  
           return false ;
           }

//Control de saisie de Tel


var t = /^\d{8}$/;
if (!(isNaN(phone)) || phone.value.match(t) ){

    document.getElementById('errorname').innerHTML=""; 
          
        }
        else{
           document.getElementById('errorname').innerHTML="Votre Telephone est Invalide";  
        return false ;
        }

     
            var date=document.forms["form1"]["dater"];
     var today=new Date();
     var dd=today.getDate();
     var mm=today.getMonth()+1;
     var yy=today.getFullYear();
var dispo= dd+'-'+mm+'-'+yy;
     if(date.value === ""){
    document.getElementById('errorname').innerHTML="Vous Devez Choisir Un date <br> Nous Somme Disponible a partir de " +dispo;
return false;
     }


var time=document.forms["form1"]["timepicker"];
if(time.value===""){
    document.getElementById('errorname').innerHTML="Vous Devez Choisir L heure de reservation detaillé <br> Nous somme Disponible Jusqu a 11:00pm";
    return false;
}
var guests=document.forms["form1"]["guests"];
if(guests.value > 10 || guests.value < 1 ){
    document.getElementById('errorname').innerHTML="Le Nombre Des Invites doit etre entre 1 et 10 ";
return false;

}


}
 


</script>
      <style>
         .error{
            color: #D8000C;
            background-color: #FFBABA;
            text-align:center;
            border-radius:25px;
            
         }
     
      </style>






<?php

$res=new resC();
$a=$userRow['email'];
$liste=$res->consulter_res($a);
foreach($liste as $res){

?>
<p class="error" id="errorname"></p>
<tr>

<form method="post" action="updateres.php" name="form1" onsubmit="return verif()">
<td> <input type="text" class="form-control" id="name" name="name" value="<?php print($userRow['login']) ?>" placeholder="Full Name" title="Your Full Name please" style="background-color:rgba(0,0,0,0);width:100px;border-color:rgba(0,0,0,0)"disabled>
</td>
<td> <input type="text" class="form-control" id="name" name="name" value="<?php print($userRow['email']) ?>" placeholder="Full Name" title="Your Full Name please" style="background-color:rgba(0,0,0,0);width:210px;border-color:rgba(0,0,0,0)"disabled>
</td>
<td><input type="text" class="form-control" id="phone" name="phone" placeholder="Enter your Phone Number" value="<?php print($res['phone']) ?>" title="Please enter your phone number" style="background-color:rgba(0,0,0,0);width:89px;border-color:rgba(0,0,0,0)" required>
</td>
<td> <input type="text" class="form-control" id="guests" name="guests" placeholder="Number of Guests" value="<?php print($res['guests']) ?>" title="Please enter your phone number" style="background-color:rgba(0,0,0,0);width:50px;border-color:rgba(0,0,0,0)" required>
</td>
<td>  <input type="date" name="dater" class="form-control"  placeholder="Pick a date" value="<?php print($res['date']) ?>" title="Please choose a date" min="<?php $Date=date('Y-m-d');echo $Date;?>" style="background-color:rgba(0,0,0,0);width:170px;border-color:rgba(0,0,0,0)" required>

</td>
<td><input type="text" class="form-control" id="timepicker" name="time" value="<?php print($res['time']) ?>" placeholder="Pick a time" title="Choose Preferred Time" style="background-color:rgba(0,0,0,0);width:80px;border-color:rgba(0,0,0,0)" required>
</td>
<td> <input type="submit" value="UPDATE" name="update">
<input type="hidden" value=<?PHP echo $res['id']; ?> name="id">
<input type="hidden" value=<?PHP echo $userRow['email']; ?> name="email">
</td>



</form>



<form method="post" action="supprimer_res.php">
<td> <input type="submit" value="DELETE" name="delete">
<input type="hidden" value=<?PHP echo $res['id']; ?> name="id">
</td>

</form>
</tr>

<?php } ?>
</body>
</html>