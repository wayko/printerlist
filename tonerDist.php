<?php 
	header('Content-Type: text/html; charset=UTF-8');
	$con = new mysqli("localhost","wayko","b4v0e1jj");
	if (!$con)
	{
		die('Could not connect: ' . $con->connect_errno);
	}
	$con->select_db("printerlist");
	$sql = "SELECT * FROM tonerdist";
	$result =$con->query($sql);
	$sql1 = "SELECT Toner_Type FROM printer_inv";
	$result1 = $con->query($sql1);
	$current_Date = Date("m/d/Y - G:I:s A");
	echo "<table>";
	echo "<th>Location</th>";
	echo "<th>Toner</th>";
	echo "<th>Date Distributed</th>";
	echo "<tr>";
	echo "<td class='name'><input type='text' class='names' name='DistrubInfo'></input></td>";
	echo "<td class='toner'>";
	echo "<select>";
	while($row2 = $result1->fetch_assoc())
	{
		 echo "<option value='".$row2['Toner_Type'] . "'name ='Toner'>".$row2['Toner_Type'] . "</option>";
	}
	echo "</select></td>";
	echo "<td class='date'><input type='text' class='dates' value='$current_Date' name='Date'></input></td>";
	echo "<td><input type='button' class='add' value='Add'></input></td></tr>";
	echo "</table>"; 
?>
<!DOCTYPE  html>
<html>
<head>

<title>Toner List</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<link rel="stylesheet" type="text/css" href="style/tonerDist.css">

</head>
<body>
<div class="wrapper">
<div class="header"></div>
<section class="tonerDist">

</section>
<footer>
</footer>
</div>
<script type="text/javascript" src="js/tonerDist.js"></script>
</body>
</html>