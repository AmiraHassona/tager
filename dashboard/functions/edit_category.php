<?php
   

   include('connection.php');

   $id=$_POST['id'];
   $cate_name = $_POST['c_name'] ;
   $status = $_POST['status'] ;


   $image = $_FILES['c_image'];
   $image_name =$image['name'];    
   $image_temp = $image['tmp_name'];
   $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
   $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
   $image_new_name =$image_without_extention.uniqid().".$image_extention";
   $image_new ="../../images/categories/$image_new_name";
   $move=move_uploaded_file($image_temp,$image_new);

   $select_info="SELECT id, c_image FROM categories WHERE id=$id ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $delete_image = $row_info['c_image'];
   
    if(!empty( $image_name)){
      unlink('../../images/categories/'.$delete_image);
      $update_image = "UPDATE categories SET c_image='$image_new_name' WHERE id = $id";
      $conn->query($update_image);
    }
   
    $update_row = "UPDATE categories SET c_name='$cate_name' , status='$status' WHERE id = $id";
    $conn->query($update_row);

     header("location:../category.php");
  

$conn->close();
?>