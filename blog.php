<?php include('design_website/header.php');?>
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
<!-- pagination start -->
<?php
$page_limet = 4;
$select_blog_count = "SELECT count(id) as totalpages FROM blog";
$rsl_blog_count = $conn->query($select_blog_count);
$blog_count=$rsl_blog_count ->fetch_assoc();
$total_pages = $blog_count['totalpages'];
$pages_num = ceil($total_pages / $page_limet);
if (isset($_GET['page']) && $_GET['page'] >= 1 && $_GET['page'] <= $pages_num) {
    $page = filter_var(trim($_GET['page']), FILTER_SANITIZE_NUMBER_INT);
} else {
    $page = 1;
}
$offset = ($page - 1) * $page_limet;

//var_dump($page_limet ,$total_pages ,$pages_num,$offset,$page);
?> 
<!-- pagination end -->    
    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Blog</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Blog Section Begin -->
    <section class="blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1">
                    <div class="blog-sidebar">
                        <div class="search-form">
                            <h4>Search</h4>
                            <form action="#">
                                <input type="text" placeholder="Search . . .  ">
                                <button type="submit"><i class="fa fa-search"></i></button>
                            </form>
                        </div>
                        <div class="blog-catagory">
                            <h4>Categories</h4>
                            <ul>
<?php
 $select_blog_cate = "SELECT * FROM category_blog";
 $rsl_blog_cate = $conn->query($select_blog_cate);
 foreach($rsl_blog_cate  as $row_blog_cate){
?>                               
          <li><a blogs_id="<?=$row_blog_cate['id']?>" class="category_blogs" style="cursor:pointer;"><?=$row_blog_cate['cb_name']?></a></li>
<?php } ?>                                
                            </ul>
                        </div>
                        <div class="recent-post">
                            <h4>Recent Post</h4>
                            <div class="recent-blog">
<?php
$select_blog_title = "SELECT id ,title,images,date,category_blog_id FROM blog ORDER BY id DESC LIMIT $page_limet OFFSET $offset";
$rsl_blog_titles = $conn->query($select_blog_title);
foreach($rsl_blog_titles  as $row_blog_title){
    $blog_cat_id = $row_blog_title['category_blog_id'];
    $blog_cat_name = "SELECT * FROM category_blog WHERE id = $blog_cat_id";
    $rsl_blog_cat_name = $conn->query($blog_cat_name );
    $blog_cat_row =$rsl_blog_cat_name->fetch_assoc(); 
    
    $images = $row_blog_title['images'] ;
    $image = explode(',',$images) ;
    $random_value=array_rand($image);

    $date = date_create($row_blog_title['date']);
    $date = date_format($date,"M-d-Y");
?>
                                <a href="blog-details.php?id=<?=$row_blog_title['id']?>" class="rb-item">
                                    <div class="rb-pic">
                                      <img  src="images/blogs/<?=$image[$random_value]?>" alt="<?=$row_blog_title['title']?>" height="200 rem">
                                    </div>
                                    <div class="rb-text">
                                        <h6><?=$row_blog_title['title']?></h6>
                                        <p><?=$blog_cat_row['cb_name']?><span>-<?=$date?></span></p>
                                    </div>
                                </a>
<?php }?>                             
                            </div>
                        </div>
                        <div class="blog-tags">
                            <h4>Product Tags</h4>
                            <div class="tag-item">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trousers</a>
                                <a href="#">Men's hats</a>
                                <a href="#">Backpack</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="row show_blogs_category">

<?php

$select_blogs= "SELECT  id ,title,images,date,category_blog_id  FROM blog ORDER BY id  DESC LIMIT 4";
$rsl_blogs = $conn->query($select_blogs);
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
?>  
                    
                        <div class="col-lg-6 col-sm-6">
                            <div class="blog-item">
                                <div class="bi-pic">
                                <img  src="images/blogs/<?=$image[$random_value]?>" alt="<?=$row_blog['title']?>" height="350 rem">
                                </div>
                                <div class="bi-text">
                                    <a href="blog-details.php?id=<?=$row_blog['id']?>">
                                        <h4><?=$row_blog['title']?></h4>
                                    </a>
                                    <p><?=$blog_cate_row['cb_name']?><span>- <?=$date?></span></p>
                                </div>
                            </div>
                        </div>
<?php } ?>                   
                        <div class="col-lg-12">
                            <!-- <div class="loading-more">
                                <i class="icon_loading"></i>
                                <a href="#">
                                    Loading More
                                </a>
                            </div> -->
                    <div class="loading-more row justify-content-center">     
                    <nav aria-label="Page navigation example ">
                    <ul class="pagination">
                        <li class="page-item  <?php if ($page == 1) echo "disabled" ?>">
                        <a class="page-link" href="<?php echo $_SERVER["PHP_SELF"] . '?page=' . ($page - 1) ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                        </li>
                        <?php if ($page == $pages_num) $page = $pages_num - 1; ?>
                        <li class="page-item"><a class="page-link" href="blog.php?page=<?= $page ?>"><?= $page ?></a></li>
                        <li class="page-item"><a class="page-link" href="blog.php?page=<?= $pages_num ?>"><?= $pages_num ?></a></li>

                        <li class="page-item">
                        <a class="page-link <?php if ($page == $total_pages - 1) echo "disabled" ?>" href="<?php echo $_SERVER["PHP_SELF"] . '?page=' . ($page + 1) ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                        </li>
                    </ul>
                    </nav>  
                 
                    </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

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