
<html>
<body>
<table border="1" align="center">
<tr>
<th> ID </th>
<th>  FULL NAME</th>
<th> ADRESS </th>
<th> PHONE NUMBER </th>
<th> Guests </th>
<th> DATE </th>
<th>TIME</Th>
</tr>
<?php
include_once "../model/reservation.php";
include "../controller/reservationC.php";
$res=new resC();
$liste=$res->afficher();
foreach($liste as $res){

?>

<tr>
<td>  <?php echo $res['id']; ?></td>
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
