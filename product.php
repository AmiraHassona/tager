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

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="./home.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./shop.html">Shop</a>
                        <span>Detail</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
       
                <div class="col-lg-12">
                    <div class="row">
<?php
  $id= $_GET['id'];
  $select_product_row = "SELECT * FROM products WHERE id = $id";
  $rsl_product_row = $conn->query($select_product_row);
  $product_row=$rsl_product_row ->fetch_assoc();
?>

                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="images/products/<?=$product_row['p_image']?>" alt="<?=$product_row['p_name']?>">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    <div class="pt active" data-imgbigurl="img/product-single/product-1.jpg"><img
                                            src="img/product-single/product-1.jpg" alt=""></div>
                                    <div class="pt" data-imgbigurl="img/product-single/product-2.jpg"><img
                                            src="img/product-single/product-2.jpg" alt=""></div>
                                    <div class="pt" data-imgbigurl="img/product-single/product-3.jpg"><img
                                            src="img/product-single/product-3.jpg" alt=""></div>
                                    <div class="pt" data-imgbigurl="img/product-single/product-3.jpg"><img
                                            src="img/product-single/product-3.jpg" alt=""></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                <?php
                 $select_cate = "SELECT id , c_name FROM categories";
                 $rsl_cate = $conn->query($select_cate);
                 foreach($rsl_cate  as $row_cate){
                 if($product_row['id_category'] == $row_cate['id']){
               ?>
               <span class="card-text"><?=$row_cate['c_name']?></span>
               <?php
                 }
               }
               ?>                                   
                                    
                                    <h3><?=$product_row['p_name']?></h3>
                                    <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                                </div>
                                <div class="pd-rating">
<?php
$select_comments = "SELECT *,sum(rate),count(id) FROM rate WHERE product_id = $id";
$rsl_comments = $conn->query($select_comments);
$row_comments = $rsl_comments->fetch_assoc();
$count_comments = $rsl_comments->num_rows; 
if($row_comments['count(id)'] > 0){
$rate=$row_comments['sum(rate)']/$row_comments['count(id)'];
$rate= round($rate);
}else{
    $rate = 0 ;  
}
for ($i=1; $i <= $rate ; $i++) { 
    echo'<i class="fa fa-star"></i>   '; 
}
for ($i=++$rate; $i <= 5 ; $i++) { 
    echo'<i class="fa fa-star-o"></i>   '; 
}

?> 
                                    <span>(<?=--$rate?>)</span>
                                </div>
                                <div class="pd-desc">
                                    <p><?=$product_row['p_desc']?></p>
                                    <h4><?=$product_row['p_discount']?><span><?=$product_row['p_price']?></span></h4>
                                </div>
                                <div class="pd-color">
                                    <h6>Color</h6>
                                    <div class="pd-color-choose">
                                        <div class="cc-item">
                                            <input type="radio" id="cc-black">
                                            <label for="cc-black"></label>
                                        </div>
                                        <div class="cc-item">
                                            <input type="radio" id="cc-yellow">
                                            <label for="cc-yellow" class="cc-yellow"></label>
                                        </div>
                                        <div class="cc-item">
                                            <input type="radio" id="cc-violet">
                                            <label for="cc-violet" class="cc-violet"></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="pd-size-choose">
                                    <div class="sc-item">
                                        <input type="radio" id="sm-size">
                                        <label for="sm-size">s</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="md-size">
                                        <label for="md-size">m</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="lg-size">
                                        <label for="lg-size">l</label>
                                    </div>
                                    <div class="sc-item">
                                        <input type="radio" id="xl-size">
                                        <label for="xl-size">xs</label>
                                    </div>
                                </div>
                                <div class="quantity">
                                    <div class="pro-qty">
                                        <input type="number" value="1" id="quantity_input" min="1" max="<?=$product_row['p_stock']?>" onKeyDown="return false">
                                    </div>
<?php
if(!isset($_SESSION['user_web'])){
?>    
  <a href="login.php"  class="primary-btn pd-cart " style="cursor:pointer">Add To Cart</a>
<?php  
} else{
?>                                   
                                    <a price="<?=$product_row['p_discount']?>" product_id="<?=$product_row['id']?>"  class="primary-btn pd-cart add_to_cart" style="cursor:pointer">Add To Cart</a>
<?php } ?>                                     
                                </div>
                                <ul class="pd-tags">
                                    <li><span>CATEGORIES</span>: More Accessories, Wallets & Cases</li>
                                    <?php
                 $select_cate = "SELECT id , c_name FROM categories";
                 $rsl_cate = $conn->query($select_cate);
                 foreach($rsl_cate  as $row_cate){
                 if($product_row['id_category'] == $row_cate['id']){
               ?>
                  <li><span>TAGS</span>: <?=$row_cate['c_name']?>, <?=$product_row['p_name']?>, &nbsp;<?=$product_row['p_stock']?> &nbsp;pieces</li>
               <?php
                 }
               }
               ?>
                                 
                                </ul>
                                <div class="pd-share">
                                    <div class="p-code">Sku : <?= rand(10000,99999)?></div>
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>                       
                    </div>
                    <div class="product-tab">
                        <div class="tab-item">
                            <ul class="nav" role="tablist">
                                <li>                                  
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                                
 <?php
 if(!isset($_SESSION['user_web'])){
  ?>  
                                <li>
                                    <a data-toggle="tab" href="login.php" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="login.php" role="tab">Customer Reviews (02)</a>
                                </li>
 <?php   
 } else {
 ?>                               
                                <li>
                                    <a data-toggle="tab" href="#tab-2" role="tab">SPECIFICATIONS</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#tab-3" role="tab">Customer Reviews (02)</a>
                                </li>
 <?php } ?>                               
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <h5>Introduction</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                                                <h5>Features</h5>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim
                                                    ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                                    aliquip ex ea commodo consequat. Duis aute irure dolor in </p>
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                               
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
<?php
for ($i=1; $i <= $rate ; $i++) { 
    echo'<i class="fa fa-star"></i>   '; 
}
for ($i=++$rate; $i <= 5 ; $i++) { 
    echo'<i class="fa fa-star-o"></i>   '; 
}
?> 
                                                        <span>(<?=--$rate?>)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">$495.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">22 in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">1,3kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">Xxl</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span class="cs-color"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">00012</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                       
                                        <h4><?=$count_comments?> Comments</h4>
                                        <div class="comment-option" id="add_comment">
<?php
$select_comments = "SELECT * FROM rate WHERE product_id = $id ORDER BY id DESC LIMIT 5";
$rsl_comments = $conn->query($select_comments);
foreach($rsl_comments  as $row_comment){
    $date = date_create($row_comment['created_at']);
    $date = date_format($date,"d-M-Y");
    $user_id = $row_comment['user_id'];
    $select_user = "SELECT first_name,last_name,image FROM users WHERE id = $user_id";
    $rsl_user = $conn->query($select_user );
    $user_row =$rsl_user->fetch_assoc(); 
?>                                            
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                 <?php
                                                  if($user_row['image'] == null){
                                                 ?>
                                                  <img src="images/users/profile-picture.png" alt="" width="100rem" style="border-radius: 50%;">
                                                 <?php }else{ ?>
                                                  <img src="<?=$user_row['image']?>" alt="">
                                                 <?php } ?> 
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
<?php
for ($i=1; $i <= $row_comment['rate'] ; $i++) { 
    echo'<i class="fa fa-star"></i>   '; 
}
for ($i=++$row_comment['rate']; $i <= 5 ; $i++) { 
    echo'<i class="fa fa-star-o"></i>   '; 
}
?>                                        
                                                    </div>
                                                    <h5><?=$user_row['first_name']." ".$user_row['last_name']?><span><?=$date?></span></h5>
                                                    <div class="at-reply"><?=$row_comment['comment']?></div>
                                                </div>
                                            </div>
<?php } ?>                                            
                                        </div>
<?php
$user_id = $_SESSION['user_web']['id'];
$select_comment = "SELECT * FROM rate WHERE product_id = $id AND user_id = $user_id";
$rsl_comment = $conn->query($select_comment);
$count_comment = $rsl_comment->num_rows; 
if($count_comment > 0){
  $display_none = 'none';
}
?>
                                       <div style="display:<?=$display_none?>;">
                                       <div id="is_user_send_rate" >
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating color_rating">
                                                <i class="fa fa-star-o star_rate" vall="1"></i>
                                                <i class="fa fa-star-o star_rate" vall="2"></i>
                                                <i class="fa fa-star-o star_rate" vall="3"></i>
                                                <i class="fa fa-star-o star_rate" vall="4"></i>
                                                <i class="fa fa-star-o star_rate" vall="5"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row" >
                                                    <div class="col-lg-12">
                                                    <textarea placeholder="Comment" name="comment" id="comment" ></textarea>
                                                    </div>
                                                </div>
                                             
                                                <a class="site-btn send_rate_and_comment_btn" stars="0" product_id="<?=$id?>" style="margin-top: 100px;" >Send Rate or Comment</a>
                                            </form>
                                            <h5 class="group-input col-12 m-3" id="check_rate_comment" ></h5>
                                        </div> 
                                        </div>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Related Products</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-1.jpg" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-2.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $13.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-3.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="img/products/women-4.jpg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Related Products Section End -->

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