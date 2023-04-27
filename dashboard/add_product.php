<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }

   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');
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
				<h2 class="page-header">PRODUCT</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/add_product.php" enctype="multipart/form-data">
            <div class="form-group">
             <label for="p_category">Category</label>
             <select class="form-control" name="p_category">
               <option selected disabled>Choose...</option>
               <?php
               $select_cate = "SELECT id , c_name FROM categories";
               $rsl_cate = $conn->query($select_cate);
               foreach($rsl_cate  as $row_cate){
                ?>
               <option value="<?=$row_cate['id']?>"><?=$row_cate['c_name']?></option>
               <?php
               }
               ?>
             </select>
             </div>         
             <div class="form-group">
             <label for="p_name">Product Name</label>
             <input type="text" class="form-control" id="p_name" placeholder="Product Name" name="p_name">
             </div>
             <div class="form-group">
             <label for="p_desc">Product Description</label></br>
             <textarea name="p_desc" id="p_desc"  rows="3" class="form-control" placeholder="Product Description"></textarea>
             </div>
             <div class="form-group">
             <label for="p_price">Product Price</label>
             <input type="number" class="form-control" id="p_price" placeholder="Product Price" name="p_price">
             </div>
             <div class="form-group">
             <label for="p_discount">Product Discount</label>
             <input type="number" class="form-control" id="p_discount" placeholder="Product Discount" name="p_discount" value="0">
             </div>
             <div class="form-group">
             <label for="p_stock">Product Stock</label>
             <input type="number" class="form-control" id="p_stock" placeholder="Product Stock" name="p_stock">
             </div>
             <div class="form-group">
             <label for="p_image">Product Image</label>
             <input type="file" id="p_image" name="p_image">
             </div>
         
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>