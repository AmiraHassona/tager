<?php
   include('connection.php');
   $cb_name = $_POST['cb_name'] ;
   

    $row = "INSERT INTO category_blog (cb_name)
    VALUES ('$cb_name')";
    $conn->query($row);

    header("location:../category_blog.php");
  

$conn->close();
?>