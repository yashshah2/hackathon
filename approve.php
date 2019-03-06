<?php
session_start();

require 'db_connect.php';

$EID = $_POST['EID'];
$previousCompanyId = $_POST['previousCompanyId'];
$presentCompanyID = $_SESSION['presentCompanyID'] ;
$sql = "DELETE notification WHERE EID = '$EID' ";
$res = mysqli_query($connection, $sql);

$sql = "UPDATE employee SET previousComanyId = '$previousCompanyId', presentComanyId='$presentCompanyID' where EID = '$EID'";
$res = mysqli_query($connection,$sql);

header("Location:manager.php");

 ?>
