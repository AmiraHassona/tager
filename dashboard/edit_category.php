<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }

   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');

    $id= $_GET['id'];
    $select_cate_row = "SELECT * FROM categories WHERE id = $id";
    $rsl_cate_row = $conn->query($select_cate_row);
    $cate_row=$rsl_cate_row ->fetch_assoc();
    $status=$cate_row['status'];

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
				<h2 class="page-header">CATEGORIES</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/edit_category.php" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?=$cate_row['id']?>">
             <div class="form-group">
             <label for="name">Category Name</label>
             <input type="text" class="form-control" id="name" placeholder="category name" name="c_name" value="<?=$cate_row['c_name']?>" >
             </div>
             <div class="form-group">
             <label for="image">Status</label>
             <select class="form-control" name="status">
               <option <?php if($status =='1') {echo'selected';}?> value="1">Available</option>
               <option <?php if($status =='0') {echo'selected';}?> value="0">Unavailable</option>
             </select>
             </div>
             <div class="form-group">
             <label for="c_image">Category Image</label></br>
             <img src="../images/Categories/<?=$cate_row['c_image']?>" alt="<?=$cate_row['c_name']?>" width="200px" height="200px">
             <input type="file" id="c_image" name="c_image">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>