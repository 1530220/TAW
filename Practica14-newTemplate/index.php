<?php  
    session_start();
    require_once "DWash/controllers/controller.php";
    require_once "DWash/models/enlaces.php";
    require_once "DWash/models/crud.php";

    if(isset($_SESSION['usuario'])){
        header("location:DWash/index.php");
    }
    if($_POST){
        $log = new MvcController();
        $log->login();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Iniciar Sesion</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Google Fonts -->
        <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
        <script>
          WebFont.load({
            google: {"families":["Montserrat:400,500,600,700","Noto+Sans:400,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
          });
        </script>
        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="DWash/assets/img/carwash.png">
        <link rel="icon" type="image/png" sizes="32x32" href="DWash/assets/img/carwash.png">
        <link rel="icon" type="image/png" sizes="16x16" href="DWash/assets/img/carwash.png">
        <!-- Stylesheet -->
        <link rel="stylesheet" href="DWash/assets/vendors/css/base/bootstrap.min.css">
        <link rel="stylesheet" href="DWash/assets/vendors/css/base/elisyam-1.5.min.css">
        <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
    </head>
    <body class="bg-white">

        <!-- Begin Preloader -->
        <div id="preloader">
            <div class="canvas">
                <img src="DWash/assets/img/carwash.png" alt="logo" class="loader-logo">
                <div class="spinner"></div>   
            </div>
        </div>
        <!-- End Preloader -->
        <!-- Begin Container -->
        <div class="container-fluid no-padding h-100">
            <div class="row flex-row h-100 bg-white">
                <!-- Begin Left Content -->
                <div class="col-xl-8 col-lg-6 col-md-5 no-padding">
                    <div class="elisyam-bg background-01">
                        <div class="elisyam-overlay overlay-01"></div>
                        <div class="authentication-col-content mx-auto">
                            <h1 class="gradient-text-01">
                                Bienvenido!
                            </h1>
                            <span class="description">
                                Iniciar sesion para acceder al panel de control del sistema de información.
                            </span>
                        </div>
                    </div>
                </div>
                <!-- End Left Content -->
                <!-- Begin Right Content -->
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto no-padding">
                    <!-- Begin Form -->
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <img src="DWash/assets/img/carwash.png" alt="logo">
                        </div>
                        <h3>Iniciar Sesion</h3>
                        <form method="post">
                            <div class="group material-input">
							    <input type="text" name="usuario" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>Usuario</label>
                            </div>
                            <div class="group material-input">
							    <input type="password" name="contraseña" required>
							    <span class="highlight"></span>
							    <span class="bar"></span>
							    <label>Contraseña</label>
                            </div>
                            <div class="sign-btn text-center">
                                <input type="submit" value="Acceder" class="btn btn-lg btn-gradient-01">
                            </div>
                        </form>


                    </div>
                    <!-- End Form -->                        
                </div>
                <!-- End Right Content -->
            </div>
            <!-- End Row -->
        </div>


        <!-- End Container -->    
        <!-- Begin Vendor Js -->
        <script src="DWash/assets/vendors/js/base/jquery.min.js"></script>
        <script src="DWash/assets/vendors/js/base/core.min.js"></script>
        <!-- End Vendor Js -->
        <!-- Begin Page Vendor Js -->
        <script src="DWash/assets/vendors/js/app/app.min.js"></script>
        <!-- End Page Vendor Js -->
    </body>
</html>