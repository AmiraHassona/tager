<?php
   

   include('connection.php');

   $id=$_POST['id'];
   $cate_name = $_POST['cb_name'] ;
  
   
    $update_row = "UPDATE category_blog SET cb_name='$cate_name' WHERE id = $id";
    $conn->query($update_row);

     header("location:../category_blog.php");
  

$conn->close();
?>