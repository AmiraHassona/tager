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
				<h2 class="page-header">Product Edit</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/edit_product.php" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?=$product_row['id']?>">
             <div class="form-group">
             <label for="p_category">Category</label>
             <select class="form-control" id="p_category" name="p_category">
               <?php
               $select_cate = "SELECT id , c_name FROM categories";
               $rsl_cate = $conn->query($select_cate);
               foreach($rsl_cate  as $row_cate){
                ?>
                <option value="<?=$row_cate['id']?>" <?php if($product_row['id_category'] == $row_cate['id']) {echo'selected';}?>><?=  $row_cate['c_name'];?></option>
               <?php
               }
               ?>
             </select>
             </div>
             <div class="form-group">
             <label for="p_name">Product Name</label>
             <input type="text" class="form-control" id="p_name" placeholder="Product Name" name="p_name" value="<?=$product_row['p_name']?>">
             </div>
             <div class="form-group">
             <label for="p_desc">Product Description</label></br>
             <textarea name="p_desc" id="p_desc"  rows="3" class="form-control" placeholder="Product Description" ><?=$product_row['p_desc']?></textarea>
             </div>
             <div class="form-group">
             <label for="p_price">Product Price</label>
             <input type="number" class="form-control" id="p_price" placeholder="Product Price" name="p_price" value="<?=$product_row['p_price']?>">
             </div>
             <div class="form-group">
             <label for="p_discount">Product Discount</label>
             <input type="number" class="form-control" id="p_discount" placeholder="Product Discount" name="p_discount" value="<?=$product_row['p_discount']?>">
             </div>
             <div class="form-group">
             <label for="p_stock">Product Stock</label>
             <input type="number" class="form-control" id="p_stock" placeholder="Product Stock" name="p_stock" value="<?=$product_row['p_stock']?>">
             </div>
             <div class="form-group">
             <label for="p_rate">Product Rate</label>
             <input type="number" class="form-control" id="p_rate" placeholder="Product Rate" name="p_rate" value="<?=$product_row['p_rate']?>" disabled>
             </div>
             <div class="form-group">
             <label for="p_image">Product Image</label></br>
             <img src="../images/products/<?=$product_row['p_image']?>" alt="<?=$product_row['p_name']?>" width="200px" height="200px">
             <input type="file" id="p_image" name="p_image">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>