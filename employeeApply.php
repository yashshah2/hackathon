<?php
session_start();

require 'db_connect.php';

$EID = $_SESSION['ID'];
$presentCompanyID =   $_SESSION['presentCompanyID'] ;
$appliedID = $_POST['companyID'];


$sql = "INSERT INTO notification(EID,presentCompanyID,appliedID) VALUES ('$EID','$presentCompanyID','$appliedID')";

$res = mysqli_query($connection, $sql);
if($res == False){
	// header("Location: administrate.php?success=false");
}else{
	 header("Location:employee.php");
}




 ?>
