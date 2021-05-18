
<?php
// On prolonge la session
include "../controller/UtilisateurC.php";
session_start();
// On teste si la variable de session existe et contient une valeur
if(empty($_SESSION['email']))
{
    // Si inexistante ou nulle, on redirige vers le formulaire de login
    header('Location: cnx.php');
 
   }
   else {
    try
         {
    $user_id = $_SESSION['email'];
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







<?PHP
	

	$utilisateurC=new UtilisateurC();
	$listeUsers=$utilisateurC->afficherUtilisateurs();

?>

<?php
 /*
$db = config::getConnexion();
$select_stmt=$db->prepare("SELECT * FROM recette");	
	$select_stmt->execute();
$r=$stmt->fetch(PDO::FETCH_ASSOC);

  		
$ab=$r['id_recette'];
$selecta=$db->prepare( "SELECT AVG(rate) AS average FROM rate_recette where id_recette = :uid " ); // sql select query
$selecta->execute(array(':uid'=>$ab));
$data = $selecta->fetchAll();




*/



$select_stmt=$db->prepare("SELECT (SELECT count(*) FROM utilisateur WHERE gender='Male' and role='admin') AS Male, (SELECT count(*) FROM utilisateur WHERE gender='Female' and role='admin') AS Female"); // sql select query
$select_stmt->execute();
  
  
$data = $select_stmt->fetchAll();

$male=$data[0]['Male'];
$female=$data[0]['Female'];
$select=$db->prepare("SELECT (SELECT count(*) FROM utilisateur WHERE gender='Male' and role='client') AS Male, (SELECT count(*) FROM utilisateur WHERE gender='Female' and role='client') AS Female"); // sql select query
$select->execute();
  
  
$data2 = $select->fetchAll();

$male2=$data2[0]['Male'];
$female2=$data2[0]['Female'];
 
 $dataPoints = array( 
     array("label"=>"Male", "y"=>$male2),
     array("label"=>"Female", "y"=>$female2)
   
 );
 $dataPoints2 = array( 
    array("label"=>"Male", "y"=>$male),
    array("label"=>"Female", "y"=>$female)
  
);
 ?>





<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        <link href="cssB/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/cssB/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/jsB/all.min.js" crossorigin="anonymous"></script>
    </head>
  
 <style>

.del{
    position:relative ; 
    top:50%;
    left:45%;
    
}
.hi{
    position:relative ; 
    top:50%;
    left:25%;  
    float:left;
}

.hi2{

    position:relative ; 
    top:50%;
    left:25;  
    float:left; 
}



button{
  background: #ffffff;
  border: solid 1px #e6e6e6;
  border-radius: 2px;
  display: inline-block;
  height: 100px;
  line-height: 100px;
  margin: 5px;
  position: relative;
  text-align: center;
  vertical-align: middle;
  width: 100px;
}

button span {
  background: #f2594b;
  border-radius: 4px;
  color: #ffffff;
  display: inline-block;
  font-size: 11px;
  font-weight: 700;
  line-height: normal;
  padding: 5px 10px;
  position: relative;
  text-transform: uppercase;
  z-index: 1;
}

button span:last-child {
  margin-left: -20px;
}

button:before,
button:after {
  background: #ffffff;
  border: solid 3px #9fb4cc;
  border-radius: 4px;
  content: '';
  display: block;
  height: 35px;
  left: 50%;
  margin: -17px 0 0 -12px;
  position: absolute;
  top: 50%;
  /*transform:translate(-50%,-50%);*/
  
  width: 25px;
}

button:hover:before,
button:hover:after {
  background: #e2e8f0;
}
/*a:before{transform:translate(-30%,-60%);}*/

button:before {
  margin: -23px 0 0 -5px;
}

button:hover {
  background: #e2e8f0;
  border-color: #9fb4cc;
}

button:active {
  background: #dae0e8;
  box-shadow: inset 0 2px 2px rgba(0, 0, 0, .25);
}

button span:first-child {
  display: none;
}

button:hover span:first-child {
  display: inline-block;
}

button:hover span:last-child {
  display: none;
}

button,
select,
textarea {
  font-family: "Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif;
}
</style>

<script>
 window.onload = function() {
    CanvasJS.addColorSet("colors",
                [//colorSet Array

                "#6699ff",
                "#ff33cc"
                               
                ]);
  
 var chart = new CanvasJS.Chart("chartContainer", {
     animationEnabled: true,
     colorSet: "colors",
     title: {
         text: "Number of female and male for users"
     },
     subtitles: [{
         text: "<?php echo date('l \t\h\e jS'); ?>"
     }],
     data: [{
         type: "pie",
         yValueFormatString: "#,##\"\"",
         indexLabel: "{label} ({y})",
         indexLabelPlacement: "inside",
         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart.render();
 
 var chart2 = new CanvasJS.Chart("chartContainer2", {
     animationEnabled: true,
     //backgroundColor: "#F5DEB3",
     colorSet: "colors",
     title: {
         text: "Number of female and male for Admins"
     },
     subtitles: [{
        text: "<?php echo date('l \t\h\e jS'); ?>"
     }],
     data: [{
        theme: "light2",
         type: "pie",
         yValueFormatString: "#,##\"\"",
        indexLabel: "{label} ({y})",
        indexLabelPlacement: "inside",
         
         dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
     }]
 });
 chart2.render();
 }
 </script>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Yummy Food!</a>
           
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST" action="recherche_client.php">
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                    
                  
                      
                    </div>
                </div>
            </form>

<?php
if(isset($_POST["btn-search"])&&isset($_POST["search"])){
    header("Location:recherche_client.php");
}

?>


            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#">Settings</a>
                        <a class="dropdown-item" href="#">Activity Log</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="login.html">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                         
                            <a class="nav-link" href="tables_res.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Reservations
                            </a>
                           
                            <a class="nav-link collapsed" href="tables.php" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Clients
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="tables_wishlist.php" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                WishList
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                                        Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="login.html">Login</a>
                                            <a class="nav-link" href="register.html">Register</a>
                                            <a class="nav-link" href="password.html">Forgot Password</a>
                                        </nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                                        Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                    </a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav">
                                            <a class="nav-link" href="401.html">401 Page</a>
                                            <a class="nav-link" href="404.html">404 Page</a>
                                            <a class="nav-link" href="500.html">500 Page</a>
                                        </nav>
                                    </div>
                                </nav>
                            </div>
                      
                            <a class="nav-link" href="tables_commandes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Commandes
                            </a>
                            <a class="nav-link" href="afficherPlat&PromotionB.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                               Plats et Promotions
                            </a>
                            <a class="nav-link" href="afficherCommentsB.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                              Blogs & Comments
                            </a>
                            
                            <a class="nav-link" href="ajout_admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                             Ajout Admin
                            </a>
                          
                            <a class="nav-link" href="recette.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Recettes
                            </a>
                     <br>
                     <br>
                     <br>
                     <br><br>
                     <br><br><br><br><br><br><br><br><br><br><br>
                  
                    <div class="sb-sidenav-footer">
              
                        <div class="small">Logged in as</div>
                       <?php echo $userRow['login'] ; ?>
                       <br>
                   
                    </div>
                    <a  style ="color:red" href="deconnexion.php" class="btn">disconnect ? </a>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tables</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active">Tables</li>
                        </ol>
                  
                        <div class="card mb-4">
                            <div class="card-body">
                            <!---afficher pdf-------------------------------------------------------->
                            <form method="POST" action="pdf.php">
<button class ="hi2" type="submit" name="go" ><span>Download</span><span>Afficher PDF</span></button>
</form>
                               <div id="chartContainer2" class="hi" style="height: 370px; width: 200px;"></div>
                               <div id="chartContainer" class="del" style="height: 370px; width: 200px;"></div>

                            </div>
                            
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                          
                                <form method="POST" action="tri_user.php">
<input type="submit" name="tri" value="Trier">
</form>

<?php
if(isset($_POST["tri"])){

    header("Location:tri_user.php");
}
?>


                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                            <tr>
                                            <th>ID</th>
				<th>Nom</th>
				<th>Prenom</th>
                <th>Gender</th>
				<th>Email</th>
				<th>Login</th>
			<th>Password</th>
            <th>Photo</th>
            <th>Delete</th>
                                            </tr>
                                        </thead>
</tbody>  <?PHP
				foreach($listeUsers as $user){
			?>
				<tr>
					<td><?PHP echo $user['id']; ?></td>
					<td><?PHP echo $user['nom']; ?></td>
					<td><?PHP echo $user['prenom']; ?></td>
                    <td><?PHP echo $user['gender'];?></td>
					<td><?PHP echo $user['email']; ?></td>
					<td><?PHP echo $user['login']; ?></td>
					<td><?PHP echo $user['password']; ?></td>
                    <td> <?PHP echo '<p><img src="'.$user['location'].'" onerror="this.onerror=null; this.src="img/default.png""  width="32px" height="32px"></p>'; ?></td>
					<td>
						<form method="POST" action="supprimerUtilisateur.php">
						<input type="submit" name="supprimer" value="supprimer">
						<input type="hidden" value=<?PHP echo $user['id']; ?> name="id">
						</form>
					</td>
				</tr>
			<?PHP
				}
			?>

						
                                    </table>
                                </div>


                    


                            </div>
                        </div>
                     
                    </div>
             
                </main>
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; WeDon'tByte</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/jsB/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="jsB/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/jsB/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/jsB/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assetsB/demo/datatables-demo.js"></script>
    </body>
</html>
