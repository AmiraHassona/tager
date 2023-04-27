<?php
   

   include('connection.php');

   $id=$_GET['id'];
   $select_info="SELECT id, images FROM blog WHERE id=$id ";
   $rslt_info=$conn->query($select_info);
   $row_info=$rslt_info->fetch_assoc();
   $images = $row_info['images'];

   $image = explode(',',$images) ;
   foreach($image as $key => $value){
     
      unlink('../../images/blogs/'.$value);
   
   }
 
    $delete_row = "DELETE FROM blog WHERE id = $id";
    $conn->query($delete_row);

     header("location:../blog.php");
  

$conn->close();
?>