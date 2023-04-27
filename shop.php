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
$page_limet = 9;
$select_product_count = "SELECT count(id) as totalpages FROM products";
$rsl_product_count = $conn->query($select_product_count);
$product_count=$rsl_product_count ->fetch_assoc();
$total_pages = $product_count['totalpages'];
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
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
<?php
$select_cate = "SELECT id , c_name FROM categories";
$rsl_cate = $conn->query($select_cate);
foreach($rsl_cate  as $row_cate){  
?>                                            
       <li><a category_id="<?=$row_cate['id']?>" class="category_products" style="cursor:pointer;"><?=$row_cate['c_name']?></a></li>
<?php
}
?>                           
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            <div class="bc-item">
                                <label for="bc-calvin">
                                    Calvin Klein
                                    <input type="checkbox" id="bc-calvin">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-diesel">
                                    Diesel
                                    <input type="checkbox" id="bc-diesel">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-polo">
                                    Polo
                                    <input type="checkbox" id="bc-polo">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="bc-item">
                                <label for="bc-tommy">
                                    Tommy Hilfiger
                                    <input type="checkbox" id="bc-tommy">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn">Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Color</h4>
                        <div class="fw-color-choose">
                            <div class="cs-item">
                                <input type="radio" id="cs-black">
                                <label class="cs-black" for="cs-black">Black</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-violet">
                                <label class="cs-violet" for="cs-violet">Violet</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-blue">
                                <label class="cs-blue" for="cs-blue">Blue</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-yellow">
                                <label class="cs-yellow" for="cs-yellow">Yellow</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-red">
                                <label class="cs-red" for="cs-red">Red</label>
                            </div>
                            <div class="cs-item">
                                <input type="radio" id="cs-green">
                                <label class="cs-green" for="cs-green">Green</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Size</h4>
                        <div class="fw-size-choose">
                            <div class="sc-item">
                                <input type="radio" id="s-size">
                                <label for="s-size">s</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="m-size">
                                <label for="m-size">m</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="l-size">
                                <label for="l-size">l</label>
                            </div>
                            <div class="sc-item">
                                <input type="radio" id="xs-size">
                                <label for="xs-size">xs</label>
                            </div>
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
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
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="select-option">
                                    <select class="sorting">
                                        <option value="">Default Sorting</option>
                                    </select>
                                    <select class="p-show">
                                        <option value="">Show:</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 text-right">
<?php
 if(isset($_GET['id'])){
    $id= $_GET['id'];
    $select_count_products= "SELECT * FROM products WHERE id_category = $id ";
}else{
    $select_count_products= "SELECT * FROM products ";
}
$rslt_count_products = $conn->query($select_count_products);
$count_products = $rslt_count_products->num_rows;
?>                                
                                <p>Show 01- 06 Of <?=$count_products?> Product</p>

                            </div>
                        </div>
                    </div>
                    <div class="product-list">
                        <div class="row show_products_category">
<?php
   
   $select_product_row = "SELECT * FROM products ORDER BY id DESC LIMIT $page_limet OFFSET $offset ";
   $rsl_products_row = $conn->query($select_product_row);
   foreach($rsl_products_row as $products_rows){
      $id_category= $products_rows['id_category'];
      $select_category_row = "SELECT c_name FROM categories WHERE id= $id_category";
      $rsl_category_row = $conn->query($select_category_row);
      $row_category=$rsl_category_row->fetch_assoc();

?>	                            
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item">
                                    <div class="pi-pic">
                                        <img src="images/products/<?=$products_rows['p_image']?>" height="300rem" alt="<?=$products_rows['p_name']?>">
                                        <div class="sale pp-sale">Sale</div>
                                        <div class="icon">
                                            <i class="icon_heart_alt"></i>
                                        </div>
                                        <ul>
                                            <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                            <li class="quick-view"><a href="product.php?id=<?=$products_rows['id']?>">+ Quick View</a></li>
                                            <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="pi-text">
                                        <div class="catagory-name"><?=$row_category['c_name']?></div>
                                        <a href="#">
                                            <h5><?=$products_rows['p_name']?></h5>
                                        </a>
                                        <div class="product-price">
                                        <?=$products_rows['p_discount']?>
                                            <span><?=$products_rows['p_price']?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
<?php
 }
?>            
                        </div>
                    </div>
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
                        <li class="page-item"><a class="page-link" href="shop.php?page=<?= $page ?>"><?= $page ?></a></li>
                        <li class="page-item"><a class="page-link" href="shop.php?page=<?= $pages_num ?>"><?= $pages_num ?></a></li>

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
    </section>
    <!-- Product Shop Section End -->

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