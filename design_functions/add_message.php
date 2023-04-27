<?php
   session_start();
   
   include('connection.php');

   $username = $_POST['username'] ;
   $email    = $_POST['email'] ;
   $m_title  = $_POST['m_title'] ;
   $message  = $conn->real_escape_string($_POST['message']);
  
   
   

    $row = "INSERT INTO messages (username, email, m_title, message) VALUES ('$username','$email','$m_title','$message')";
    $message_row = $conn->query($row);
    //var_dump($message_row);

    if ($message_row ){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>DONE!</strong> The message has been sent successfully
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
      </button>
       </div>";
    }
    
  

$conn->close();
?>