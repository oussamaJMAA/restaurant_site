<head>
<title>Forgot Password</title>
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
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
<h2 class="text-uppercase">Recover your Password</h2>
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
<h1>Password recovery...<small>Dont worry .a link will be sent to your email to recover your password.</small></h1>
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
<label for="name">Your Email Adress</label>
<input type="text" class="form-control"    name="email" placeholder="Enter your Email Adress"  >

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
<input type="text"  name="password" class="form-control"  placeholder="Enter your New Password" style="display:none" >

</div>
</div>
<div class="col-md-12 col-sm-12">
<div class="reservation-btn">
<button type="submit" name="submitmail"  class="btn btn-default btn-lg" >Save Changes</button>
<div id="js-reservation-result" data-success-msg="Form submitted successfully." data-error-msg="Oops. Something went wrong."></div>



























<!--

<center>
<div class="w3-container">
 
<div class="w3-panel w3-card-4 w3-red" style="margin:5% 10% 0px 10%; padding:2% 0px 0px 0px;">
<header class="w3-container w3-black">
  <h1>Password Recovery</h1>
</header>
<form class="login-page" method="post" action="">
<label>Enter your email below and we'll send you password reset link</label>
      <input type="email" name="email" class="w3-input" style="color:black; width:20%;margin:0px 0px 10px 0px;">
      <button style="margin-bottom:2%" class="w3-btn w3-yellow w3-round-large" name="submitmail" type="submit">Submit</button>
    </form>  
<footer class="w3-container w3-green">
  <h5>Powered by <a href="https://technopoints.co.in">YummyFood</a></h5>
</footer>
-->
	
	<!--php code for password reset-->
<?php
include "../controller/UtilisateurC.php";
 
$msg="";
if(isset($_POST['submitmail'])){
	require_once "phpmailer/class.phpmailer.php";
	$email=$_POST['email'];
/*
    $db = config::getConnexion();
			$select_stmt=$db->prepare(SELECT COUNT(*) AS count from utilisateur where email = :uemail"); //sql select query
			$select_stmt->execute(array(':uemail'=>$email));	//execute query with bind parameter
			$row=$select_stmt->fetch(PDO::FETCH_ASSOC);
*/

	//$sql = "SELECT COUNT(*) AS count from utilisateur where email = :email";
  try {
    $db = config::getConnexion();
    $stmt =$db->prepare("SELECT COUNT(*) AS count from utilisateur where email = :uemail"); 
	$stmt->execute(array(':uemail'=>$email));
      $result = $stmt->fetchAll();
	  
      if ($result[0]["count"] > 0) {
		  $fetchqry=$db->prepare("SELECT id from utilisateur WHERE email=:uemail");
		 $fetchqry->execute(array(':uemail'=>$email));
		  
		  while ($row = $fetchqry->fetch(PDO::FETCH_ASSOC))
		  {
			  $id= $row['id'];
		  }
			  $url="http://localhost/restaurant_site/views/reset-pass.php?id=" . base64_encode($id) . "";
			  
			  $message=" 
<html>
  <head>
    <meta name='viewport' content='width=device-width' />
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    <title>Simple Transactional Email</title>
    <style>
      /* -------------------------------------
          GLOBAL RESETS
      ------------------------------------- */
      img {
        border: none;
        -ms-interpolation-mode: bicubic;
        max-width: 100%; }
 
      body {
        background-color: #f6f6f6;
        font-family: sans-serif;
        -webkit-font-smoothing: antialiased;
        font-size: 14px;
        line-height: 1.4;
        margin: 0;
        padding: 0;
        -ms-text-size-adjust: 100%;
        -webkit-text-size-adjust: 100%; }
 
      table {
        border-collapse: separate;
        mso-table-lspace: 0pt;
        mso-table-rspace: 0pt;
        width: 100%; }
        table td {
          font-family: sans-serif;
          font-size: 14px;
          vertical-align: top; }
 
      /* -------------------------------------
          BODY & CONTAINER
      ------------------------------------- */
 
      .body {
        background-color: #f6f6f6;
        width: 100%; }
 
      /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */
      .container {
        display: block;
        Margin: 0 auto !important;
        /* makes it centered */
        max-width: 580px;
        padding: 10px;
        width: 580px; }
 
      /* This should also be a block element, so that it will fill 100% of the .container */
      .content {
        box-sizing: border-box;
        display: block;
        Margin: 0 auto;
        max-width: 580px;
        padding: 10px; }
 
      /* -------------------------------------
          HEADER, FOOTER, MAIN
      ------------------------------------- */
      .main {
        background: #ffffff;
        border-radius: 3px;
        width: 100%; }
 
      .wrapper {
        box-sizing: border-box;
        padding: 20px; }
 
      .content-block {
        padding-bottom: 10px;
        padding-top: 10px;
      }
 
      .footer {
        clear: both;
        Margin-top: 10px;
        text-align: center;
        width: 100%; }
        .footer td,
        .footer p,
        .footer span,
        .footer a {
          color: #999999;
          font-size: 12px;
          text-align: center; }
 
      /* -------------------------------------
          TYPOGRAPHY
      ------------------------------------- */
      h1,
      h2,
      h3,
      h4 {
        color: #000000;
        font-family: sans-serif;
        font-weight: 400;
        line-height: 1.4;
        margin: 0;
        Margin-bottom: 30px; }
 
      h1 {
        font-size: 35px;
        font-weight: 300;
        text-align: center;
        text-transform: capitalize; }
 
      p,
      ul,
      ol {
        font-family: sans-serif;
        font-size: 14px;
        font-weight: normal;
        margin: 0;
        Margin-bottom: 15px; }
        p li,
        ul li,
        ol li {
          list-style-position: inside;
          margin-left: 5px; }
 
      a {
        color: #3498db;
        text-decoration: underline; }
 
      /* -------------------------------------
          BUTTONS
      ------------------------------------- */
      .btn {
        box-sizing: border-box;
        width: 100%; }
        .btn > tbody > tr > td {
          padding-bottom: 15px; }
        .btn table {
          width: auto; }
        .btn table td {
          background-color: #ffffff;
          border-radius: 5px;
          text-align: center; }
        .btn a {
          background-color: #ffffff;
          border: solid 1px #3498db;
          border-radius: 5px;
          box-sizing: border-box;
          color: #3498db;
          cursor: pointer;
          display: inline-block;
          font-size: 14px;
          font-weight: bold;
          margin: 0;
          padding: 12px 25px;
          text-decoration: none;
          text-transform: capitalize; }
 
      .btn-primary table td {
        background-color: #3498db; }
 
      .btn-primary a {
        background-color: #3498db;
        border-color: #3498db;
        color: #ffffff; }
 
      /* -------------------------------------
          OTHER STYLES THAT MIGHT BE USEFUL
      ------------------------------------- */
      .last {
        margin-bottom: 0; }
 
      .first {
        margin-top: 0; }
 
      .align-center {
        text-align: center; }
 
      .align-right {
        text-align: right; }
 
      .align-left {
        text-align: left; }
 
      .clear {
        clear: both; }
 
      .mt0 {
        margin-top: 0; }
 
      .mb0 {
        margin-bottom: 0; }
 
      .preheader {
        color: transparent;
        display: none;
        height: 0;
        max-height: 0;
        max-width: 0;
        opacity: 0;
        overflow: hidden;
        mso-hide: all;
        visibility: hidden;
        width: 0; }
 
      .powered-by a {
        text-decoration: none; }
 
      hr {
        border: 0;
        border-bottom: 1px solid #f6f6f6;
        Margin: 20px 0; }
 
      /* -------------------------------------
          RESPONSIVE AND MOBILE FRIENDLY STYLES
      ------------------------------------- */
      @media only screen and (max-width: 620px) {
        table[class=body] h1 {
          font-size: 28px !important;
          margin-bottom: 10px !important; }
        table[class=body] p,
        table[class=body] ul,
        table[class=body] ol,
        table[class=body] td,
        table[class=body] span,
        table[class=body] a {
          font-size: 16px !important; }
        table[class=body] .wrapper,
        table[class=body] .article {
          padding: 10px !important; }
        table[class=body] .content {
          padding: 0 !important; }
        table[class=body] .container {
          padding: 0 !important;
          width: 100% !important; }
        table[class=body] .main {
          border-left-width: 0 !important;
          border-radius: 0 !important;
          border-right-width: 0 !important; }
        table[class=body] .btn table {
          width: 100% !important; }
        table[class=body] .btn a {
          width: 100% !important; }
        table[class=body] .img-responsive {
          height: auto !important;
          max-width: 100% !important;
          width: auto !important; }}
 
      /* -------------------------------------
          PRESERVE THESE STYLES IN THE HEAD
      ------------------------------------- */
      @media all {
        .ExternalClass {
          width: 100%; }
        .ExternalClass,
        .ExternalClass p,
        .ExternalClass span,
        .ExternalClass font,
        .ExternalClass td,
        .ExternalClass div {
          line-height: 100%; }
        .apple-link a {
          color: inherit !important;
          font-family: inherit !important;
          font-size: inherit !important;
          font-weight: inherit !important;
          line-height: inherit !important;
          text-decoration: none !important; }
        .btn-primary table td:hover {
          background-color: #34495e !important; }
        .btn-primary a:hover {
          background-color: #34495e !important;
          border-color: #34495e !important; } }
 
    </style>
  </head>
  <body>
    <table border='0' cellpadding='0' cellspacing='0' class='body' style='padding-top:2%'>
      <tr>
        <td>&nbsp;</td>
        <td class='container'>
          <div class='content'>
 
            <!-- START CENTERED WHITE CONTAINER -->
            <span class='preheader'>New Contact Form Entry.</span>
            <table class='main'>
 
			<tr>
                <td class='wrapper'>
                  <table border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td><center>
                        <p><img src='https://i.pinimg.com/originals/de/0a/ed/de0aedebc6d17dc16a269a13921f5492.jpg' width='20%' height='20%'></p>
						<p><h2>Password Reset Request</h2></p></center>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
			  
              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class='wrapper'>
                  <table border='0' cellpadding='0' cellspacing='0'>
                    <tr>
                      <td>
                        <p>Hi,</p>
                        <p>We have received a password reset request from the email address $email on Yummyfood.</p>
                        <p>Click on the button below to reset your password.</p>
						<p> <center><a href=".$url." target='_blank' style='width:80%; display: inline-block; color: #ffffff; background-color: #3498db; border: solid 1px #3498db; border-radius: 5px; box-sizing: border-box; cursor: pointer; text-decoration: none; font-size: 14px; font-weight: bold; margin: 0; padding: 12px 25px; text-transform: capitalize; border-color: #3498db;'>Forgot Password</a></center></p>
                        <p>Thanks for registring with us.</p>
						<p>Regards,<br/>Yummy Food</p>
						<p>If you have not performed this activity, then please ignore this email.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
 
            <!-- END MAIN CONTENT AREA -->
            </table>
 
            <!-- START FOOTER -->
            <div class='footer'>
              <table border='0' cellpadding='0' cellspacing='0'>
                <tr>
                  <td class='content-block'>
                    <span class='apple-link'>YummyFood, 27 XYZ Road, Pune, Maharashtra,India 445001</span>
					<br> This is mandatory service email sent to you by Technopoints.
                  </td>
                </tr>
                <tr>
                  <td class='content-block powered-by'>
                    Powered by <a href='https://technopoints.co.in'>YummyFood</a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->
 
          <!-- END CENTERED WHITE CONTAINER -->
          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>
  </body>
</html>";		 
		 // php mailer code starts
        $mail = new PHPMailer(true);
        $mail->IsSMTP(); // telling the class to use SMTP
 
        //$mail->SMTPDebug = 0;                     // enables SMTP debug information (for testing)
        $mail->SMTPAuth = true;                  // enable SMTP authentication
        $mail->SMTPSecure = "tls";                 // sets the prefix to the servier
        $mail->Host = 'smtp.gmail.com';  ;    //replace values with yours
        $mail->Port = 587;                   //replace values with yours
 
        $mail->Username = 'jemaaoussama64@gmail.com'; //replace values with yours
        $mail->Password = 'Sousou96566945';           //replace values with yours
 
        $mail->SetFrom('jemaaoussama64@gmail.com', 'oussama jemaa'); //replace values with yours
        $mail->AddAddress($email);
 
        $mail->Subject = trim("Forgot Password - Yummy Food");
        $mail->MsgHTML($message);
 
        try {
          $mail->send();
          $msg = "A password reset link has been sent to your email address.";
          $msgType = "success";
        } catch (Exception $ex) {
          $msg = $ex->getMessage();
		  $msg = "Mail could not be send. Please check your interent connection!";
          $msgType = "danger";
        }
		
      } else {
		  $msg = "Sorry! Your email is not registered with us.";
          $msgType = "danger";
		}
	}
	catch (Exception $ex) {
		//echo $ex->getMessage();
		$msg = "Unexpected error occured! please refresh the page.";
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
 
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="js/index.js"></script>
</body>
</html>