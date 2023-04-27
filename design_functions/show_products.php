<?php
   session_start();
   
   include('connection.php');

   $category_id = $_POST['category_id'] ;
  

  
    $select_product_row = "SELECT * FROM products WHERE id_category = $category_id ORDER BY id DESC LIMIT 6 ";
    $rsl_products_row = $conn->query($select_product_row);
    $rsl_products_row_count = $rsl_products_row->num_rows; 
    if($rsl_products_row_count > 0){
        foreach($rsl_products_row as $products_rows){
            $id_category= $products_rows['id_category'];
            $select_category_row = "SELECT c_name FROM categories WHERE id= $id_category";
            $rsl_category_row = $conn->query($select_category_row);
            $row_category=$rsl_category_row->fetch_assoc();
  
                              
       echo'<div class="col-lg-4 col-sm-6">
       <div class="product-item">
          <div class="pi-pic">
              <img src="images/products/'.$products_rows['p_image'].'" height="300rem" alt="'.$products_rows['p_name'].'">
              <div class="sale pp-sale">Sale</div>
              <div class="icon">
                  <i class="icon_heart_alt"></i>
              </div>
              <ul>
                  <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                  <li class="quick-view"><a href="product.php?id='.$products_rows['id'].'">+ Quick View</a></li>
                  <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
              </ul>
          </div>
          <div class="pi-text">
              <div class="catagory-name">'.$row_category['c_name'].'</div>
              <a href="#">
                  <h5>'.$products_rows['p_name'].'</h5>
              </a>
              <div class="product-price">
              '.$products_rows['p_discount'].'
                  <span>'.$products_rows['p_price'].'</span>
              </div>
          </div>
       </div>
      </div>';                 
     }  
 }else{
    echo"SORY!.. No Products Available";
 }



$conn->close();
?>