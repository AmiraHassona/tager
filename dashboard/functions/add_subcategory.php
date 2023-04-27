<?php
   include('connection.php');
   $sc_name = $_POST['sc_name'] ;
   $sc_icon = $_POST['sc_icon'] ;
   $sc_status = $_POST['sc_status'] ;
   $cate_name = $_POST['cate_name'] ;
   
   

    $row = "INSERT INTO subcategories (sc_name,sc_icon,sc_status,id_category)
    VALUES ('$sc_name','$sc_icon','$sc_status','$cate_name')";
    $conn->query($row);

    header("location:../subcategory.php");
  

$conn->close();
?>