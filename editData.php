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
    <form class="contact_form" method="POST" action="processEdit.php">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "tourplan";

            // Create connection
            $connsql = new mysqli($servername, $username, $password, $dbname);
            $bslID = $_GET['id'];
            $sql = mysqli_query($connsql, "SELECT * FROM operation WHERE bslID = $bslID");
            $data = mysqli_fetch_array($sql);
                $detailID = $data['bslID'];
                $serviceDate = $data['serviceDate'];
                $clientName = $data['clientName'];
                $pax = $data['pax'];
                $bookingReference = $data['bookingReference'];
                $agent = $data['agent'];
                $reps = $data['reps'];
                $activities = $data['activities'];
                $hotel = $data['hotel'];
                $area = $data['area'];
                $language = $data['language'];
                $pickup = $data['pickup'];
                $guideName = $data['guideName'];
                $driverName = $data['driverName'];
                $driverNo = $data['driverNo'];
                $remarks = $data['remarks'];
        ?>
    <div class="section section-basic">
        <div class="container">
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Service Date</label>
                <div class="col-10">
                    <input class="form-control" type="text" value="<?php echo $detailID; ?>" id="example-text-input" hidden/>
                    <input class="textfield" type="text" value="<?php echo $serviceDate; ?>" readonly/>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Name Of Client</label>
                <div class="col-10">
                    <input class="textfield" type="text" value="<?php echo $clientName; ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Pax</label>
                <div class="col-10">
                    <input class="textfield" type="text" value="<?php echo $pax; ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">TP Code</label>
                <div class="col-10">
                    <input class="textfield" type="text" value="<?php echo $bookingReference; ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Agent</label>
                <div class="col-10">
                    <input class="textfield" type="text" value="<?php echo $agent; ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Activities</label>
                <div class="col-10">
                    <input class="textfield" type="text" value="<?php echo $activities; ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Hotel</label>
                <div class="col-10">
                    <input class="textfield" type="text" value="<?php echo $hotel; ?>" readonly />
                </div>
            </div>
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Language</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtlanguage">
                        <option><?php echo $language; ?></option>
                        <?php
                            $selectLanguage = mysqli_query($connsql, "SELECT * FROM language ORDER BY Description ASC");
                            if(mysqli_num_rows($selectLanguage) != 0){
                                while($data = mysqli_fetch_array($selectLanguage)){
                                    echo '<option>'.$data['description'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-time-input" class="col-2 col-form-label">Pickup</label>
                <div class="col-10">
                    <input class="form-control" type="time" value="<?php echo $pickup; ?>" id="example-time-input" name="txtpickup">
                </div>
            </div>
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Guide Name</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtGuideName">
                        <option><?php echo $guideName; ?></option>
                        <?php]
                            $selectGuide = mysqli_query($connsql, "SELECT * FROM transport WHERE type = 'G' ORDER BY name ASC");
                            if(mysqli_num_rows($selectGuide) != 0){
                                while($data = mysqli_fetch_array($selectGuide)){
                                    echo '<option>'.$data['name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Driver Name</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtDriverName">
                        <option><?php echo $driverName; ?></option>
                        <?php
                            include_once("connect.php");
                            $selectDriver = mysqli_query($connsql, "SELECT * FROM transport WHERE type = 'D' ORDER BY name ASC");
                            if(mysqli_num_rows($selectDriver) != 0){
                                while($data = mysqli_fetch_array($selectDriver)){
                                    echo '<option>'.$data['name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-select-input" class="col-2 col-form-label">Driver No</label>
                <div class="col-10">
                    <select class="form-control" id="exampleSelect1" name="txtDriverNo">
                        <option><?php echo $driverNo; ?></option>
                        <?php
                            include_once("connect.php");
                            $selectVechile = mysqli_query($connsql, "SELECT * FROM transport WHERE type = 'V' ORDER BY name ASC");
                            if(mysqli_num_rows($selectVechile) != 0){
                                while($data = mysqli_fetch_array($selectVechile)){
                                    echo '<option>'.$data['name'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="example-time-input" class="col-2 col-form-label">Remarks</label>
                <div class="col-10">
                    <textarea class="form-control" placeholder="Place your remarks" rows="5" value="<?php echo $remarks; ?>" name="txtRemarks"></textarea>
                </div>
            </div>
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

</html>