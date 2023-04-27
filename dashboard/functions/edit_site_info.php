<?php
   

   include('connection.php');

   $site_name = $_POST['site_name'] ;
   $site_email = $_POST['site_email'] ;
   $site_phone = $_POST['site_phone'] ;
   $site_address = $_POST['site_address'] ;
   $site_location = $_POST['site_location'] ;
   $site_facebook = $_POST['site_facebook'] ;
   $site_twitter = $_POST['site_twitter'] ;
   $site_instagram = $_POST['site_instagram'] ;
   $site_pinterest = $_POST['site_pinterest'] ;
   
   $image = $_FILES['site_image'];
   $image_name =$image['name'];    
   $image_temp = $image['tmp_name'];
   $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
   $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
   $image_new_name =$image_without_extention.uniqid().".$image_extention";
   $image_new ="../../images/site_info/$image_new_name";
   $move=move_uploaded_file($image_temp,$image_new);

   $select_info="SELECT site_image FROM side_info WHERE id='1' ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $delete_image = $row_info['site_image'];

    if(!empty( $image_name)){
      unlink('../../images/site_info/'.$delete_image);
      $update_image = "UPDATE side_info SET site_image='$image_new_name' WHERE id='1' ";
      $conn->query($update_image);  
    }

   
    $update_row = "UPDATE side_info SET site_name='$site_name',site_email='$site_email', site_phone='$site_phone',site_address='$site_address',site_location='$site_location', site_facebook='$site_facebook',site_twitter='$site_twitter',site_instagram='$site_instagram',site_pinterest='$site_pinterest'";
    $conn->query($update_row);

     header("location:../site_info.php");
  
$conn->close();
?>