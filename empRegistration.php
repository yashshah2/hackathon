<?php

require 'db_connect.php';

$name = $_POST['name'];
$address = $_POST['address'];
$password = $_POST['password'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$dob = $_POST['dob'];
$companyID = $_POST['companyID'];

if ($_SERVER['REQUEST_METHOD']=='POST') {
  // code...
  $image = $_FILES['image']['tmp_name'];
  $imgContent = addslashes(file_get_contents($image));

}


function generate($string1,$string2){
  $sub1 = substr($string1,0,3);
  $sub2 = substr($string2,0,3);
  return $sub1.$sub2;
}


$ID = generate($name,$mobile);


$sql = "INSERT INTO employee(ID,name,password,mobile,email,address,dob,presentComanyId,resume) VALUES ('$ID', '$name', '$password','$mobile','$email','$address','$dob', '$companyID',$imgContent)";

$res = mysqli_query($connection, $sql);
if($res == False){
	// header("Location: administrate.php?success=false");
}else{
	// header("Location: administrate.php?success=true");
}





 ?>
