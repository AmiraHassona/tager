<?php
session_start();
// if(!isset($_SESSION['user_web'])){
//   header("location:login.php");
// }

$select_info="SELECT * FROM side_info";
$rslt_info=$conn->query($select_info);
$row_info=$rslt_info->fetch_assoc();
?>
<div class="header-top">
                <div class="container">
                <div class="<?php if(isset($_SESSION['user_web'])) echo 'ht-left';?>"> 
<?php                    
  if(isset($_SESSION['user_web'])){
  $user_id=$_SESSION['user_web']['id'] ;
?>
               
                <button type="button" class="btn rounded-circle" data-toggle="modal" data-target="#exampleModal<?=$user_id?>">
                <img src="images/users/profile-picture.png" width="40 rem" class="rounded-circle" />
                </button>     
<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$user_id?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="exampleModalLabel">Edit your Information</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="register-form">
                    <form  enctype="multipart/form-data">
                            <div class="row">   
                            <div class="group-input col-6">
                                <label for="first_name">First Name *</label>
                                <input type="text" id="first_name" name="first_name" placeholder="<?=$_SESSION['user_web']['first_name']?>">
                            </div>
                            <div class="group-input col-6">
                                <label for="last_name">Last Name *</label>
                                <input type="text" id="last_name" name="last_name" placeholder="<?=$_SESSION['user_web']['last_name']?>">
                            </div>
                            <div class="group-input col-12">
                                <label for="email">User Email *</label>
                                <input type="email" id="email" name="email" placeholder="<?=$_SESSION['user_web']['email']?>">
                            </div>
                            <span class="group-input col-12" id="check_isemail"></span>
                            <div class="group-input col-12">
                                <label for="pass">Password *</label>
                                <input type="password" id="password" name="password" >
                            </div>
                            <!-- <div class="group-input col-12">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con_password" name="con_password">
                            </div>
                            <div class="group-input col-12" id="check_password"></div> -->
                            <div class="group-input col-12">
                                <label for="image">User Image *</label>
        <?php
        if($_SESSION['user_web']['image'] == null){
         ?>
        <img src="images/users/profile-picture.png" alt="" width="100rem" >
        <?php }else{ ?>
        <img src="<?=$_SESSION['user_web']['image']?>" alt="">
        <?php } ?>                          
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" aria-describedby="inputGroupFileAddon04"  name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <div class="group-input col-12">
                            <a  class="site-btn register-btn btn-danger edit_user ">UPDATE</a>
                            </div>
                            </div>
                        </form>
            </div>          

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div> 
                

                &nbsp;&nbsp;<span><?=$_SESSION['user_web']['first_name']?></span>
<?php  } ?>                
                </div>
                <div class="<?php if(isset($_SESSION['user_web'])) echo 'ht-right';?>">
                <div class="ht-left">
                    <div class="mail-service">
                        <i class=" fa fa-envelope"></i>
                       <?=$row_info['site_email'];?>
                    </div>
                    <div class="phone-service">
                        <i class=" fa fa-phone"></i>
                        <?=$row_info['site_phone'];?>
                    </div>
                </div>
                <div class="ht-right"> 
                   <?php if (isset($_SESSION['user_web'])){?>
                   <a href="design_functions/logout.php" class="login-panel" >Logout</a>    
                   <?php } else{?>
                   <a href="login.php" class="login-panel"><i class="fa fa-user"></i>Login</a>
                   <?php }?>

                    <div class="lan-selector">                     
                    </div>
                    <div class="top-social">
                        <a href="<?=$row_info['site_facebook'];?>"><i class="ti-facebook"></i></a>
                        <a href="<?=$row_info['site_twitter'];?>"><i class="ti-twitter-alt"></i></a>
                        <a href="<?=$row_info['site_instagram'];?>"><i class="ti-instagram"></i></a>
                        <a href="<?=$row_info['site_pinterest'];?>"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.php">
                                <img src="img/logo.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7"  >
                        <div class="advanced-search"  style="position: relative;">
                            <button type="button" class="category-btn">All Products &nbsp;&nbsp;  </button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?" class="search_product">
                                <button type="button"><i class="ti-search"></i></button>
                            </div>   
                        </div>
                        <div class="rslt_serch p-3 px-4 " style="z-index:33; position:absolute; top:55px ; left:35px; width:89%; " >

                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
<?php
$active_page=basename($_SERVER['PHP_SELF'],".php");	
if($active_page == 'shopping-cart'){
   $display_none ='none';
}	 
?>                        
                        <ul class="nav-right" style="display:<?=$display_none?>;"  >
                            <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li>
                            <li class="cart-icon">
<?php
if(!isset($_SESSION['user_web'])){
?>    
                                  <!-- <a href="login.php">
                                    <i class="icon_bag_alt" ></i>
                                  </a> -->
<?php  
} else{
?>                                   
                                   <a href="#">
                                    <i class="icon_bag_alt"></i>
<?php
if(isset($_SESSION['user_web'])){
    $user_id=$_SESSION['user_web']['id'] ;

$select_count = "SELECT count(id) FROM cart WHERE user_id = $user_id  ";
$rsl_count = $conn->query($select_count);

while($total_count = mysqli_fetch_array($rsl_count)){
?>    
       <span class="notice"><?=$total_count['count(id)'] ?></span>
<?php
}
}
?>                                     
                                 
                                </a>                                 
<?php } ?>                               

                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <tbody class="products_in_cart" >
                                              
<?php
if(isset($_SESSION['user_web'])){
    $user_id=$_SESSION['user_web']['id'] ;
 $select_cart = "SELECT * FROM cart WHERE user_id = $user_id   ";
 $rsl_cart = $conn->query($select_cart);
 $rsl_cart_row_count = $rsl_cart->num_rows; 
 if($rsl_cart_row_count > 0){
     foreach($rsl_cart as $cart_rows){
         $product_id= $cart_rows['product_id'];
         $select_product_row = "SELECT p_name , p_image , p_price , p_discount FROM products WHERE id= $product_id";
         $rsl_product_row = $conn->query($select_product_row);
         $product_row=$rsl_product_row->fetch_assoc();
?>                                           
                                                <tr>
                                                    <td class="si-pic"><img src="images/products/<?=$product_row['p_image']?>" alt="<?=$product_row['p_name']?>" width="50rem"></td>
                                                    <td class="si-text">
                                                        <div class="product-selected">
                                                            <p><?=$product_row['p_discount']?>x <?=$cart_rows['count']?></p>
                                                            <h6><?=$product_row['p_name']?></h6>
                                                        </div>
                                                    </td>
                                                    <td class="si-close">
                                                      <i class="ti-close  delete_from_cart" product_id="<?=$cart_rows['product_id']?>" cart_id="<?=$cart_rows['id']?>"></i>              
                                                    </td>
                                                </tr>
<?php
     }
    }
}
?>                                              
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
<?php
if(isset($_SESSION['user_web'])){
    $user_id=$_SESSION['user_web']['id'] ;
$select_price = "SELECT sum(total_price) FROM cart WHERE user_id = $user_id  ";
$rsl_price = $conn->query($select_price);

while($total_price = mysqli_fetch_array($rsl_price)){
?>    
       <h5 class="total_price_products"><?=$total_price['sum(total_price)']?></h5>
<?php
}
}
?>                                        
                                    
                                    </div>
                                    <div class="select-button">
                                        <a href="shopping-cart.php" class="primary-btn view-card">VIEW CARD</a>
                                        <a href="#" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
<?php
if(isset($_SESSION['user_web'])){
    $user_id=$_SESSION['user_web']['id'] ;
$select_price = "SELECT sum(total_price) FROM cart WHERE user_id = $user_id  ";
$rsl_price = $conn->query($select_price);

while($total_price = mysqli_fetch_array($rsl_price)){
?>    
       <li class="total_price_products cart-price">
        <?php if($user_id != 0){echo '$' ;}
         echo $total_price['sum(total_price)']?></li>
<?php
}   
}                         
?>                         
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        