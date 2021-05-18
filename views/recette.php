
<?php 
include "../controller/utilisateurC.php"; 


session_start();



$reC=new utilisateurC();
$liste=$reC->afficher_recette();
 

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Tables - SB Admin</title>
        <link href="cssB/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Admin</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
            </form>
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
                           
                            <a class="nav-link collapsed" href="tables.php"  aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Clients
                                
                            <a class="nav-link collapsed" href="tables_wishlist.php"  aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                WishList
                              
                      
                            <a class="nav-link" href="tables_commandes.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Commandes
                            </a>
                         
                     <br>
                     <br>
                     <br>
                     <br><br>
                     <br><br><br><br><br><br><br><br><br><br><br>
                  
                    <div class="sb-sidenav-footer">
              
                        <div class="small">Logged in as</div>
                       
                       <br>
                   
                    </div>
                    <a  style ="color:red" href="deconnexion.php" class="btn">disconnect ? </a>
                </nav>
            </div>
            


       

            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4 " style="text-align: center;" >Les recettes</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Table Plat
                                <a class=".btn btn-default" href="ajout_recette.php" style="margin-left: 35%;text-transform: uppercase; ">Ajouter une recette</a>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>                                                
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                 
                                        <tbody>
                                             <?PHP

                                                foreach($liste as $row){


                                                ?>
                                            <tr>
                                                <td><?php echo $row['id_recette'] ?></td>

                                                <td>
                                                    <img style="width: 150px;" src="img/recipie/<?php echo $row['image'] ?>">
                                                </td>

                                                <td><?php echo $row['nom'] ?></td>
                                                <td><?php echo $row['description'] ?></td>
                                                
                                    
                                                <td>
                                                    <form method="POST" action="modifier_recette.php">
                                                    <button  class="btn btn-primary">
                                                    <i class="fa fa-edit"></i></button>
                                                    <input type="hidden" value="<?PHP 
                                                    echo $_row['image']; ?>" name="image"  >

                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['id_recette']; ?>" name="id_recette">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['image']; ?>" name="image">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['nom']; ?>" name="nom">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['description']; ?>"name="description">
                                                  
                                                    </form>
                                                </td>
                                                <td> 
                                                    <form method="POST" action="supprimer_recette.php">
                                                    <button  class="btn btn-danger">
                                                    <i class="fa fa-trash"></i></button>
                                                    
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['id_recette']; ?>" name="id_recette"></form>
                                                </td>
                                            </tr>
                                            <?PHP }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>








                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
