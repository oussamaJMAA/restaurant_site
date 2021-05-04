<?php 
include "../../controller/promotionC.php"; 
include "../../controller/platC.php";

session_start();

$PromotionC=new PromotionC();
$listePlatPromo=$PromotionC->afficherlist_promo();

$PlatC=new PlatC();
$listePlat=$PlatC->afficherlist_plat();
 

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
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Admin</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form method="post" action="rechercherPlat.php" class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" id="recherche" name="recherche" />
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button"><i class="fas fa-search"

                            ></i></button>
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
                        <a class="dropdown-item" href="../z-front/logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Interface</div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Layouts
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="layout-static.html">Static Navigation</a>
                                    <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                                </nav>
                            </div>
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
                                <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
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
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts
                            </a>
                            <a class="nav-link" href="tables.html">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables
                            </a>
                            <a class="nav-link" href="">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Consulter Menu
                            </a>
                            <a class="nav-link" href="Table-Blog.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Consulter Blog
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4 " style="text-align: center;" >Gestion Plat</h1>


                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Table Plat
                                <a class=".btn btn-default" href="ajouterPlat.php" style="margin-left: 35%;text-transform: uppercase; ">Ajouter Plat</a>
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
                                                <th>Prix</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Nom</th>
                                                <th>Description</th>
                                                <th>Prix</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                        </tfoot>
                                        <tbody>
                                             <?PHP

                                                foreach($listePlat as $row){


                                                ?>
                                            <tr>
                                                <td><?php echo $row['id_plat'] ?></td>

                                                <td>
                                                    <img style="width: 150px;" src="../z-front/img/menu/1/<?php echo $row['image'] ?>">
                                                </td>

                                                <td><?php echo $row['nom'] ?></td>
                                                <td><?php echo $row['description'] ?></td>
                                                <td><?php echo $row['prix'] ?></td>
                                    
                                                <td>
                                                    <form method="POST" action="modifierPlat.php">
                                                    <button  class="btn btn-primary">
                                                    <i class="fa fa-edit"></i></button>
                                                    <input type="hidden" value="<?PHP 
                                                    echo $_row['image']; ?>" name="image"  >

                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['id_plat']; ?>" name="id_plat">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['image']; ?>" name="image">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['nom']; ?>" name="nom">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['description']; ?>"name="description">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['prix']; ?>" name="prix">
                                                    </form>
                                                </td>
                                                <td> 
                                                    <form method="POST" action="supprimerPlat.php">
                                                    <button  class="btn btn-danger">
                                                    <i class="fa fa-trash"></i></button>
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['id_plat']; ?>" name="id_plat"></form>
                                                </td>
                                            </tr>
                                            <?PHP }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>








                            <div class="card-body">
                                <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Table Promotion
                                <a class=".btn btn-default" href="ajouterPromotion.php" style="margin-left: 30%;text-transform: uppercase; ">Ajouter Promotion</a>
                            </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>                                                
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Remise</th>
                                                <th>Date activation</th>
                                                <th>Date expiration</th>
                                                <th>ID Plat</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                                <th>#</th>
                                                <th>Image</th>
                                                <th>Remise</th>
                                                <th>Date activation</th>
                                                <th>Date expiration</th>
                                                <th>ID Plat</th>
                                                <th>Modifier</th>
                                                <th>Supprimer</th>
                                        </tfoot>
                                        <tbody>
                                             <?PHP

                                                foreach($listePlatPromo as $row){


                                                ?>
                                            <tr>
                                                <td><?php echo $row['id_promo'] ?></td>

                                                <td>
                                                    <img style="width: 150px;" src="../z-front/img/menu/1/<?php echo $row['image'] ?>">
                                                </td>

                                                <td><?php echo $row['val_promo'] ?> %</td>
                                                <td><?php echo $row['date_activation'] ?></td>
                                                <td><?php echo $row['date_expiration'] ?></td>
                                                <td><?php echo $row['id_plat'] ?></td>
                                    
                                                <td>
                                                    <form method="POST" action="modifierPromotion.php">
                                                    <button  class="btn btn-primary">
                                                    <i class="fa fa-edit"></i></button>
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['id_promo']; ?>" name="id_promo">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['val_promo']; ?>" name="val_promo">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['date_activation']; ?>" name="date_activation">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['date_expiration']; ?>" name="date_expiration">
                                                    <input type="hidden" value="<?PHP 
                                                    echo $row['id_plat']; ?>"name="id_plat">
                                                    
                                                    </form>
                                                </td>
                                                <td> 
                                                    <form method="POST" action="supprimerPromotion.php">
                                                    <button  class="btn btn-danger">
                                                    <i class="fa fa-trash"></i></button>
                                                        <input type="hidden" value="<?PHP 
                                                        echo $row['id_promo']; ?>" name="id_promo"></form>
                                                </td>
                                            </tr>
                                            <?PHP }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>



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
