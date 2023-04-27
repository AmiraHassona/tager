<?php
   include('connection.php');

   $id=$_POST['id'];
   $title = $_POST['title'] ;
   $detalis = $_POST['detalis'] ;
   $quote =$conn->real_escape_string($_POST['quote']) ;
   $author = $_POST['author'] ;
   $category_blog_id = $_POST['category_blog_id'] ;
   
   $image = $_FILES['images']['name'];
   var_dump($image);

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

    $select_info="SELECT id, images FROM blog WHERE id=$id ";
    $rslt_info=$conn->query($select_info);
    $row_info=$rslt_info->fetch_assoc();
    $image = $row_info['images'];
    $image = explode(',',$images) ;

    if(!empty( $image)){
        foreach($image as $key => $value){
          if(in_array($value,$images_blog)){
           unlink('../../images/blogs/'.$value);
          }
        }  

    $update_image = "UPDATE blog SET images='$images' WHERE id = $id";
    $conn->query($update_image);
    }
  
   

    $update_row = "UPDATE blog SET title='$title', detalis='$detalis',quote='$quote',author='$author',category_blog_id='$category_blog_id' WHERE id = $id";
    $conn->query($update_row);

     header("location:../blog.php");
  

$conn->close();
?>