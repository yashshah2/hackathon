<?php

session_start();

require 'db_connect.php';

$EID = $_POST['EID'];
$certificate = $_POST['certificate'];

$sql = "UPDATE notification set status = 1 WHERE EID = '$EID' ";
$res = mysqli_query($connection, $sql);

$file_name = $_FILES['certificate']['name'];
$file_tmp =$_FILES['certificate']['tmp_name'];
move_uploaded_file($file_tmp,"uploads/".$file_name);
$certificate="uploads/".$file_name;

$sql = "UPDATE employee SET certificate = '$certificate' where ID = '$EID'";
$res = mysqli_query($connection,$sql);

 header("Location:manager.php");

 ?>
