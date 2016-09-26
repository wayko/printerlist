
<?php
header('Content-Type: text/html; charset=UTF-8');
$per_page = 10;
if(!isset($_GET['page']))
{
$page = 1;
}else
{
$page = $_GET['page'];
}
if($page<=1)
$start = 0;
else
$start = $page * $per_page - $per_page;
$con = new mysqli("localhost","wayko","b4v0e1jj");
if (!$con)
  {
  die('Could not connect: ' . $con->connect_errno);
  }
 $con->select_db("printerlist");
$sql = "SELECT * FROM printer_inv";
$sql1 = "SELECT * FROM printer_inv LIMIT $start,$per_page";
$result =$con->query($sql);
$result1 =$con->query($sql1);	
	$count=$result->num_rows;
	$pages=ceil($count/$per_page);
	echo "<div class='wrapper'>";
	echo "<table id='tbltonerlist'>";
echo"<tr>";
echo"<th>ID</th>";
echo"<th>Toner_Type</th>";
echo"<th>Available</th>";
echo"<th>Add</th>";
echo"<th>Remove</th>";
echo"<th>+10</th>";
echo"</tr>";

	while($row = $result1->fetch_assoc())
{
	
	
 echo "<tr id='". $row['ID']. "' name='rowid'>"; 
 echo "<td>".$row['ID'] . "</td> "; 
 echo "<td>".$row['Toner_Type'] . "</td> "; 
 echo "<td  id='Available'>".$row['Available'] . "</td>";
 echo "<td><input type='button' class='add' value='Add'></input></td>"; 
 echo "<td><input type='button' class='remove' value='Remove'></input></td>";
 echo "<td><input type='button' class='plus10' value='+10'></input></td></tr>";
} 
 echo "</table>"; 
for ($number = 1; $number <= $pages; $number +=1){
 echo '<a class="paginate" href="printerlist.php?page='.$number.'">| ' .$number. ' | </a>';
 
 }
	echo "</div>";


	$con->close();


?>
<!DOCTYPE  html>
<html>
<head>

<title>Toner List</title>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<link rel="stylesheet" type="text/css" href="style/printerlist.css">

</head>
<body>
<div class="wrapper">
<div class="header"></div>
<section class="printerlist">

</section>
<footer>
</footer>
</div>
<script type="text/javascript" src="js/printerlist.js"></script>
</body>
</html>