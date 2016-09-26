<?php 
	header('Content-Type: text/html; charset=UTF-8');
	error_reporting(0);
	
	//variables
	$distlist = $_POST["DistributionInfo"];
	$toners = $_POST["Toner"];
	$dates = $_POST["Date"];
	$currentAmount = $_POST["Date"];


	$con = new mysqli("localhost","wayko","b4v0e1jj","printerlist");
	
	//Check connection
	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
		echo "error occured";
	} 

	$sql = "INSERT INTO tonerdist (DistributionInfo,Toner,Date) VALUES ('" .$distlist. "','".$toners."','".$dates."')";
	
	$pass = $con->query($sql);
	if ($pass === FALSE) {
		echo "False";
	}

	if ($pass === TRUE) {
		$con->close();
		updateDatabase($toners);
		echo "Database Updated";
	 }
	
	//update toner database
	function updateDatabase($toners)
	{
		$con2 = new mysqli("localhost","wayko","b4v0e1jj","printerlist");
		//Check connection
		
		if ($con2->connect_error) 
		{
			die("Connection failed: " . $con->connect_error);
			echo "error occured";
		}	

		$sql2 = "SELECT ID, Available FROM printer_inv WHERE Toner_Type = '" . $toners . "'";
		$result = $con2->query($sql2);

		while($row = $result->fetch_assoc())
		{
			$available = $row['Available'] - 1;
			
			$rowid = $row['ID'];
			$sql3 = "UPDATE printer_inv set Available =" .$available . " where id= " . $rowid;
			if ($con2->query($sql3) === TRUE)
			{

			}
		}
		$con2->close();
	}
	

?>