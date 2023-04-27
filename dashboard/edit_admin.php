<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }

   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');

    $id= $_GET['id'];
    $select_admin_row = "SELECT * FROM admins WHERE id = $id";
    $rsl_admin_row = $conn->query($select_admin_row);
    $admin_row=$rsl_admin_row ->fetch_assoc();
    $role=$admin_row['role'];

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
            <form method="POST" action="functions/edit_admin.php" enctype="multipart/form-data">
             <div class="form-group">

             <input type="hidden" name="id" value="<?=$admin_row['id']?>">
             <label for="username">User Name</label>
             <input type="text" class="form-control" id="username" placeholder="username" name="username" value="<?=$admin_row['username']?>" >
             </div>
             <div class="form-group">
             <label for="password">Password</label>
             <input type="password" class="form-control" id="password" placeholder="password" name="password" value="<?=$admin_row['password']?>"  <?php if($admin_row['id']!=$_SESSION['user']['id']) {echo 'disabled';}?>>
             </div>
             <div class="form-group">
             <label for="image">Role</label>
             <select class="form-control" name="role">
               <option <?php if($role=='0') {echo'selected';}?> value="0">Super Admin</option>
               <option <?php if($role=='1') {echo'selected';}?> value="1">Admin</option>
             </select>
             </div>
             <div class="form-group">
             <label for="image">Image</label></br>
             <img src="../images/admins/<?=$admin_row['image']?>" alt="" width="200px" height="200px">
             <input type="file" id="image" name="image">
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>