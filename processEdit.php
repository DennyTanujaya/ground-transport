<html>
	<head>
		<title>Processing data...</title>
		<meta http-equiv="refresh" content="3;url=http://localhost/shared/viewData.php">
	</head>
	<body>
<?php
	date_default_timezone_set('Asia/Jakarta');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "tourplan";

	// Create connection
	$connsql = new mysqli($servername, $username, $password, $dbname);
	
	set_time_limit(0);
	
	$detailID = $_POST['id'];
	$language = $_POST['txtlanguage'];
	$pickup = $_POST['txtpickup'];
	$guideName = $_POST['txtGuideName'];
	$driverName = $_POST['txtDriverName'];
	$driverNo = $_POST['txtDriverNo'];
	$remarks = $_POST['txtRemarks'];
	$today = date('Y-m-d h:i:sa');
	
	$sql = "UPDATE operation SET language='$language', pickup='$pickup', guideName='$guideName', driverName='$driverName', driverNo='$driverNo', remarks='$remarks', lastUpdate='$today' WHERE bslID = '$detailID'";
	
	if($connsql -> query($sql) === TRUE)
	{
		echo "Edit Data Success !<br />";
		echo "Wait a moment, <br /> System will directing you to view page...";
	}
	else
	{
		echo "Edit data Failed ! <br /> Please Try again !";
		echo "Wait a moment, system will directing to view page...";
	}
?>
	</body>
</html>