<?php
  
   session_start();
   include('connection.php');

   $id  = $_SESSION['user_web']['id'] ;
   $first_name = $_POST['first_name'] ;
   $last_name = $_POST['last_name'] ;
   $email = $_POST['email'] ;


    if ($_POST['first_name'] == null) {
    $select_first_name = "SELECT first_name FROM users WHERE id = $id ";
    $rsl_first_name = $conn->query($select_first_name);
    $first_name_row = $rsl_first_name->fetch_assoc();
    $first_name = $first_name_row['first_name'];
    }else{
    $first_name = $_POST['first_name'];
    }
 
    if ($_POST['last_name'] == null) {
    $select_last_name = "SELECT last_name FROM users WHERE id = $id ";
    $rsl_last_name = $conn->query($select_last_name);
    $last_name_row = $rsl_last_name->fetch_assoc();
    $last_name = $last_name_row['last_name'];
    }else{
    $last_name =$_POST['last_name'];
    }

    if ($_POST['password'] == null) {
     $select_password = "SELECT password FROM users WHERE id = $id ";
     $rsl_password = $conn->query($select_password);
     $password_row= $rsl_password->fetch_assoc();
     $password =$password_row['password'];
    }else{
     $password = md5($_POST['password']) ;
    }
   

    if ($_POST['email'] == null) {
    $select_email_current = "SELECT email FROM users WHERE id = $id ";
    $rsl_email_current = $conn->query($select_email_current);
    $email_current_row = $rsl_email_current->fetch_assoc();
    $email = $email_current_row['email'];
    }else{
    $email = $_POST['email'];
    }



    $image = $_POST['image'];
    $image_name =$image['name'];    
    $image_temp = $image['tmp_name'];
    $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
    $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
    $image_new_name =$image_without_extention.uniqid().".$image_extention";
    $image_new ="images/users/$image_new_name";
    $move=move_uploaded_file($image_temp,$image_new);
 
    $select_info="SELECT id , image FROM users WHERE id=$id ";
    $rslt_info=$conn->query($select_info);
    $row_info=$rslt_info->fetch_assoc();
    $delete_image = $row_info['image'];
    
 
     if(!empty( $image_name)){
       if ( $row_info['image'] != null) {
       unlink('images/users/'.$delete_image);
        }
       $update_image = "UPDATE users SET image='$image_new_name' WHERE id = $id";
       $conn->query($update_image);
     }
 
   
   


   $select_email = "SELECT email FROM users WHERE email ='$email' AND id != $id";
   $rsl_email = $conn->query($select_email);
   $row_email = $rsl_email->fetch_assoc();
   $count_email = $rsl_email->num_rows;
   
   if($count_email > 0){

       echo "email already exists";

   }else{
       $row = "UPDATE users SET first_name='$first_name',last_name='$last_name',password='$password', email='$email' WHERE id = $id";
       $user_row = $conn->query($row);

       if ($user_row ){
         echo ""; 
       }
   } 

$conn->close();
?>