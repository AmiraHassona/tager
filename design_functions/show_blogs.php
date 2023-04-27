<?php
   session_start();
   
   include('connection.php');

   $blogs_id = $_POST['blogs_id'] ;
  

  
   $select_blogs= "SELECT  id ,title,images,date,category_blog_id  FROM blog WHERE category_blog_id = $blogs_id  ORDER BY id DESC LIMIT 4 ";
   $rsl_blogs = $conn->query($select_blogs);
   $rsl_blogs_count=$rsl_blogs->num_rows;
   if($rsl_blogs_count > 0){
   foreach($rsl_blogs as $row_blog){ 
       $images = $row_blog['images'] ;
       $image = explode(',',$images) ;
       $random_value=array_rand($image);  
       $blog_cate_id = $row_blog['category_blog_id'];
       $blog_cate_name = "SELECT * FROM category_blog WHERE id = $blog_cate_id";
       $rsl_blog_cate_name = $conn->query($blog_cate_name );
       $blog_cate_row =$rsl_blog_cate_name->fetch_assoc();
   
       $date = date_create($row_blog['date']);
       $date = date_format($date,"M-d-Y");
   
    echo'<div class="col-lg-6 col-sm-6">
    <div class="blog-item">
        <div class="bi-pic">
        <img  src="images/blogs/'.$image[$random_value].'" alt="'.$row_blog['title'].'" height="350 rem">
        </div>
        <div class="bi-text">
            <a href="blog-details.php?id='.$row_blog['id'].'">
                <h4>'.$row_blog['title'].'</h4>
            </a>
            <p>'.$blog_cate_row['cb_name'].'<span>-'.$date.'</span></p>
        </div>
    </div>
    </div>';                       
   }
}else{
    echo"SORY!.. No blogs Available";
}


$conn->close();
?>