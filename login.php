<!DOCTYPE html>
<?php
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


        if($count == 1)
        {
           $_SESSION['login_user'] = $email;
           header("Location: index.html");
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



        if($count == 1)
        {
           $_SESSION['login_user'] = $email;
           header("Location: index.html");
        }
      }

    }
      if($count<=0)
      {
         $error = '<span style="color:red;text-align:center;">Your Login Name or Password is invalid';
      }

?>

<html lang="en" >

<head>
  <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>Login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/login.css">


</head>

<body>

    <div class="login-form col-sm-12 col-md-6 col-md-offset-4">
    <form  method="post" action="">
     <h1 >Login</h1>
     <div class="form-group ">
       <input type="email" name="email"  aria-describedby="email" placeholder="E-mail" id="email" required>
       <i class="fa fa-user"></i>
     </div>
     <div class="form-group log-status">
       <input type="password" name="password"  id="password" placeholder="Password">
       <i class="fa fa-lock"></i>
     </div>

     <div style="text-align:center;">  <span><?php echo $error; ?></span></div>


     <button type="submit" name="login" class="log-btn" >Log in</button>

<p class="message">Not registered? <a href="#">Create an account</a></p>

</form>
   </div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script  src="js/login.js"></script>




</body>

</html>
