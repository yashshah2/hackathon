<!DOCTYPE html>
<html lang="en" >
<?php
  if(isset($_POST['login'])){
   include 'db_connect.php';
   function Validate($data){
     $data= trim($data);
     $data = stripslashes($data);
     $data=htmlspecialchars($data);
     return $data;
   }
   session_start();
   $error='';
   $count=0;
   if (isset($_SESSION['login_user'])) {
     header("Location:index.html");
   }
   if($_SERVER["REQUEST_METHOD"] == "POST")
   {
      // username and password sent from form
      $email = Validate($_POST['email']);
      $password = $_POST['password'];

      $query1 = "SELECT * FROM employee WHERE email='$email' " ;
      $employee = mysqli_query($connection,$query1);
      $row1 = mysqli_fetch_array($employee,MYSQLI_ASSOC);
      $count1 = mysqli_num_rows($employee);

      $query2 = "SELECT * FROM manager WHERE email='$email' " ;
      $manager = mysqli_query($connection,$query2);
      $row2 = mysqli_fetch_array($manager,MYSQLI_ASSOC);
      $count2 = mysqli_num_rows($manager);



      if($count1 == 1)
      {
        $sql = "SELECT *
        FROM employee
        WHERE email ='$email' AND password= '$password'";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['id'];
        $count = mysqli_num_rows($result);
        //$_SESSION['category']=$category;
        $_SESSION['ID']=$row['ID'];
        $_SESSION['name']=$row['name'];
        $_SESSION['mobile']=$row['mobile'];
        $_SESSION['address']=$row['address'];
        $_SESSION['presentCompanyID'] = $row['presentComanyId'];

        if($count == 1)
        {
           $_SESSION['login_user'] = $email;
           header("Location: employee.php");
        }
      }
      if($count2 == 1)
      {
        $sql = "SELECT *
        FROM manager
        WHERE email ='$email' AND password= '$password'";
        $result = mysqli_query($connection,$sql);
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['id'];
        $count = mysqli_num_rows($result);
        //$_SESSION['category']=$category;
        $_SESSION['ID']=$row['ID'];
        $_SESSION['name']=$row['name'];
        $_SESSION['mobile']=$row['mobile'];
        $_SESSION['presentCompanyID'] = $row['companyID'];



        if($count == 1)
        {
           $_SESSION['login_user'] = $email;
           header("Location: manager.php");
        }
      }

    }
      if($count<=0)
      {
         $error = '<span style="color:red;text-align:center;">Your Login Name or Password is invalid';
      }
    }
    else if(isset($_POST['signup'])){
      require 'db_connect.php';

      $sql = "SELECT * FROM company";
      $res = mysqli_query($connection,$sql);

      $name = $_POST['name'];
      $role=$_POST['role'];
      $password = $_POST['password'];
  $mobile = $_POST['mobile'];
      $email = $_POST['email'];
      function generate($string1,$string2){
        $sub1 = substr($string1,0,3);
        $sub2 = substr($string2,0,3);
        return $sub1.$sub2;
      }

      $ID = generate($name,$mobile);


      if($role == False){
      	// header("Location: administrate.php?success=false");
      }else if($role=='E'){
        //$sql = "INSERT INTO employee(ID,name,password,mobile,email) VALUES ('$ID', '$name', '$password','$mobile','$email')";
//$res = mysqli_query($connection, $sql);
 session_start();
  $_SESSION['ID']=$ID;
  $_SESSION['name']=$name;

  $_SESSION['password']=$password;
  $_SESSION['mobile']=$mobile;
  $_SESSION['email']=$email;

      	 header("Location:comEmpProf.php");
      }
      else if($role=='M'){
        //$sql = "INSERT INTO employee(ID,name,password,mobile,email) VALUES ('$ID', '$name', '$password','$mobile','$email')";
//$res = mysqli_query($connection, $sql);
 session_start();

  $_SESSION['name']=$name;

  $_SESSION['password']=$password;
  $_SESSION['mobile']=$mobile;
  $_SESSION['email']=$email;

      	 header("Location:comManProf.php");
      }
    }

?>

<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


      <link rel="stylesheet" href="css/style1.css">


</head>

<body>

  <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#login">Log In</a></li>
        <li class="tab"><a href="#signup">Sign Up</a></li>

      </ul>

      <div class="tab-content">
        <div id="login">


          <form action="" method="post">

            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input name="email" id="email" type="email"required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input  name="password"  id="password" type="password"required autocomplete="off"/>
          </div>

          <p class="forgot"><a href="#">Forgot Password?</a></p>

          <button name="login" class="button button-block"/>Log In</button>

          </form>

        </div>
        <div id="signup">


          <form action="" method="post">


            <div class="field-wrap">
              <label>
               Name<span class="req">*</span>
              </label>
              <input type="text" name="name" required autocomplete="off" />
            </div>




          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" name="email"required autocomplete="off"/>
          </div>
          <div class="field-wrap">
            <label>
              Contact no<span class="req">*</span>
            </label>
            <input type="number" name="mobile" required autocomplete="off"/>
          </div>

          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"  name="password" required autocomplete="off"/>
          </div>

                    <div class="field-wrap" style="text-align:center;">
          <select name="role" >

	           <option value="">Select your role</option>

	            <option value="M">Manager</option>

	             <option value="E">Employee</option>

	            </select>
</div>
          <button type="submit" name="signup" class="button button-block"/>Get Started</button>

          </form>

        </div>



      </div><!-- tab-content -->

</div> <!-- /form -->
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>



    <script  src="js/index1.js"></script>




</body>

</html>
