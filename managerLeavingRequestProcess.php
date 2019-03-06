<?php

session_start();

require 'db_connect.php';

$EID = $_POST['EID'];
$certificate = $_POST['certificate'];

$sql = "UPDATE notification set status = 1 WHERE EID = '$EID' ";
$res = mysqli_query($connection, $sql);

$sql = "UPDATE employee SET certificate = '$certificate' ";
$res = mysqli_query($connection,$sql);

 header("Location:manager.php");

 ?>
