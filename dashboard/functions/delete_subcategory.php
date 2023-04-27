<?php
   

   include('connection.php');

   $id=$_GET['id'];
   
    $delete_row = "DELETE FROM subcategories  WHERE id = $id";
    $conn->query($delete_row);

     header("location:../subcategory.php");
  

$conn->close();
?>