<?php
   session_start();
   
   include('connection.php');

   $product_id  = $_POST['product_id'] ;
   $user_id  = $_SESSION['user_web']['id'];
   $stars_rate  = $_POST['stars_rate'] ;
   $comment  = $conn->real_escape_string($_POST['comment']);
   

    $row = "INSERT INTO rate (product_id,user_id,rate,comment) VALUES ('$product_id','$user_id','$stars_rate','$comment')";
    $comment_row = $conn->query($row);
    //var_dump($message_row);

    if ($comment_row ){ 
        $select_comments = "SELECT * FROM rate WHERE product_id =$product_id  ORDER BY id DESC LIMIT 1";
        $rsl_comments = $conn->query($select_comments);
        $row_comment=$rsl_comments->fetch_assoc();
        $date = date_create($row_comment['created_at']);
        $date = date_format($date,"d-M-Y");
        $user_id = $row_comment['user_id'];
        $select_user = "SELECT first_name,last_name,image FROM users WHERE id = $user_id";
        $rsl_user = $conn->query($select_user );
        $user_row =$rsl_user->fetch_assoc(); 
          
        
$stars = ' ';  
for ($i=1; $i <= $row_comment['rate']; $i++) { 
  $stars .= '<i class="fa fa-star"></i>&nbsp;'; 
}
for ($i=++$row_comment['rate']; $i <= 5 ; $i++) { 
  $stars .= '<i class="fa fa-star-o"></i>&nbsp;'; 
}

$image = ' ';
if($user_row["image"] == null){
  $image = '<img src="images/users/profile-picture.png" alt=""    width="100rem"style="border-radius: 50%;">';
}else{ 
  $image = '<img src="$user_row["image"]" alt="">' ;
} 

        echo'<div class="co-item">
        <div class="avatar-pic">
           '.$image.'
        </div>
        <div class="avatar-text">
            <div class="at-rating">
             '.$stars.'                          
            </div>
            <h5>'.$user_row['first_name']." ".$user_row['last_name'].'<span>'.$date.'</span></h5>
           <div class="at-reply">'.$row_comment['comment'].'</div>
        </div>
        </div>'; 
 
              
    }
    
$conn->close();
?>