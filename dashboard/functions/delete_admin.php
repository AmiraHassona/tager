<?php
   

   include('connection.php');

   $id=$_GET['id'];

   $select_info="SELECT id, image FROM admins WHERE id=$id ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $delete_image = $row_info['image'];
   unlink('../../images/admins/'.$delete_image);
   
    $delete_row = "DELETE FROM admins  WHERE id = $id";
    $conn->query($delete_row);

     header("location:../index.php");
  

$conn->close();
?>