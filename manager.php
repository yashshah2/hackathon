<?php
session_start();
require 'db_connect.php';
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Manager</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

        <li> <a href="logout.php" class="btn btn-danger">Logout</a>
        </ul>
      </div>
    </nav>
    <div class="container" id="req">
         <div class="row">
           <div class="col-md-4">
       <h4>Employee details of request:</h4>
   </div>

         <div class="col-md-8  text-right ftco-animate">


         </div>
       </div>
      <table id="cook" class="table table-striped table-bordered" style="width:100%;">
            <thead>
                <tr>
                    <th></th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>address</th>
                    <th>aadhar</th>
                    <th>DOB</th>
                    <th>certificate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
      <?php

      $presentCompanyID =   $_SESSION['presentCompanyID'];
      $sql = "SELECT * FROM notification WHERE appliedID='$presentCompanyID' AND status=1";
      $result = mysqli_query($connection,$sql);

        while (  $row = mysqli_fetch_assoc($result)) {
          $EID = $row['EID'];
            $sql = "SELECT * from employee WHERE ID = '$EID'";
            $res = mysqli_query($connection,$sql);
            $details = mysqli_fetch_assoc($res);

            echo  "<tr>";

            echo  "<form class='' action='approve.php' method='post'>";

            echo "<td><input type='radio' name='EID' value='".$details["ID"]."' required></td>";

            echo "<td>".$details["ID"]."</td>";

            echo "<td>".$details["name"]."</td>";

            echo "<td>".$details["mobile"]."</td>";

            echo "<td>".$details["address"]."</td>";

            echo "<td><a href='".$details["aadhar"]."'>Download</a></td>";

            echo "<td>".$details["dob"]."</td>";

            echo "<input type='hidden' name='previousCompanyId' value = ".$details["presentComanyId"].">";

            echo "<td><a href='".$requestDetails["certificate"]."'>Download</a></td>";

            echo "<td><button type = 'submit' >Approve Job</button></td>";
            echo  "</form>";

            echo "</tr>";

            // echo $details['certificate'];
        }

       ?>
     </form>
   </tbody>


   </table>

    </div>

    <div class="container" id="Leaving">
         <div class="row">
           <div class="col-md-4">
       <h4>Employee details of Leaving:</h4>
   </div>

         <div class="col-md-8  text-right ftco-animate">


         </div>
       </div>
      <table id="cook1" class="table table-striped table-bordered " >
            <thead>
                <tr>
                    <th></th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>address</th>
                    <th>aadhar</th>
                    <th>DOB</th>
                    <th>certificate</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $sql = "SELECT * from employee WHERE presentComanyId = '$presentCompanyID'";
                $res = mysqli_query($connection,$sql);

                while ($requestDetails = mysqli_fetch_assoc($res)) {
                  $ID=$requestDetails["ID"];
                  $query = "SELECT * FROM notification WHERE EID = '$ID' AND status = 0";
                  $queryResult = mysqli_query($connection,$query);
                  $count = mysqli_num_rows($queryResult);

                  if($count > 0){
                    echo  "<tr>";
                    echo  "<form class='' action='managerLeavingRequestProcess.php' method='post' enctype='multipart/form-data'>";

                    echo "<td><input type='radio' name='EID' value='".$requestDetails["ID"]."' required></td>";

                    echo "<td>".$requestDetails["ID"]."</td>";

                    echo "<td>".$requestDetails["name"]."</td>";

                    echo "<td>".$requestDetails["mobile"]."</td>";

                    echo "<td>".$requestDetails["address"]."</td>";

                    echo "<td><a href='".$details["aadhar"]."'>Download</a></td>";

                    echo "<td>".$requestDetails["dob"]."</td>";

                    echo "<td><a href='".$requestDetails["certificate"]."'>Download</a><input type='file' name='certificate' required></td>";

                    echo "<td><input type = 'submit' value='Verify'></td>";
                    echo  "</form>";
                    echo "</tr>";

                  }

                }
                 ?>

            </tbody>


            </table>


    </div>
  </body>
</html>

<script type="text/javascript">
$(document).ready(function() {
  $('#cook').DataTable();
  $('#cook1').DataTable();
} );
</script>
<script type="text/javascript">
  $("")
</script>
