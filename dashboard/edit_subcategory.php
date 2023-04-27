<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }

   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');

    $id= $_GET['id'];
    $select_scate_row = "SELECT * FROM subcategories WHERE id = $id";
    $rsl_scate_row = $conn->query($select_scate_row);
    $scate_row=$rsl_scate_row ->fetch_assoc();
    $status=$scate_row['sc_status'];

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
				<h2 class="page-header">SUBCATEGORIES</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/edit_subcategory.php">
             <input type="hidden" name="id" value="<?=$scate_row['id']?>">
             <div class="form-group">
             <label for="name">Subcategory Name</label>
             <input type="text" class="form-control" id="name" name="sc_name" value="<?=$scate_row['sc_name']?>" >
             </div>
             <div class="form-group">
             <label for="icon">Subcategory Icon</label>
             <input type="text" class="form-control" id="icon"  name="sc_icon" value="<?=$scate_row['sc_icon']?>" >
             </div>
             <div class="form-group">
             <label for="image">Status</label>
             <select class="form-control" name="sc_status">
               <option <?php if($status =='1') {echo'selected';}?> value="1">Available</option>
               <option <?php if($status =='0') {echo'selected';}?> value="0">Unavailable</option>
             </select>
             </div>
             <div class="form-group">
             <label for="id_category">Category</label>
             <select class="form-control" name="id_category">
               <?php
               $select_cate = "SELECT id , c_name FROM categories";
               $rsl_cate = $conn->query($select_cate);
               foreach($rsl_cate  as $row_cate){
                ?>
                <option value="<?=$row_cate['id']?>" <?php if($scate_row['id_category'] == $row_cate['id']) {echo'selected';}?>><?=  $row_cate['c_name'];?></option>
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