<html>
	<head>
		<title>Getting data...</title>
	</head>
	<body>
<?php
	//date_default_timezone_set('Asia/Jakarta');
	// Create connection
	$connsql = new mysqli('localhost', 'root', 'DTNBali2017', 'tourplan');
	
	set_time_limit(0);
	include ("connect.php");
	
	

	if (!$dbh)
	{
		exit("Connection Failed: " . $dbh);
	}
	
	$rse = $dbh->query("SELECT * FROM dbo.RSE");
	
	if (!$rse)
	{
		exit("Error in SQL");
	}

	while ($row=$rse->fetch())
	{
		$today = date('Y-m-d h:i:sa');
		$item[] = array(
			"rseID" => $row['RSE_ID'],
			"type" => $row['TYPE'],
			"code" => $row['CODE'],
			"name" => $row['NAME'],
			"min_pax" => $row['MIN_PAX'],
			"max_pax" => $row['MAX_PAX']
		);
		
	}
	foreach($item AS $driver)
	{
		/*$tampung = mysqli_query($connsql, "SELECT * FROM driver WHERE rseID = '$driver['rseID'] ");
		$data = mysqli_fetch_array($tampung);
		$rseList = $data['rseID'];
		
		
		if($rseID == $rseList)
		{
			$sqlupdate = "UPDATE driver SET rseID='$driver['rseID'], type='$driver[type]', code='$driver[code]', name='$driver[name]', minPax='$driver[min_pax]', maxPax='$driver[max_pax]', lastUpdate='$today' WHERE rseID = '$driver[rseID]'";
				
			if($connsql -> query($sqlupdate) === TRUE)
			{
				echo 'Update data success !<br />';
			}
			else
			{
				echo 'Error: Update data failed !<br />';
			}
		}
		else
		{*/
			$sqlinsert = "INSERT INTO driver (rseID, type, code, name, minPax, maxPax) VALUES ('$driver[rseID]', '$driver[type]', '$driver[code]', '$driver[name]', '$driver[min_pax]', '$driver[max_pax]')";	
			
			if($connsql->query($sqlinsert) === TRUE)
			{
				echo 'New record created successfully <br />';
			}
			else
			{
				echo 'Error: cannot get data <br />';
			}
		//}
	}
?>
	</body>
</html>