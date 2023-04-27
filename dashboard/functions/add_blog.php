<?php
   include('connection.php');

   $category_blog_id = $_POST['category_blog_id'] ;
   $title = $_POST['title'] ;
   $detalis =$conn->real_escape_string($_POST['detalis']) ;
   $quote =$conn->real_escape_string($_POST['quote']) ;
   $author = $_POST['author'] ;

   $image = $_FILES['images']['name'];

   $images_blog = [];
   foreach($image as $key => $value){
      $image_name = $_FILES['images']['name'][$key];    
      $image_temp = $_FILES['images']['tmp_name'][$key];
      $image_extention = pathinfo($image_name,PATHINFO_EXTENSION);
      $image_without_extention = pathinfo($image_name,PATHINFO_FILENAME);
      $image_new_name =$image_without_extention.uniqid().".$image_extention";
      $image_new ="../../images/blogs/$image_new_name";
      $move=move_uploaded_file($image_temp,$image_new);

       array_push($images_blog,$image_new_name );
   }
      
      $images = implode(',',$images_blog);

    $row = " INSERT INTO blog (title,detalis,quote,author,images, category_blog_id) VALUES ('$title','$detalis','$quote','$author','$images','$category_blog_id' )";

    $conn->query($row);

     header("location:../blog.php");
  

$conn->close();
?>