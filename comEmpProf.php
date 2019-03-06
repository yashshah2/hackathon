
<?php

require 'db_connect.php';

$sql = "SELECT * FROM company";
$res = mysqli_query($connection,$sql);
session_start();

$ID = $_SESSION['ID'];
$name = $_SESSION['name'];
$password = $_SESSION['password'];
$mobile = $_SESSION['mobile'];
$email= $_SESSION['email'];
if(isset($_POST['button'])){



  $address = $_POST['address'];

  $dob = $_POST['dob'];
  $companyID = $_POST['companyID'];
  $resume = $_POST['resume'];
  // $certificate = $_POST['certificate'];
  $aadhar = $_POST['aadhar'];

  $file_name = $_FILES['certificate']['name'];
  $file_tmp =$_FILES['certificate']['tmp_name'];
  move_uploaded_file($file_tmp,"uploads/".$file_name);
  $certificate="uploads/".$file_name;


    $file_name = $_FILES['resume']['name'];
    $file_tmp =$_FILES['resume']['tmp_name'];
    move_uploaded_file($file_tmp,"uploads/".$file_name);

  $resume="uploads/".$file_name;



    $file_name = $_FILES['aadhar']['name'];
    $file_tmp =$_FILES['aadhar']['tmp_name'];
    move_uploaded_file($file_tmp,"uploads/".$file_name);

  $aadhar="uploads/".$file_name;


  $certificate="uploads/".$file_name;
  $sql = "INSERT INTO employee(ID,name,password,mobile,email,address,dob,presentComanyId,resume,certificate,aadhar) VALUES ('$ID', '$name', '$password','$mobile','$email','$address','$dob', '$companyID','$resume','$certificate','$aadhar')";

  $res = mysqli_query($connection, $sql);
  if($res == False){
  	// header("Location: administrate.php?success=false");
  }else{
  	 header("Location:login.php");
  }



}




  ?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style1.css">


</head>

<body>

  <div class="form">


      <div class="tab-content">

<h1> Complete Profile</h1>

          <form action="" method="post" enctype="multipart/form-data">
            <div class="field-wrap"style="text-align:center;">
            <select class="" name="companyID" >
              < option value="">Select current Company</option>
              <?php
              while ($row = mysqli_fetch_assoc($res)) {
                echo   "<option value='".$row["ID"]."'>".$row["name"]."</option>";
              }
               ?>
            </select></div>
            <div class="field-wrap">
            <label>
              Dob<span class="req">*</span>
            </label>
            <input type="text" name="dob" required autocomplete="off"/>
          </div>
          <div class="field-wrap">
          <label>
            address<span class="req">*</span>
          </label>
          <input type="text" name="address" required autocomplete="off"/>
        </div>

          <div class="field-wrap">
            <label>
              Resume<span class="req">*</span>
            </label>
            <input type="file" name='resume' required autocomplete="off"/>
          </div>
          <div class="field-wrap">
          <label>
            Certificate<span class="req">*</span>
          </label>
          <input type="file" name="certificate" required autocomplete="off"/>
        </div>

        <div class="field-wrap">
          <label>
            AAdhar<span class="req">*</span>
          </label>
          <input type="file" name="aadhar" required autocomplete="off"/>
        </div>


          <button class="button button-block" name="button"/>Log In</button>

          </form>





      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



    <script  src="js/index1.js"></script>




</body>

</html>
