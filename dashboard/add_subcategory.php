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
				<h2 class="page-header">SUBCATEGORY</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/add_subcategory.php">
             <div class="form-group">
             <label for="name">Subcategory Name</label>
             <input type="text" class="form-control" id="name" placeholder="subcategory name" name="sc_name">
             </div>
             <div class="form-group">
             <label for="sc_icon">Subcategory Icon</label>
             <input type="text" class="form-control"  placeholder="subcategory icon" id="sc_icon" name="sc_icon">
             </div>
             <div class="form-group">
             <label for="status">Status</label>
             <select class="form-control" name="sc_status">
               <option selected disabled>Choose...</option>
               <option value="1"> Available</option>
               <option value="0"> Unavailable</option>
             </select>
             </div>
             <div class="form-group">
             <label for="cate_name">Category Name</label>
             <select class="form-control" name="cate_name">
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
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>