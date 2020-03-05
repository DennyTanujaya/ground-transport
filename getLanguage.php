<html>
	<head>
		<title>Getting data...</title>
	</head>
	<body>
<?php
	//date_default_timezone_set('Asia/Jakarta');

	// Create connection
	$connsql = new mysqli('localhost', 'root', '', 'tourplan');
	
	set_time_limit(0);
	include ("connect.php");
	
	

	if (!$dbh)
	{
		exit("Connection Failed: " . $dbh);
	}
	
	$ca3 = $dbh->query("SELECT * FROM dbo.CA3");
	
	if (!$ca3)
	{
		exit("Error in SQL");
	}
	
	while ($row=$ca3->fetch())
	{
		$item[] = array(
			"code" => $row['CODE'],
			"description" => $row['DESCRIPTION']
		);
		
	}
	foreach($item AS $language)
	{
		$sqlinsert = "INSERT INTO language (code, description) VALUES ('$language[code]', '$language[description]')";	
			
		if($connsql -> query($sqlinsert) === TRUE)
		{
			echo 'New record created successfully <br />';
		}
		else
		{
			echo 'Error: cannot get data <br />';
		}
	}
?>
	</body>
</html>