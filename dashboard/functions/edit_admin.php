<?php
   

   include('connection.php');

   $id=$_POST['id'];
   $username = $_POST['username'] ;
   $role = $_POST['role'] ;
   
   $image = $_FILES['image'];
   $image_name =$image['name'];    
   $image_temp = $image['tmp_name'];
   $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
   $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
   $image_new_name =$image_without_extention.uniqid().".$image_extention";
   $image_new ="../../images/admins/$image_new_name";
   $move=move_uploaded_file($image_temp,$image_new);

   $select_info="SELECT id, image FROM admins WHERE id=$id ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $delete_image = $row_info['image'];
   

    if(!empty( $image_name)){
      unlink('../../images/admins/'.$delete_image);
      $update_image = "UPDATE admins SET image='$image_new_name' WHERE id = $id";
      $conn->query($update_image);
    }


    $select_password = "SELECT password FROM admins WHERE id = $id";
    $rsl_password= $conn->query($select_password);
    $admin_password_row =$rsl_password->fetch_assoc();
    $password_old=$admin_password_row['password'];
    $password_new = $_POST['password'] ;
    
    if($password_old != $password_new ){
      $password = md5($password_new );
      $update_password = "UPDATE admins SET password='$password' WHERE id = $id";
      $conn->query($update_password);
    }

    $update_row = "UPDATE admins SET username='$username' , role='$role' WHERE id = $id";
    $conn->query($update_row);

     header("location:../index.php");
  

$conn->close();
?>