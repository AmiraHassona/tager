<?php include('design_website/header.php');
error_reporting(0);
  $id= $_GET['id'];
  $select_blog_row = "SELECT * FROM blog WHERE id =$id";
  $rsl_blog_row = $conn->query($select_blog_row);
  $blog_row=$rsl_blog_row ->fetch_assoc();

    $date = date_create($blog_row['date']);
    $date = date_format($date,"M-d-Y");

  $select_blog_cate = "SELECT id , cb_name FROM category_blog";
  $rsl_blog_cate = $conn->query($select_blog_cate);
  foreach($rsl_blog_cate  as $row_blog_cate){
  if($blog_row['category_blog_id'] == $row_blog_cate['id']){
?>
 

    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section">
      <?php include('design_website/header_top.php');?>
      <?php include('design_website/navbar.php');?>
    </header>
    <!-- Header End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog-details-inner">
                        <div class="blog-detail-title">
                            <h2><?=$blog_row['title']?></h2>
                            <p><?=$row_blog_cate['cb_name']?><span>- <?=$date?></span></p>
                        </div>
<?php
    }
 }
?>                         
                        <div class="blog-large-pic">
                            <?php 
                               $images = $blog_row['images'] ;
                               $image = explode(',',$images) ;
                                $random_value=array_rand($image);
                               
                            ?> 
                             <img  src="images/blogs/<?=$image[$random_value]?>" alt="<?=$blog_row['title']?>" height="600 rem"></br>

                        </div>
                        <div class="blog-detail-desc">
 <?php
 $detalis = $blog_row['detalis'];
 $detalis_array = explode(" ",$detalis);
 $array_count =round(count($detalis_array))/2;
 $start_blog_array = array_slice($detalis_array,0,$array_count );
 $start_blog = implode(' ',$start_blog_array);
 $end_blog_array = array_slice($detalis_array,$array_count );
 $end_blog = implode(' ',$end_blog_array);
 ?>                           
                            <p> <?=$start_blog?></p>
                        </div>
                        <div class="blog-quote">
                            <p>“<?=$blog_row['quote']?>” <span>- <?=$blog_row['author']?></span></p>
                        </div>
                        <div class="blog-more">
                            <div class="row">
                               <?php 
                               $images = $blog_row['images'] ;
                               $image = explode(',',$images) ;
                               foreach($image as $key => $value){
                               ?>  
                              <div class="col-sm-4" >
                                 <img  src="images/blogs/<?=$value?>" alt="<?=$blog_row['title']?>" width="100%"></br>
                              </div>   
                               <?php  
                                 }
                               ?>  
                            </div>
                        </div>
                        <p> <p> <?=$end_blog?></p></p>
                        <div class="tag-share">
                            <div class="details-tag">
                                <ul>
                                    <li><i class="fa fa-tags"></i></li>
<?php                                    
 $select_blog_cates = "SELECT id , cb_name FROM category_blog";
  $rsl_blog_cates = $conn->query($select_blog_cates);
  foreach($rsl_blog_cates  as $row_blog_cates){
?>                                       
                                    <li><?=$row_blog_cates['cb_name']?></li>
<?php
}
?>
                                </ul>
                            </div>
                            <div class="blog-share">
                                <span>Share:</span>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                    <a href="#"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="blog-post">
                            <div class="row">
                                <div class="col-lg-5 col-md-6">
                                    <a href="#" class="prev-blog">
                                        <div class="pb-pic">
                                            <i class="ti-arrow-left"></i>
                                            <img src="img/blog/prev-blog.png" alt="">
                                        </div>
                                        <div class="pb-text">
                                            <span>Previous Post:</span>
                                            <h5>The Personality Trait That Makes People Happier</h5>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-lg-5 offset-lg-2 col-md-6">
                                    <a href="#" class="next-blog">
                                        <div class="nb-pic">
                                            <img src="img/blog/next-blog.png" alt="">
                                            <i class="ti-arrow-right"></i>
                                        </div>
                                        <div class="nb-text">
                                            <span>Next Post:</span>
                                            <h5>The Personality Trait That Makes People Happier</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        

                    <div id="add_comment" > 
                   
<?php
$select_comments = "SELECT * FROM comments WHERE blog_id = $id ORDER BY id DESC LIMIT 5";
$rsl_comments = $conn->query($select_comments);
foreach($rsl_comments  as $row_comment){
    $user_id = $row_comment['user_id'];
    $select_user = "SELECT first_name,last_name,image FROM users WHERE id = $user_id";
    $rsl_user = $conn->query($select_user );
    $user_row = $rsl_user->fetch_assoc(); 
?>                       

                        <div class="posted-by " style="margin-bottom: 1rem;">
                            <div class="pb-pic">
                                <?php
                                if($user_row['image'] == null){
                                ?>
                                <img src="images/users/profile-picture.png" alt="" width="100rem" style="border-radius: 50%;">
                                <?php }else{ ?>
                                <img src="<?=$user_row['image']?>" alt="">
                                <?php } ?>    
                            </div>
                            <div class="pb-text">
                                <a href="#">
                                    <h5><?=$user_row['first_name']." ".$user_row['last_name']?></h5>
                                </a>
                                <p><?=$row_comment['comment']?></p>
                            </div>
                        </div>
<?php } ?>
                        </div>
                        <div class="leave-comment">
                            <h4>Leave A Comment</h4>
                            <form  class="comment-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <textarea placeholder="Comment" name="comment" id="comment" ></textarea>
                                        <?php
if(!isset($_SESSION['user_web'])){
?>    
                                      <a href="login.php" class="site-btn">Send comment</a>
<?php  
} else{
?>                                   
                                      <a  blog_id="<?=$id?>" class="site-btn send_comment">Send comment</a>
<?php } ?>                                         
                                      
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php include('design_website/footer.php');?>