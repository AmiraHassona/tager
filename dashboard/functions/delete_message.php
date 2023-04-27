<?php
   

   include('connection.php');

    $id=$_GET['id'];
   
    $delete_row = "DELETE FROM messages  WHERE id = $id";
    $conn->query($delete_row);

     header("location:../message.php");
  

$conn->close();
?>