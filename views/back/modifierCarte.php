
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Page Title - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Card</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="modifierCarteC.php" >
                                        <input type="hidden" value="<?PHP 
                                                        echo $_POST['id']; ?>" name="id">
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputFirstName">First Name</label>
                                                        <input value="<?php echo $_POST['prenom'];?>" class="form-control py-4" name="prenom" type="text" placeholder="Enter first name" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputLastName">Last Name</label>
                                                        <input value="<?php echo $_POST['nom'];?>" class="form-control py-4" name="nom" type="text" placeholder="Enter last name" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input value="<?php echo $_POST['email'];?>" class="form-control py-4" name="email" type="email" aria-describedby="emailHelp" placeholder="Enter email address" />
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input value="<?php echo $_POST['password'];?>" class="form-control py-4" name="password" type="password" placeholder="Enter password" />
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputtotalpoints">Nombre de points</label>
                                                        <input value="<?php echo $_POST['totalpoints'];?>" class="form-control py-4" name="totalpoints" type="number" placeholder="Nombre de points" />
                                                    </div>
                                                </div>
                                                   <!-- <div class="form-group">
                                                        <label class="small mb-1" for="inputetat">Etat de la carte</label>
                                                        <input value="<?php //echo $_POST['etat'];?>" class="form-control py-4" name="etat" type="text" placeholder="Etat de la carte" />
                                                    </div> -->
                                                <!--    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputdate_creat">Date de creation</label>
                                                        <input value="<?php //echo $_POST['date_creat'];?>" class="form-control py-4" name="date_creat" type="date"  />
                                                    </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="small mb-1" for="inputdate_expir">Date d'expiration</label>
                                                        <input value="<?php// echo $_POST['date_expir'];?>" class="form-control py-4" name="date_expir" type="date" />
                                                    </div>
                                                    </div>-->
                                                
                                            </div>
                                            <div class="form-group mt-4 mb-0"><button class="btn btn-primary btn-block" >Modify Card</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
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
    </body>
 </html>