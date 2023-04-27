<?php
   session_start();
   
   include('connection.php');

   $comment  = $conn->real_escape_string($_POST['comment']);
   $blog_id  = $_POST['blog_id'] ;
   $user_id  = $_SESSION['user_web']['id'];
  
  
   
   

    $row = "INSERT INTO comments (comment,blog_id,user_id) VALUES ('$comment','$blog_id','$user_id')";
    $comment_row = $conn->query($row);
    //var_dump($message_row);

    if ($comment_row ){ 
      $select_new_comment = "SELECT * FROM comments WHERE blog_id = $blog_id ORDER BY id DESC LIMIT 1 ";
      $rsl_new_comment = $conn->query($select_new_comment);
      $row_new_comment=$rsl_new_comment->fetch_assoc(); 
          $user_new_id = $row_new_comment['user_id'];
          $select_new_user = "SELECT first_name,last_name,image FROM users WHERE id = $user_new_id";
          $rsl_new_user = $conn->query($select_new_user );
          $user_new_row =$rsl_new_user->fetch_assoc();
           $imade= $user_new_row["image"];
           $first_name =$user_new_row["first_name"];
           $last_name  =$user_new_row["last_name"];
           $new_comment=$row_new_comment["comment"];
     
           echo'<div class="posted-by"  style="margin-bottom: 1rem;">
           <div class="pb-pic">
           <?php
           if('.$imade.' == null){
           ?>
           <img src="images/users/profile-picture.png" alt="" width="100rem" style="border-radius: 50%;">
           <?php }else{ ?>
           <img src="'.$imade.'" alt="">
           <?php } ?>
           </div>
           <div class="pb-text">
               <a href="#">
                   <h5>'.$first_name.'&nbsp;&nbsp;'.$last_name.'</h5>
               </a>
               <p>'.$new_comment.'</p>
           </div>
           </div>';
            
    }
    
  

$conn->close();
?>