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
				<h2 class="page-header">CATEGORY</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/add_category.php" enctype="multipart/form-data">
             <div class="form-group">
             <label for="name">Category Name</label>
             <input type="text" class="form-control" id="name" placeholder="category name" name="c_name">
             </div>
             <div class="form-group">
             <label for="status">Status</label>
             <select class="form-control" name="status">
               <option selected disabled>Choose...</option>
               <option value="1"> Available</option>
               <option value="0"> Unavailable</option>
             </select>
             </div>
             <div class="form-group">
             <label for="c_image">Category Image</label>
             <input type="file" id="c_image" name="c_image">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>