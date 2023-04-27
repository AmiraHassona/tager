<?php
   

   include('connection.php');

   $id=$_GET['id'];
   
   $select_info="SELECT id, c_image FROM categories WHERE id=$id ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $delete_image = $row_info['c_image'];
   
   unlink('../../images/categories/'.$delete_image);
   

    $delete_row = "DELETE FROM categories  WHERE id = $id";
    $conn->query($delete_row);

     header("location:../category.php");
  

$conn->close();
?>