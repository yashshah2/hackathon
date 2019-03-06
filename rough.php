<?php
   if(isset($_FILES['certificate'])){
      $errors= array();
      $file_name = $_FILES['certificate']['name'];
      $file_tmp =$_FILES['certificate']['tmp_name'];
      // $file_ext=strtolower(end(explode('.',$_FILES['certificate']['name'])));
      //
      // $extensions= array("jpeg","jpg","png");
      //
      // if(in_array($file_ext,$extensions)=== false){
      //    $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      // }
      //
      // if($file_size > 2097152){
      //    $errors[]='File size must be excately 2 MB';
      // }

      // if(empty($errors)==true){
         move_uploaded_file($file_tmp,"uploads/".$file_name);
         // echo "Success";
      // }else{
         // print_r($errors);
      // }
   }
?>
<html>
   <body>

      <form action="" method="POST" enctype="multipart/form-data">
         <input type="file" name="certificate" />
         <input type="submit"/>
      </form>

   </body>
</html>
