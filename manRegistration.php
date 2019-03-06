<?php

require 'db_connect.php';

$name = $_POST['name'];
$companyName = $_POST['cname'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];

function generate($string1,$string2){
  $sub1 = substr($string1,0,3);
  $sub2 = substr($string2,0,3);
  return $sub1.$sub2;
}


$ID = generate($companyName,$mobile);
$companyID = rand(1111,9999);

$sql = "INSERT INTO company values('$companyName','$companyID')";
$res = mysqli_query($connection, $sql);


$sql = "INSERT INTO manager(ID,name,companyID,companyName,password,mobile,email) VALUES ('$ID', '$name', '$companyID', '$companyName','$password','$mobile','$email')";

$res = mysqli_query($connection, $sql);
if($res == False){
	// header("Location: administrate.php?success=false");
}else{
	 header("Location:login.php");
}





 ?>
