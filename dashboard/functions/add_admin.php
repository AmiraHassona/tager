<?php
   include('connection.php');
   $username = $_POST['username'] ;
   $password = md5 ($_POST['password']) ;
   $role = $_POST['role'] ;
   
   $image = $_FILES['image'];
   $image_name =$image['name'];    
   $image_temp = $image['tmp_name'];
   $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
   $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
   $image_new_name =$image_without_extention.uniqid().".$image_extention";
   $image_new ="../../images/admins/$image_new_name";
   $move=move_uploaded_file($image_temp,$image_new);

    $row = "INSERT INTO admins (username, password , role ,image)
    VALUES ('$username', '$password', '$role' ,'$image_new_name')";
    $conn->query($row);

     header("location:../index.php");
  

$conn->close();
?>