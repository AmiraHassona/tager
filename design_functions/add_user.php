<?php
  
   
   include('connection.php');

   $first_name = $_POST['first_name'] ;
   $last_name = $_POST['last_name'] ;
   $email = $_POST['email'] ;
   $password = md5($_POST['password']) ;
  
 
   $select_email = "SELECT email FROM users WHERE email ='$email' ";
   $rsl_email = $conn->query($select_email);
   $count_email = $rsl_email->num_rows;
   
   if($count_email > 0){

       echo "email already exists";

   }else{
       $row = "INSERT INTO users (first_name,last_name,email,password )
       VALUES ('$first_name','$last_name','$email','$password')";
       $user_row = $conn->query($row);

       if ($user_row ){
         $user_auth = $first_name;
         echo "$user_auth"; 
       }
   } 

$conn->close();
?>