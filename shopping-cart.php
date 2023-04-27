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
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Shopping Cart Section Begin -->
    <section class="shopping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="ti-pencil"></i></th>
                                    <th><i class="ti-close"></i></th>
                                </tr>
                            </thead>
                            <tbody class="new_products_in_cart">
<?php
 $select_cart = "SELECT * FROM cart WHERE user_id = $user_id   ";
 $rsl_cart = $conn->query($select_cart);
 $rsl_cart_row_count = $rsl_cart->num_rows; 
 if($rsl_cart_row_count > 0){
     foreach($rsl_cart as $cart_rows){
         $product_id= $cart_rows['product_id'];
         $select_product_row = "SELECT p_name , p_image , p_price , p_discount ,p_stock FROM products WHERE id= $product_id";
         $rsl_product_row = $conn->query($select_product_row);
         $product_row=$rsl_product_row->fetch_assoc();
?>                                 
                                <tr>
                                    <td class="cart-pic first-row"><img src="images/products/<?=$product_row['p_image']?>" alt="<?=$product_row['p_name']?>" width="150rem"></td>
                                    <td class="cart-title first-row">
                                        <h5><?=$product_row['p_name']?></h5>
                                    </td>
                                    <td class="p-price first-row">$<?=$product_row['p_discount']?></td>
                                    <td class="qua-col first-row">
                                        <div class="quantity js_code">
                                            <div class="pro-qty" >
                                            <input type="number" value="<?=$cart_rows['count']?>" id="quantity_input" min="1" max="<?=$product_row['p_stock']?>" onKeyDown="return false">
                                            </div>
                                        </div>
                                    </td>
                                    <td class="total-price first-row">$<?=$cart_rows['total_price']?></td>
                                    <td class="close-td first-row">
                                    <i class="ti-pencil edit_cart" product_id="<?=$cart_rows['product_id']?>" cart_id="<?=$cart_rows['id']?>"></i> 
                                    </td>
                                    <td class="close-td first-row">
                                    <i class="ti-close  delete_from_shopping_cart" product_id="<?=$cart_rows['product_id']?>" cart_id="<?=$cart_rows['id']?>"></i> 
                                    </td>
                                </tr>
<?php
}
} 
?>                               
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="shop.php" class="primary-btn continue-shop">Continue shopping</a>
                                <!-- <a href="#" class="primary-btn up-cart">Update cart</a> -->
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form action="#" class="coupon-form">
                                    <input type="text" placeholder="Enter your codes">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                <ul>
                                <?php
$select_price = "SELECT sum(total_price) FROM cart WHERE user_id = $user_id  ";
$rsl_price = $conn->query($select_price);

while($total_price = mysqli_fetch_array($rsl_price)){
?>    
       <li class="subtotal total_price_products">Subtotal <span>$<?=$total_price['sum(total_price)']?></span></li>
       <li class="cart-total total_price_products">Total <span>$<?=$total_price['sum(total_price)']?></span></li>
<?php
}
?>                                     
                                   
                                </ul>
                                <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shopping Cart Section End -->

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
    