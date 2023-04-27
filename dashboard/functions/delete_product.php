<?php
   

   include('connection.php');

   $id=$_GET['id'];
   $select_info="SELECT id, p_image FROM products WHERE id=$id ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $delete_image = $row_info['p_image'];
   
   unlink('../../images/products/'.$delete_image);
   

    $delete_row = "DELETE FROM products  WHERE id = $id";
    $conn->query($delete_row);

     header("location:../product.php");
  

$conn->close();
?>