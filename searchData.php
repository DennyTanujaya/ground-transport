<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Panorama Destination Bali</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/now-ui-kit.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.input-tanggal').datepicker();       
        });
    </script>
</head>

<body class="index-page">
    <!-- Navbar -->
    <nav class="navbar navbar-toggleable-md bg-primary fixed-top " color-on-scroll="500">
        <div class="container">
            <div class="navbar-translate">
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
                <a class="navbar-brand" href="index.php" rel="tooltip" data-placement="bottom"> 
                                <img src="img/logo-white.png" alt=""> 
                </a>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="section">
    </div>
    <form class="contact_form" method="POST" action="prosesSearch.php">
    <div class="section section-basic">
        <div class="container">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Service Date</label>
                <div class="col-10">
                    <input type="text" class="input-tanggal" name="txttanggal">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Service Type</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtServiceType">
                        <option>Choose service type</option>
                        <option value="AV">AV</option>
                        <option value="PT">PT</option>
                        <option value="TA">TA</option>
                        <option value="TD">TD</option>
                        <option value="TP">TP</option>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Agent</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtAgent">
                        <option>Choose Agent Name</option>
                        <?php
                            include_once("connectSQL.php");
                            $selectAgent = mysqli_query($connsql, "SELECT DISTINCT agent FROM operation WHERE area = 'DPS' ORDER BY agent ASC");
                            if(mysqli_num_rows($selectAgent) != 0){
                                while($data = mysqli_fetch_array($selectAgent)){
                                    echo '<option>'.$data['agent'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Movement</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtMovement">
                        <option>Choose Movement</option>
                        <?php
                            include_once("connectSQL.php");
                            $selectMovement = mysqli_query($connsql, "SELECT DISTINCT activities FROM operation WHERE area = 'DPS' AND service = 'TA' OR service = 'TD' OR service = 'TP' OR service = 'AV' OR service = 'PT' AND supplier != 'PANBAL' ORDER BY activities ASC");
                            if(mysqli_num_rows($selectMovement) != 0){
                                while($data = mysqli_fetch_array($selectMovement)){
                                    echo '<option>'.$data['activities'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <!--
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Activities</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtActivities">
                        <option>Choose Activities</option>
                        <?php
                            include_once("connectSQL.php");
                            $selectActivities = mysqli_query($connsql, "SELECT DISTINCT activities FROM operation WHERE area = 'DPS' AND service = 'TP' AND supplier = 'PANBAL' ORDER BY activities ASC");
                            if(mysqli_num_rows($selectActivities) != 0){
                                while($data = mysqli_fetch_array($selectActivities)){
                                    echo '<option>'.$data['activities'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            -->
            <button class="btn btn-primary">Submit</button>
        </div>
    </div>
	</form>
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
    </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="js/now-ui-kit.js" type="text/javascript"></script>
<script src="js/jquery-ui.js"></script>

</html>