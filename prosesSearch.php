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
    <div class="wrapper">
        <div class="section">
            <div class="table-responsisve">
                <table class="table responstable">
                    <thead>
                        <tr>
                            <th>Service Type</th>
                            <th>Service Date</th>
                            <th>Name Of Client</th>
                            <th>Pax</th>
                            <th>TP Code</th>
                            <th>Agent</th>
                            <th>Movement</th>
                            <th>Activities ( Tours )</th>
                            <th>Pickup</th>
                            <th>Dropoff</th>
                            <th>Language</th>
                            <th>Pickup Time</th>
                            <th>Guide Name</th>
                            <th>Driver Name</th>
                            <th>Driver No</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                                $searchDate = $_POST['txttanggal'];
                                $serviceType = $_POST['txtServiceType'];
                                $agent = $_POST['txtAgent'];
                                $movement = $_POST['txtMovement'];

                                $serviceDateFix = date("Y-m-d", strtotime($searchDate));

                                date_default_timezone_set('Asia/Jakarta');
                                $servername = "localhost";
                                $username = "root";
                                $password = "DTNBali2017";
                                $dbname = "tourplan";

                                // Create connection
                                $connsql = new mysqli($servername, $username, $password, $dbname);

                                $operation = mysqli_query($connsql, "SELECT * FROM operation WHERE serviceDate = '$serviceDateFix' AND service = '$serviceType' AND agent = '$agent' AND activities = '$movement' ORDER BY serviceDate DESC, agent ASC");
                                $i = 1;
                                while( $row = mysqli_fetch_array($operation) )
                                {
                                    if($row['area'] == "DPS")
                                    {

                            ?>
                        <tr>
                            <td><?php echo $row['service'];?></td>
                            <td>
                                <?php
                                    $serviceDate = date("d/m/Y", strtotime($row['serviceDate'])); 
                                    echo $serviceDate;
                                ?>
                            </td>
                            <td><?php echo $row['clientName']; ?></td>
                            <td><?php echo $row['pax'];?></td>
                            <td><?php echo $row['bookingReference']; ?></td>
                            <td><?php echo $row['agent']; ?></td>
                            <td><?php echo $row['activities']; ?></td>
                            <td>
                                <?php
                                    if ($row['supplier'] == "PFLBAL")
                                    {
                                        $desc = mysqli_query($connsql, "SELECT * FROM operation WHERE bookingReference = '$row[bookingReference]' AND supplier = 'PANBAL' AND slStatus = 'OK'");
                                        $data = mysqli_fetch_array($desc);
                                        echo $data['activities'];
                                    }
                                ?>
                            </td>
                            <td><?php echo $row['hotel']; ?></td>
                            <td><?php echo $row['dropoff']; ?></td>
                            <td><?php echo $row['language']; ?></td>
                            <td><?php echo $row['pickup']; ?></td>
                            <td><?php echo $row['guideName']; ?></td>
                            <td><?php echo $row['driverName']; ?></td>
                            <td><?php echo $row['driverNo']; ?></td>
                            <td><?php echo $row['remarks']; ?></td>
                            <td valign="middle">
                                <a href="editData.php?&id=<?php echo $row['bslID']; ?>" class="btn btn-primary">Edit</button>
                            </td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <script src='http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js'></script>
        </div>
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

</html>s