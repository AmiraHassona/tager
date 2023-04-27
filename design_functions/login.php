<?php
  session_start();
  include('connection.php');
  $email = $_POST['email'] ;
  $password = md5 ($_POST['password']) ;

  //validation

 $select_user = "SELECT * FROM users WHERE email ='$email' AND  password = '$password' ";
 $rsl_user = $conn->query($select_user);
 $row = $rsl_user->fetch_assoc();
 $count_user = $rsl_user->num_rows; 

if($count_user > 0){
    $_SESSION['user_web']= $row  ;
    // var_dump($row );
    header("location:../index.php");
}else{
    header("location:../login.php");
}
$conn->close();
?>