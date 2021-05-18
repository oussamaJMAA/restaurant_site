<head>
<title>Reset Password</title>
<link rel="stylesheet" href="css/style.css"><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/font-awesome/css/font-awesome.css">
<link rel="stylesheet" href="css/plugin.css">
<link rel="stylesheet" href="css/main.css">
</head>
<body>
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
<div class="reservation-form wow fadeInUp">
<form action="" method="POST">
<div class="row">
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="datepicker" style="color:white">Date</label>
 <input type="text" name="nom" class="form-control"  placeholder="Pick a date" style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label for="name">Enter your new password</label>
<input type="password" class="form-control"    name="password" placeholder="Enter your new password"  >

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label  style="color:white" for="timepicker">Time</label>
<input type="text" class="form-control"  name="prenom" placeholder="Pick a time"  style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label   style="color:white" for="email">Email Address</label>
<input type="email" class="form-control"   placeholder="Your Email ID"  style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label  style="display:none" for="guests">Guests</label>
<input class="form-control" type="number"  name="login" placeholder="How many of you?"  style="display:none">

</div>
</div>
<div class="col-md-4 col-sm-6">
<div class="form-group">
<label  style="color:white" for="phone">New Password </label>
<input type="text"   class="form-control"  placeholder="Enter your New Password" style="display:none" >

</div>
</div>
<div class="col-md-12 col-sm-12">
<div class="reservation-btn">
<button type="submit" name="submitpass"  class="btn btn-default btn-lg" >Save Changes</button>
<div id="js-reservation-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>




















  <!--
<center>
<div class="w3-container">
 
<div class="w3-panel w3-card-4 w3-blue" style="margin:5% 10% 0px 10%; padding:2% 0px 2% 0px;">
<header class="w3-container w3-purple">
  <h1>Password Recovery</h1>
</header>
<br/>


<form method="post" action="">
<label>Enter your new password:</label>
<input type="password" class="w3-input" style="color:black; width:20%;margin:0px 0px 10px 0px;" name="password">
<input class="w3-btn w3-red w3-round-large" type="submit" name="submitpass">
</form>
<footer class="w3-container w3-green">
  <h5>Powered by <a href="https://technopoints.co.in">YummyFood</a></h5>
</footer>
 ->
<?php
include "../controller/UtilisateurC.php";
$msg="";
 
if (isset($_POST['submitpass'])) {
  $id = intval(base64_decode($_GET["id"]));
  $password=$_POST['password'];
 
  try {
    $db= config::getConnexion();
    $pass1= password_hash($password, PASSWORD_DEFAULT);
    $stmt=$db->prepare("UPDATE utilisateur SET `password`=:upassword WHERE `id`=:uid");
    $stmt->execute(array(':upassword'=>$pass1, ':uid'=>$id));
    header("refresh:2; cnx.php");

	$msg = "password changed successfully!";
    $msgType = "success";
  
  
  } catch (Exception $ex) {
    echo $ex->getMessage();
	$msg = "Something went wrong. Plesae try again!";
    $msgType = "danger";
  }
} 
 
if ($msg <> "") { ?>
  <div style="margin-top:2%" class="alert alert-dismissable alert-<?php echo $msgType; ?>">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <center><b><?php echo $msg;?></b></center>
  </div>
  <?php } 
 
?>
</div>
</div>
</center>