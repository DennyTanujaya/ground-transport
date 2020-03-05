<html>
	<head>
		<title>Getting data...</title>
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
	$conn=odbc_connect('AS','aspano_ro','P@n0ram@1599');
	
	

	if (!$conn)
	{
		exit("Connection Failed: " . $conn);
	}
	
	$getBslID = $_POST['txtBslID'];
	$today = date('Y-m-d');
	$later = date('Y-m-d', strtotime('+14 days', strtotime($today)));
	$bsl = odbc_exec($conn, "SELECT * FROM dbo.BSL WHERE BSL_ID = '$getBslID'");
	
	if (!$bsl)
	{
		exit("Error in SQL");
	}
	$i = 1;
	
	while (odbc_fetch_row($bsl))
	{
		$today = date('Y-m-d h:i:sa');
		$bhdID = odbc_result($bsl,"BHD_ID");
		$bslID = odbc_result($bsl,"BSL_ID");
		$optID = odbc_result($bsl,"OPT_ID");
		$servicedate = odbc_result($bsl, "DATE");
		$hotel = odbc_result($bsl, "PICKUP");
		$remarks = odbc_result($bsl, "REMARKS");
		$pickupdate = odbc_result($bsl, "PICKUP_DATE");
		$bslService = odbc_result($bsl, "SERVICE");
		
		$sql1 = odbc_exec($conn, "SELECT * FROM dbo.BHD WHERE BHD_ID = '$bhdID'");
		$bhd = odbc_fetch_array($sql1);
		$agent = $bhd['AGENT'];
		$fullbooking = $bhd['FULL_REFERENCE'];
		$resContact = $bhd['RES_CONTACT'];
		
		$sql2 = odbc_exec($conn, "SELECT * FROM dbo.OPT WHERE OPT_ID = '$optID'");
		$opt = odbc_fetch_array($sql2);
		
		$sql3 = odbc_exec($conn, "SELECT * FROM dbo.DRM WHERE code = '$agent'");
		$drm = odbc_fetch_array($sql3);
		
		$sql4 = odbc_exec($conn, "SELECT * FROM dbo.LCL WHERE CODE = '$opt[LOCATION]'");
		$lcl = odbc_fetch_array($sql4);
		
		$sql7 = odbc_exec($conn, "SELECT * FROM dbo.BUD WHERE BSL_ID = '$bslID'");
		$bud = odbc_fetch_array($sql7);
		
		$sql8 = odbc_exec($conn, "SELECT * FROM dbo.FTB WHERE Booking_reference = '$bhd[FULL_REFERENCE]'");
		$ftb = odbc_fetch_array($sql8);
		
/* 		$formattanggal = $servicedate;
		$newdate = date("d M Y", strtotime($formattanggal));
		$formattime = $pickupdate;
		$newtime = date("H:i:s", strtotime($formattime)); */
		
		$tampung = mysqli_query($connsql, "SELECT * FROM bookinglist WHERE bslID = '$bslID' ");
		$data = mysqli_fetch_array($tampung);
		$blList = $data['bslID'];
		
		if($bslID == $blList)
		{
			$sqlupdate = "UPDATE bookinglist SET bslID='$bslID', serviceDate='$servicedate', clientName='$bhd[NAME]', service='$bslService', pax='$ftb[Booking_Pax]', bookingReference='$bhd[FULL_REFERENCE]', agent='$drm[NAME]', reps='$bhd[RES_CONTACT]', activities='$opt[DESCRIPTION]', hotel='$hotel', area='$lcl[DESCR]', lastUpdate='$today' WHERE bslID = '$bslID'";
				
			if($connsql -> query($sqlupdate) === TRUE)
			{
				echo ''.$bslID.' Update data success !<br />';
			}
			else
			{
				echo 'Error: '.$bslID.' Update data failed !<br />';
			}
		}
		else
		{
			$sqlinsert = "INSERT INTO bookinglist (bslID, serviceDate, clientName, service, pax, bookingReference, agent, reps, activities, hotel, area) VALUES ('$bslID', '$servicedate', '$bhd[NAME]', '$bslService', '$ftb[Booking_Pax]', '$bhd[FULL_REFERENCE]', '$drm[NAME]', '$bhd[RES_CONTACT]', '$opt[DESCRIPTION]', '$hotel', '$lcl[DESCR]')";	
			
			if($connsql -> query($sqlinsert) === TRUE)
			{
				echo ''.$bslID.' New record created successfully <br />';
			}
			else
			{
				echo 'Error: '.$bslID.' cannot get data <br />';
			}
		}
		
			
		//$sqlinsert = "INSERT INTO bookinglist (serviceDate, clientName, service, pax, bookingReference, agent, reps, activities, hotel, area) VALUES ('$servicedate', '$bhd[NAME]', '$bslService', '$ftb[Booking_Pax]', '$bhd[FULL_REFERENCE]', '$drm[NAME]', '$bhd[RES_CONTACT]', '$opt[DESCRIPTION]', '$hotel', '$lcl[DESCR]')";
		
		/*if($connsql -> query($sqlinsert) === TRUE)
		{
			echo ''.$bslID.' New record created successfully <br />';
		}
		else
		{
			echo 'Error: '.$bslID.' cannot get data <br />';
		}*/
		$i++;
	}
	odbc_close($conn);
?>
	</body>
</html>