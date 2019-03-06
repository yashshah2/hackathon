
<?php

require 'db_connect.php';

$sql = "SELECT * FROM company";
$res = mysqli_query($connection,$sql);
session_start();

$name = $_SESSION['name'];
$password = $_SESSION['password'];
$mobile = $_SESSION['mobile'];
$email= $_SESSION['email'];
if(isset($_POST['button'])){




  $companyName = $_POST['cname'];



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

          <form action="" method="post">

            <div class="field-wrap">
            <label>
            Company Name<span class="req">*</span>
            </label>
            <input type="text" name="cname" required autocomplete="off"/>
          </div>

        


          <button class="button button-block" name="button"/>Log In</button>

          </form>





      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



    <script  src="js/index1.js"></script>




</body>

</html>
