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
<title>Ajout Reservation</title>
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
</tr>











<?php

$res=new resC();
$a=$userRow['email'];
$liste=$res->consulter_res($a);
foreach($liste as $res){

?>

<tr>

<td> <?php echo $res['full_name']; ?>
</td>
<td> <?php echo $res['email']; ?>
</td>
<td> <?php echo $res['phone']; ?>
</td>
<td> <?php echo $res['guests']; ?>
</td>
<td> <?php echo $res['date']; ?>
</td>
<td> <?php echo $res['time']; ?>
</td>
</tr>
<?php } ?>
