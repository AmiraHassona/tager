<?php
   

   include('connection.php');

   $id=$_POST['id'];
   $p_category = $_POST['p_category'] ;
   $p_name = $_POST['p_name'] ;
   $p_desc = $_POST['p_desc'] ;
   $p_price = $_POST['p_price'] ;
   $p_discount = $_POST['p_discount'] ;
   $p_stock = $_POST['p_stock'] ;
   
   $image = $_FILES['p_image'];
   $image_name =$image['name'];    
   $image_temp = $image['tmp_name'];
   $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
   $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
   $image_new_name =$image_without_extention.uniqid().".$image_extention";
   $image_new ="../../images/products/$image_new_name";
   $move=move_uploaded_file($image_temp,$image_new);

   $select_info="SELECT id, p_image FROM products WHERE id=$id ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $delete_image = $row_info['p_image'];
   
    if(!empty( $image_name)){
      unlink('../../images/products/'.$delete_image);
      $update_image = "UPDATE products SET p_image='$image_new_name' WHERE id = $id";
      $conn->query($update_image);
    }

   
    $update_row = "UPDATE products SET p_name='$p_name', p_price='$p_price', p_discount='$p_discount', p_desc='$p_desc', p_stock='$p_stock', id_category='$p_category' WHERE id = $id";
    $conn->query($update_row);

     header("location:../product.php");
  

$conn->close();
?>