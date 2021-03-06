

<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Admin</title>
        <link href="cssB/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/cssB/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/jsB/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">Yummy Food!</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0" method="POST" action="recherche_com.php">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." name="search" aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button" name="btn-search"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>


            <?php
if(isset($_POST['btn-search'])&& isset($_POST['search'])){
    header("Location:recherche_com.php");
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
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Commandes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="tables.php">Dashboard</a></li>
                            <li class="breadcrumb-item active">Commandes</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-body">
                               Yummy Food DataBase!
                               
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                           
                                            <th> ID CIENT</th>
                                                <th>CIENT</th>
                                                <th> PLAT </th>
                                                <th>QUANTITE </th>
                                                
                                                
                                                <th>DATE</th>
                                                <th>PRIX PLAT</th>
                                                <th>PHONE</th>
                                                <th>ADRESSE</th>
                                                <th>PRIX COMMANDE</th>
                                           
                                                <th> DELETE</th>
                                                <th> PRINT </th>
				                                
                                            </tr>
                                        </thead>
</tbody>
                               <?php
                                   include_once "../model/commandes.php";
                                   include "../controller/commandesC.php";
                                  
                                    $com=new commandesC();
                                  
                                    $liste=$com->recherche_com($_POST['search']);
                                 
                                    foreach($liste as $com){
                               ?>




                                    <tr>
                                    <td> <?php echo $com["idclient"] ?></td>
                                
                                
                                
                                
                                 <?php
 $u=new commandesC();
                                  
 $listeu=$u->afficher_utilisateur_id($com['idclient']);

 foreach($listeu as $u){

?>
 

                                    <td> <?php echo $u["nom"].' '.$u["prenom"] ; ?></td>



                                 


                    <?php


$PlatC=new commandesC();
$idp=$com['idpl'];
$listePlat=$PlatC->afficher_plat_id($idp);
foreach($listePlat as $row)
{


?>
<td> <img src="z-front/img/menu/1/<?php echo $row['image']; ?>" width="250">  </td>




<td> <?php echo $com['quantite']; ?>
</td>
<td> <?php echo $com['date']; ?>
</td>
<td> <?php echo $row['prix'].'DT'; ?>
</td>
<td> <?php echo $com['phone']; ?>
</td>
<td> <?php echo $com['location']; ?>
</td>


<?php

$bb=new commandesC();
$result=$bb->somme_commandes($com["idclient"]);

?>



<td> 
<?php echo $result.'DT' ?>
</td>




<td>
<form method="POST" action="supprimer_c.php">
						<input type="submit" name="Delete" value="Delete" >
				
                        <input type="hidden" value=<?PHP echo $com['idcommande']; ?> name="idcommande">
                        <input type="hidden" value=<?PHP echo $com['date']; ?> name="date">
						</form>
					</td>

<td>
<form method="POST" action="printfact.php">
						<input type="submit" name="print" value="IMPRIMER">

     <input type="hidden" value=<?PHP echo $com['idclient']; ?> name="idclient">
                        
                        <input type="hidden" value=<?PHP echo $com['idpl']; ?> name="idplat">
                        <input type="hidden" value=<?PHP echo $com['location']; ?> name="adresse">
                        <input type="hidden" value=<?PHP echo $com['phone']; ?> name="phone">
                        <input type="hidden" value=<?PHP echo $com['date']; ?> name="datec">
                        <input type="hidden" value=<?PHP echo $com['idlc']; ?> name="idlc">
                        <input type="hidden" value=<?php echo $result ?> name="prix">
						</form>
					</td>
	

</tr>	

<?php 
                               }                                                                                                      
}
                                    }
                                
                            
?>

						
                                    </table>
                                </div>


                          
                                <form method="POST" action="tri_com.php">
<input type="submit" name="tri" value="Order By Date">
</form>

<?php
if(isset($_POST["tri"])){

    header("Location:tri_com.php");
}
?>



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
