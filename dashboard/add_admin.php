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
				<h2 class="page-header">ADMIN</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/add_admin.php" enctype="multipart/form-data">
             <div class="form-group">
             <label for="username">User Name</label>
             <input type="text" class="form-control" id="username" placeholder="username" name="username">
             </div>
             <div class="form-group">
             <label for="password">Password</label>
             <input type="password" class="form-control " id="password" placeholder="password" name="password">
             </div>
             <div class="form-group">
             <label for="role">Role</label>
             <select class="form-control" name="role">
               <option selected disabled>Choose...</option>
               <option value="0">Super Admin</option>
               <option value="1">Admin</option>
             </select>
             </div>
             <div class="form-group">
             <label for="image">Image</label>
             <input type="file" id="image" name="image">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>