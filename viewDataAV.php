<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Panorama Destination Bali</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/now-ui-kit.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
</head>

<body class="template-page">
    
    <!-- Navbar -->
    <div style="background-color: #f58220;">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <a class="navbar-brand" href="index.php" rel="tooltip" data-placement="bottom"> 
                        <img src="img/logo-white.png" alt=""> 
                    </a>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search.." id="keyword">
                          <button type="button" class="btn btn-search asd now-ui-icons ui-1_zoom-bold" id="btn-search"></button>
                        </div>
                </div>
            </div>
        </div>
    </div> 
    <!-- End Navbar -->
    
    <div class="wrapper">
        <div>
             <div class="containesr">
            <div class="component" id="view">
                <?php include "viewDataProsesAV.php"; ?> 
            </div>
        </div><!-- /container -->
            <script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
        </div><!-- 
        <footer class="footer">
            <div class="container">
                <div class="copyrights" style="text-align: center;">
                    &copy;
                    <script>
                    document.write(new Date().getFullYear())
                    </script>
                    <a href="http://www.panorama-destination.com/" target="_blank">Panorama Destination</a> Tbk.
                </div>
            </div>
        </footer> -->
    </div>
</body>
<!--   Core JS Files   -->
<script src="js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/core/tether.min.js" type="text/javascript"></script>
<script src="js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="js/now-ui-kit.js" type="text/javascript"></script>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-throttle-debounce/1.1/jquery.ba-throttle-debounce.min.js"></script>
        <script src="js/jquery.stickyheader.js"></script>
        <script src="searchAV.js" type="text/javascript"></script>
</html>