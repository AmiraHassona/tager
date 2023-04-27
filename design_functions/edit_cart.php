<?php

session_start();
   
include('connection.php');

$user_id  = $_SESSION['user_web']['id'];
$cart_id = $_POST['cart_id'];
$product_id = $_POST['product_id'];
$count = $_POST['count'];

$data=[];
$rows=[];

$select_product_row = "SELECT p_discount FROM products WHERE id= $product_id";
$rsl_product_row = $conn->query($select_product_row);
$product_row = $rsl_product_row->fetch_assoc();


$select_cart_row = "SELECT * FROM cart WHERE product_id=$product_id AND user_id=$user_id";
$rsl_cart_row = $conn->query($select_cart_row);
$rsl_cart_count=$rsl_cart_row->num_rows;
     $cart_row =$rsl_cart_row->fetch_assoc();
     $count = $count;
     $total_price =$product_row['p_discount'] * $count;

$update_cart_row = "UPDATE cart SET count='$count', total_price='$total_price' WHERE product_id=$product_id AND user_id=$user_id ";
$rsl_edit_row = $conn->query($update_cart_row);

if($rsl_edit_row){
 $select_cart = "SELECT count(id),sum(total_price) FROM cart WHERE user_id = $user_id ";
 $rsl_cart = $conn->query($select_cart);
   
    while($total_cart = mysqli_fetch_array($rsl_cart)){ 
        $data['notice'] = $total_cart['count(id)']; 
        $data['total_price_products'] =$total_cart['sum(total_price)'] ;   
    } 
////////////////////////     
 $select_cart = "SELECT * FROM cart WHERE user_id = $user_id ORDER BY id DESC ";
 $rsl_cart = $conn->query($select_cart);
 $rsl_cart_row_count = $rsl_cart->num_rows; 
 if($rsl_cart_row_count > 0){
     foreach($rsl_cart as $cart_rows){
         $product_id= $cart_rows['product_id'];
         $select_product_row = "SELECT p_name , p_image , p_price , p_discount ,p_stock FROM products WHERE id= $product_id";
         $rsl_product_row = $conn->query($select_product_row);
         $product_row=$rsl_product_row->fetch_assoc();
array_unshift($rows,'<tr>
 <td class="cart-pic first-row"><img src="images/products/'.$product_row['p_image'].'" alt="'.$product_row['p_name'].'" width="150rem"></td>
 <td class="cart-title first-row">
     <h5>'.$product_row['p_name'].'</h5>
 </td>
 <td class="p-price first-row">$'.$product_row['p_discount'].'</td>
 <td class="qua-col first-row"> 
     <div class="quantity">
        <div class="pro-qty" >
        <input type="number" value="'.$cart_rows['count'].'" id="quantity_input" min="1" max="'.$product_row['p_stock'].'" onKeyDown="return false">
        </div>
     </div>
 </td>
 <td class="total-price first-row">$'.$cart_rows['total_price'].'</td>
 <td class="close-td first-row">
 <i class="ti-pencil edit_cart" product_id="'.$cart_rows['product_id'].'" cart_id="'.$cart_rows['id'].'"></i> 
 </td>
 <td class="close-td first-row">
 <i class="ti-close  delete_from_shopping_cart" product_id="'.$cart_rows['product_id'].'" cart_id="'.$cart_rows['id'].'"></i> 
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