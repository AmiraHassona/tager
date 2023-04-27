<?php
  session_start();
  include('connection.php');
  $username = $_POST['username'] ;
  $password = md5 ($_POST['password']) ;

  //validation

 $select_admin = "SELECT * FROM admins WHERE username ='$username' AND  password = '$password' ";
 $rsl_admin = $conn->query($select_admin);
 $row = $rsl_admin->fetch_assoc();
 $count_admin = $rsl_admin->num_rows; 

if($count_admin > 0){
    $_SESSION['user']= $row  ;
    // var_dump($row );
    header("location:../index.php");
}else{
    header("location:../login.php");
}
$conn->close();
?>