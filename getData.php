<html>
	<head>
		<title>Getting data...</title>
	</head>
	<body>
<?php
	
	// Create connection
	$mysqli = new mysqli('localhost', 'root', 'DTNBali2017', 'tourplan');
	
	include ("connect.php");
	
	

	if (!$dbh)
	{
		exit("Connection Failed: " . $dbh);
	}
	
	date_default_timezone_set('Asia/Jakarta');
	$today = date('Y-m-d 00:00:00.000');
	$d1 = date('Y-m-d 00:00:00.000', strtotime('+1 days', strtotime($today)));
	$d2 = date('Y-m-d 00:00:00.000', strtotime('+2 days', strtotime($today)));
	$d3 = date('Y-m-d 00:00:00.000', strtotime('+3 days', strtotime($today)));
	$d4 = date('Y-m-d 00:00:00.000', strtotime('+4 days', strtotime($today)));
	$d5 = date('Y-m-d 00:00:00.000', strtotime('+5 days', strtotime($today)));
	$d6 = date('Y-m-d 00:00:00.000', strtotime('+7 days', strtotime($today)));
	
	$bsl = $dbh->query("SELECT BSL.BHD_ID, BSL.BSL_ID, BSL.OPT_ID, BSL.DATE, BSL.PICKUP, BSL.REMARKS, BSL.PICKUP_DATE, BSL.SERVICE, BHD.AGENT, BHD.FULL_REFERENCE, BHD.RES_CONTACT, BHD.NAME AS clientName, OPT.SUPPLIER, BSL.SL_STATUS, OPT.DESCRIPTION, DRM.NAME AS agentName, LCL.CODE, FTB.Booking_Pax, BSL.DROPOFF, BSL.DAY, BSL.SEQ
								FROM BSL 
									JOIN BHD BHD ON BHD.BHD_ID = BSL.BHD_ID
									JOIN OPT OPT ON OPT.OPT_ID = BSL.OPT_ID
									JOIN DRM DRM ON DRM.CODE = BHD.AGENT
									JOIN LCL LCL ON LCL.CODE = OPT.LOCATION
									JOIN FTB FTB ON FTB.Booking_reference = BHD.FULL_REFERENCE
								WHERE BSL.DATE > '$today' AND BSL.DATE < '$d3'
									");
	
	if (!$bsl)
	{
		exit("Error in SQL");
	}

	while ($row = $bsl->fetch())
	{
		$item[] = array(
			"bslID" => $row['BSL_ID'],
			"serviceDate" => $row['DATE'],
			"clientName" => $row['clientName'],
			"service" => $row['SERVICE'],
			"pax" => $row['Booking_Pax'],
			"bookingReference" => $row['FULL_REFERENCE'],
			"supplier" => $row['SUPPLIER'],
			"serviceStatus" => $row['SL_STATUS'],
			"agent" => $row['agentName'],
			"reps" => $row['RES_CONTACT'],
			"activities" => $row['DESCRIPTION'],
			"hotel" => $row['PICKUP'],
			"area" => $row['CODE'],
			"dropoff" => $row['DROPOFF'],
			"day" => $row['DAY'],
			"seq" => $row['SEQ']
			);
	}

	foreach($item as $booking)
	{
		$tampung = $mysqli->query("SELECT * FROM operation WHERE bslID = '$booking[bslID]' ");
		$data = mysqli_fetch_array($tampung);
		$blList = $data['bslID'];
		//$today1 = date('Y-m-d h:i:sa');
		if($booking['bslID'] == $blList)
		{
			$bslID = $booking['bslID'];
			$day = $booking['day'];
			$seq = $booking['seq'];
			$serviceDate = $booking['serviceDate'];
			$clientName = $booking['clientName'];
			$service = $booking['service'];
			$pax = $booking['pax'];
			$bookingReference = $booking['bookingReference'];
			$supplier = $booking['supplier'];
			$serviceStatus = $booking['serviceStatus'];
			$agent = $booking['agent'];
			$reps = $booking['reps'];
			$activities = $booking['activities'];
			$hotel = $booking['hotel'];
			$dropoff = $booking['dropoff'];
			$area = $booking['area'];
			
			$sqlUpdate = $mysqli->query("UPDATE operation SET bslID='$bslID', day = '$day', seq = '$seq', serviceDate='$serviceDate', clientName='$clientName', service='$service', pax='$pax', bookingReference='$bookingReference', supplier='$supplier', slStatus='$serviceStatus', agent='$agent', reps='$reps', activities='$activities', hotel='$hotel', dropoff='$dropoff', area='$area' WHERE bslID = '$bslID'");
				
			if(!$sqlUpdate)
			{
				echo 'Update data failed !<br />';
				
			}
			else
			{
				echo 'Update data success !<br />';
			}
		}
		else
		{
			$sqlinsert = "INSERT INTO operation (bslID, day, seq, serviceDate, clientName, service, pax, bookingReference, supplier, slStatus, agent, reps, activities, hotel, dropoff, area) VALUES ('$booking[bslID]', '$booking[day]', '$booking[seq]', '$booking[serviceDate]', '$booking[clientName]', '$booking[service]', '$booking[pax]', '$booking[bookingReference]', '$booking[supplier]','$booking[serviceStatus]', '$booking[agent]', '$booking[reps]', '$booking[activities]', '$booking[hotel]', '$booking[dropoff]', '$booking[area]')";
			

			if($mysqli->query($sqlinsert) === TRUE)
			{
				echo 'New record created successfully <br />';
			}
			else
			{
				echo 'Error: cannot insert data <br />';
			}
		}
	}
?>
	</body>
</html>