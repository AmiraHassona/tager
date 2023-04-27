<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }
   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');

   $id= $_GET['id'];
   $select_product_row = "SELECT * FROM products WHERE id = $id";
   $rsl_product_row = $conn->query($select_product_row);
   $product_row=$rsl_product_row ->fetch_assoc();
  
?>		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h2 class="page-header">Details Product</h2>
			</div>
		</div><!--/.row-->
    
    <div class="card mb-3 " style="padding: 30px;">
        <div class="row no-gutters">
         <div class="col-md-5">
          <img src="../images/products/<?=$product_row['p_image']?>" alt="<?=$product_row['p_name']?>" height="400px" width="100%">
         </div>
         <div class="col-md-7">
          <div class="card-body">
            <h3 class="card-title" style="color:blue;"><?=$product_row['p_name']?></h3>
               <?php
                 $select_cate = "SELECT id , c_name FROM categories";
                 $rsl_cate = $conn->query($select_cate);
                 foreach($rsl_cate  as $row_cate){
                 if($product_row['id_category'] == $row_cate['id']){
               ?>
               <p class="card-text"><?=$row_cate['c_name']?></p>
               <?php
                 }
               }
               ?>
            <p class="card-text"><?=$product_row['p_desc']?></p>
            <p class="card-text">Product Price : <?=$product_row['p_price']?></p>
            <p class="card-text">Product Discount : <?=$product_row['p_discount']?></p>
            <p class="card-text">Product Stock : <?=$product_row['p_stock']?></p>
            <p class="card-text">Product Rate : <?=$product_row['p_rate']?></p>
          </div>
          <a href="product.php" class=" btn btn-info" > Back to Products</a>
         </div>
        </div>
    </div>
   


<?php
   $conn->close();
   include('partials/footer.php');
?>