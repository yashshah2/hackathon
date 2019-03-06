<?php
session_start();

require 'db_connect.php';

$EID = $_SESSION['ID'];
$presentCompanyID =  $_SESSION['presentCompanyID'] ;
$appliedID = $_POST['companyID'];

$sql = "UPDATE employee SET presentComanyId='$appliedID', previousCompanyId='$presentCompanyID'";
$res = mysqli_query($connection, $sql);

$_SESSION['presentCompanyID'] = $appliedID;

 $sql = "DELETE FROM notification WHERE EID = '$EID' ";
 $res = mysqli_query($connection, $sql);
if($res == False){
	// header("Location: administrate.php?success=false");
}else{
	 header("Location:employee.php");
}




 ?>
