<?php
include('config.php');

@session_start();

$email = $_SESSION['email'];

if(isset($_FILES['file']['name'])){

   /* Getting file name */
   $filename = $_FILES['file']['name'];

   /* Location */
   $location = "img/".$filename;
   $imageFileType = pathinfo($location,PATHINFO_EXTENSION);
   $imageFileType = strtolower($imageFileType);

   /* Valid extensions */
   $valid_extensions = array("jpg","jpeg","png","webp");

   $response = 0;
   /* Check file extension */
   if(in_array(strtolower($imageFileType), $valid_extensions)) {
      /* Upload file */
      if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
         echo $update_query = "UPDATE emp SET image = '$filename' WHERE email = '$email'" ;
         $query = mysqli_query($con, $update_query); 
         $response = $location;
      }
   }

   echo $response;
   exit;
}
?>