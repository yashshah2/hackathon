<?php
session_start();

require 'db_connect.php';

$EID = $_POST['EID'];
// $previousCompanyId = $_POST['previousCompanyId'];
// $presentCompanyID = $_SESSION['presentCompanyID'] ;
// $sql = "DELETE FROM notification WHERE EID = '$EID' ";
// $res = mysqli_query($connection, $sql);

$sql = "UPDATE notification SET status = 2 where EID = '$EID'";
$res = mysqli_query($connection,$sql);
header("Location:manager.php");

 ?>
