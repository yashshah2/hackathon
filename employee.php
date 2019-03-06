<?php
session_start();
require 'db_connect.php';
if (!isset($_SESSION['login_user'])) {
  header("Location:login.php");
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js" charset="utf-8"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" charset="utf-8"></script>
  </head>
  <body>
    <nav  class="navbar navbar-light" style="background-color: #e3f2fd;">
     <div class="container-fluid">
       <div class="navbar-header">
         <a class="navbar-brand" href="#">empSecure</a>
       </div>
       <ul class="nav navbar-nav">


           <a href="logout.php" class="btn btn-danger">Logout</a>
       </ul>
     </div>
   </nav>
   <div class="container">
    <div class="row">


    <div class="col-md-12  text-right ftco-animate">


    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <table id="table" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Company Name</th>
                    <th>Company Id</th>
                    <th>action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>


                <?php
                $sql = "SELECT * FROM company";
                $result = mysqli_query($connection,$sql);

                while ($company = mysqli_fetch_assoc($result)) {

                echo  "<tr>";
                echo    "<td>".$company["name"]."</td>";

                echo    "<td>".$company["ID"]."</td>";
                echo     "<form class='' action='employeeApply.php' method='post'>";
                echo    "<td><input type='radio' name='companyID' value='".$company["ID"]."' required></td>";
                echo "<td><input type='submit' name='' value='APPLY'/></td>";
                echo "</form>";
                echo  "</tr>";

                }
                 ?>

                  <!-- <input type="submit" name="" value="APPLY"/> -->

            </tbody>
            </table>

    </div>

        </div>
      </div>


      <div class="container">
       <div class="row">


       <div class="col-md-12  text-right ftco-animate">


       </div>
     </div>
     <div class="row">
       <div class="col-md-12">
            <h4>Select company:</h4>

            <table id="table1" class="table table-striped table-bordered" style="width:100%;" >
                  <thead>
                      <tr>
                          <th></th>
                          <th>Company Name</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
            <?php

            $EID =   $_SESSION['ID'];
            $sql = "SELECT * FROM notification WHERE EID='$EID' AND status=2";
            $result = mysqli_query($connection,$sql);

              while (  $row = mysqli_fetch_assoc($result)) {
                $appliedID = $row['appliedID'];
                  $sql = "SELECT * from company WHERE ID = '$appliedID'";
                  $res = mysqli_query($connection,$sql);
                  $company = mysqli_fetch_assoc($res);

                  echo  "<tr>";

                  echo  "<form class='' action='select.php' method='post'>";

                  echo    "<td><input type='radio' name='companyID' value='".$company["ID"]."' required></td>";

                  echo    "<td>".$company["name"]."</td>";

                  echo "<td><input type='submit' name='' value='APPLY'/></td>";

                  echo  "</form>";

                  echo "</tr>";

                  // echo $details['certificate'];
              }

             ?>
         </tbody>


         </table>
       </div>

           </div>
         </div>

  </body>
</html>
<script type="text/javascript">
$(document).ready(function() {
  $('#table1').DataTable();
  $('#table').DataTable();

} );
</script>
