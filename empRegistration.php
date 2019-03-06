<?php

require 'db_connect.php';

$name = $_POST['name'];
$address = $_POST['address'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$companyID = $_POST['companyID'];
$resume = $_POST['resume'];
$certificate = $_POST['certificate'];
$aadhar = $_POST['aadhar'];

function generate($string1,$string2){
  $sub1 = substr($string1,0,3);
  $sub2 = substr($string2,0,3);
  return $sub1.$sub2;
}

$ID = generate($name,$mobile);

$sql = "INSERT INTO employee(ID,name,password,mobile,email,address,dob,presentComanyId,resume,certificate,aadhar) VALUES ('$ID', '$name', '$password','$mobile','$email','$address','$dob', '$companyID','$resume','$certificate','$aadhar')";

$res = mysqli_query($connection, $sql);
if($res == False){
	// header("Location: administrate.php?success=false");
}else{
	 header("Location:login.php");
}





 ?>
