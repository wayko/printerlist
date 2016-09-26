<?php
$rowid = $_POST['rowid'];
$available = $_POST['Available'];


$con = new mysqli("localhost","wayko","b4v0e1jj");
if (!$con)
  {
  die('Could not connect: ' . $con->connect_errno);
  }
 $con->select_db("printerlist");
$sql = "UPDATE printer_inv set Available =" .$available . " where id= " . $rowid;
$result =$con->query($sql);

	$con->close();
?>
