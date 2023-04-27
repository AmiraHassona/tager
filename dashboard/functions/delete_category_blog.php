<?php
   

   include('connection.php');

   $id=$_GET['id'];
   
    $delete_row = "DELETE FROM category_blog  WHERE id = $id";
    $conn->query($delete_row);

     header("location:../category_blog.php");
  

$conn->close();
?>