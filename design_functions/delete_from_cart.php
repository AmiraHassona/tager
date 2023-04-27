<?php

session_start();
   
include('connection.php');

$user_id  = $_SESSION['user_web']['id'];
$cart_id = $_POST['cart_id'];
$product_id = $_POST['product_id'];
$data=[];
$rows=[];
$delete_row = "DELETE FROM cart  WHERE id=$cart_id and product_id=$product_id AND user_id=$user_id";
$rsl_delete_row = $conn->query($delete_row);

if($rsl_delete_row){
 $select_cart = "SELECT count(id),sum(total_price) FROM cart WHERE user_id = $user_id ";
 $rsl_cart = $conn->query($select_cart);

 while($total_cart = mysqli_fetch_array($rsl_cart)){ 
     $data['notice'] = $total_cart['count(id)']; 
     $data['total_price_products'] =$total_cart['sum(total_price)'] ;   
 } 
////////////////////////     
 $select_cart = "SELECT * FROM cart WHERE user_id = $user_id ";
 $rsl_cart = $conn->query($select_cart);
 $rsl_cart_row_count = $rsl_cart->num_rows; 
 if($rsl_cart_row_count > 0){
     foreach($rsl_cart as $cart_rows){
         $product_id= $cart_rows['product_id'];
         $select_product_row = "SELECT p_name , p_image , p_price , p_discount FROM products WHERE id= $product_id";
         $rsl_product_row = $conn->query($select_product_row);
         $product_row=$rsl_product_row->fetch_assoc();
         array_unshift($rows,'<tr>
          <td class="si-pic"><img src="images/products/'.$product_row['p_image'].'" alt="'.$product_row['p_name'].'" width="50rem"></td>
          <td class="si-text">
              <div class="product-selected">
                  <p>'.$product_row['p_discount'].'x '.$cart_rows['count'].'</p>
                  <h6>'.$product_row['p_name'].'</h6>
              </div>
          </td>
          <td class="si-close">
          <i class="ti-close  delete_from_cart" product_id="'.$cart_rows['product_id'].'" cart_id="'.$cart_rows['id'].'"></i>              
          </td>
          </tr>');
     }    
    } 
    $data['add_to_cart']  = implode(' ',$rows) ;  
}
$new_data= implode(',',$data) ;    
echo "$new_data";
$conn->close();
?>