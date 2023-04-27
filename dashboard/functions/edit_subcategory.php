<?php
   include('connection.php');

   $id=$_POST['id'];
   $sc_name = $_POST['sc_name'] ;
   $sc_icon = $_POST['sc_icon'] ;
   $sc_status = $_POST['sc_status'] ;
   $id_category = $_POST['id_category'] ;

   
   
    $update_row = "UPDATE subcategories SET sc_name='$sc_name' , sc_icon='$sc_icon' , sc_status='$sc_status',id_category='$id_category'  WHERE id = $id";
    $conn->query($update_row);

     header("location:../subcategory.php");
  

$conn->close();
?>