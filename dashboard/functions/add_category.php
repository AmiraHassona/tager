<?php
   include('connection.php');
   $c_name = $_POST['c_name'] ;
   $status = $_POST['status'] ;
   
   $image = $_FILES['c_image'];
   $image_name =$image['name'];    
   $image_temp = $image['tmp_name'];
   $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
   $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
   $image_new_name =$image_without_extention.uniqid().".$image_extention";
   $image_new ="../../images/categories/$image_new_name";
   $move=move_uploaded_file($image_temp,$image_new);

    $row = "INSERT INTO categories (c_name,c_image,status)
    VALUES ('$c_name','$image_new_name','$status')";
    $conn->query($row);

    header("location:../category.php");
  

$conn->close();
?>