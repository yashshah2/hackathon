<?php

require 'db_connect.php';

$sql = "SELECT * FROM company";
$res = mysqli_query($connection,$sql);

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Employee | Register</title>
  </head>
  <body>
    <form class="" action="empRegistration.php" method="post">
      <input type="text" name="name" value="" placeholder="Name">
      <select class="" name="companyID">
        <?php
        while ($row = mysqli_fetch_assoc($res)) {
          echo   "<option value='".$row["ID"]."'>".$row["name"]."</option>";
        }
         ?>
      </select>
      <input type="text" name="dob" value="">
      <input type="text" name="address" value="">
      <input type="text" name="email" value="">
      <input type="password" name="password" value="">
      <input type="number" name="mobile" value="">
      <input type="text" name="resume" value="">
      <input type="text" name="certificate" value="">
      <input type="text" name="aadhar" value="">
      <button type="submit" name="button">Register</button>
    </form>
  </body>
</html>
