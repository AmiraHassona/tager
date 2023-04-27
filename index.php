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

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            <div class="single-hero-items set-bg" data-setbg="img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
            <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-1.jpg" alt="">
                        <div class="inner-text">
                            <h4>Men’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-2.jpg" alt="">
                        <div class="inner-text">
                            <h4>Women’s</h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="img/banner-3.jpg" alt="">
                        <div class="inner-text">
                            <h4>Kid’s</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Section End -->

    <!-- Women Banner Section Begin -->
    <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/women-large.jpg">
                        <h2>Women’s</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="filter-control">
                        <ul>
<?php
$select_cate = "SELECT id , c_name FROM categories";
$rsl_cate = $conn->query($select_cate);
foreach($rsl_cate  as $row_cate){   
  
// if(isset($_GET['id'])){  
//  $active = 'active';   
// }
?>                         
        <li class=""><a class="stretched-link text-danger" href="index.php?id=<?=$row_cate['id']?>"><?=$row_cate['c_name']?></a></li>
<?php
}
?>
         </ul>
         </div>
         <div class="product-slider owl-carousel">
<?php
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $select_product= "SELECT * FROM products WHERE id_category = $id ORDER BY id DESC LIMIT 12 ";
}else{
    $select_product= "SELECT * FROM products ORDER BY id DESC LIMIT 12";
}

$rsl_product = $conn->query($select_product);
foreach($rsl_product as $row_product){    
?>                       
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="images/products/<?=$row_product['p_image']?>" alt="<?=$row_product['p_name']?>">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.php?id=<?=$row_product['id']?>">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?=$row_product['p_name']?></div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $<?=$row_product['p_discount']?>
                                    <span>$<?=$row_product['p_price']?></span>
                                </div>
                            </div>
                        </div>
<?php
}
?>                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Women Banner Section End -->

    <!-- Deal Of The Week Section Begin-->
    <section class="deal-of-week set-bg spad" data-setbg="img/time-bg.jpg">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    <!-- Deal Of The Week Section End -->

    <!-- Man Banner Section Begin -->
    <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8">
                    <div class="filter-control">
                    <ul>
<?php
$select_cate = "SELECT id , c_name FROM categories";
$rsl_cate = $conn->query($select_cate);
foreach($rsl_cate  as $row_cate){   
  
// if(isset($_GET['id'])){  
//  $active = 'active';   
// }
?>                         
        <li class=""><a class="stretched-link text-danger" href="index.php?id=<?=$row_cate['id']?>"><?=$row_cate['c_name']?></a></li>
<?php
}
?>
         </ul>
         </div>
         <div class="product-slider owl-carousel">
<?php
if(isset($_GET['id'])){
    $id= $_GET['id'];
    $select_product= "SELECT * FROM products WHERE id_category = $id ORDER BY id DESC LIMIT 12 ";
}else{
    $select_product= "SELECT * FROM products ORDER BY id  LIMIT 12";
}

$rsl_product = $conn->query($select_product);
foreach($rsl_product as $row_product){    
?>                       
                        <div class="product-item">
                            <div class="pi-pic">
                                <img src="images/products/<?=$row_product['p_image']?>" alt="<?=$row_product['p_name']?>">
                                <div class="sale">Sale</div>
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="product.php?id=<?=$row_product['id']?>">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul>
                            </div>
                            <div class="pi-text">
                                <div class="catagory-name"><?=$row_product['p_name']?></div>
                                <a href="#">
                                    <h5>Pure Pineapple</h5>
                                </a>
                                <div class="product-price">
                                    $<?=$row_product['p_discount']?>
                                    <span>$<?=$row_product['p_price']?></span>
                                </div>
                            </div>
                        </div>
<?php
}
?>         
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                        <h2>Men’s</h2>
                        <a href="#">Discover More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Man Banner Section End -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
<?php
$select_blogs= "SELECT  id ,title,images,date,category_blog_id,quote  FROM blog ORDER BY id  DESC LIMIT 3";
$rsl_blogs = $conn->query($select_blogs);
foreach($rsl_blogs as $row_blog){ 
    $blog_id= $row_blog['id'];
    $images = $row_blog['images'] ;
    $image = explode(',',$images) ;
    $random_value=array_rand($image);  
    $blog_cate_id = $row_blog['category_blog_id'];
    $blog_cate_name = "SELECT * FROM category_blog WHERE id = $blog_cate_id";
    $rsl_blog_cate_name = $conn->query($blog_cate_name );
    $blog_cate_row =$rsl_blog_cate_name->fetch_assoc();
    $date = date_create($row_blog['date']);
    $date = date_format($date,"M-d-Y");

    $select_count = "SELECT count(id)  FROM comments WHERE blog_id = $blog_id";
    $rsl_count = $conn->query($select_count);
    $total_count = mysqli_fetch_array($rsl_count);

?>                 
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="images/blogs/<?=$image[$random_value]?>" alt="<?=$row_blog['title']?>" height="250rem">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    <?=$date?>
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    <?=$total_count['count(id)']?>
                                </div>
                            </div>
                            <a href="#">
                                <h4><?=$row_blog['title']?></h4>
                            </a>
                            <p><?=$row_blog['quote']?> </p>
                        </div>
                    </div>
                </div>
<?php } ?>              
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->

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