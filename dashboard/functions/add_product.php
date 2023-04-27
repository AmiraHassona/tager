<?php
   include('connection.php');

   $p_category = $_POST['p_category'] ;
   $p_name = $_POST['p_name'] ;
   $p_desc = $_POST['p_desc'] ;
   $p_price = $_POST['p_price'] ;
   if($_POST['p_discount'] == 0){
      $p_discount = $_POST['p_price'];
   }else{
      $p_discount = $_POST['p_discount'] ;
   } 
   $p_stock = $_POST['p_stock'] ;
   
   $image = $_FILES['p_image'];
   $image_name =$image['name'];    
   $image_temp = $image['tmp_name'];
   $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
   $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
   $image_new_name =$image_without_extention.uniqid().".$image_extention";
   $image_new ="../../images/products/$image_new_name";
   $move=move_uploaded_file($image_temp,$image_new);

    $row = "INSERT INTO products (p_name, p_price, p_discount, p_image, p_desc, p_stock , id_category) VALUES ('$p_name','$p_price','$p_discount','$image_new_name','$p_desc','$p_stock','$p_category' )";
    $conn->query($row);

     header("location:../product.php");
  

$conn->close();
?>