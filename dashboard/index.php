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
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		<a href="add_admin.php" class="btn btn-primary" style="margin-bottom:10px;"> Add admin </a>
		
		<table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">User Name</th>
          <th scope="col">Image</th>
          <th scope="col">Role</th>
		      <th scope="col">Action</th>
        </tr>
        </thead>
		<tbody>
<?php
$index = 1;
$select_admin = "SELECT * FROM admins";
$rsl_admin = $conn->query($select_admin);
foreach($rsl_admin  as $row_admin){
$role = $row_admin['role'];
 if ($role == '0') {
   $role_admin =' Super Admin ';
   $style_admin = 'color: blueviolet';
 }else  if ($role == '1') {
   $role_admin =' Admin ';
   $style_admin = 'color:MediumSeaGreen';
 }
   
?>		

        <tr>
          <th scope="row" ><?=$index++?></th>
          <td><?=$row_admin['username']?></td>
          <td><img src="../images/admins/<?=$row_admin['image']?>" alt="" width="100px" height="100px"></td>
          <td>
            <h4 style="font-weight: bold; <?=$style_admin;?>">
               <?=$role_admin;?>
            </h4>
          </td>
		      <td>
            <a href="edit_admin.php?id=<?=$row_admin['id']?>" class="btn btn-sm btn-warning">Edit</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_admin['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_admin['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Are You Sure You Want Delete <span style="color:red ;"><?=$row_admin['username']?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="functions/delete_admin.php?id=<?=$row_admin['id']?>"  class="btn btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>
          </td>
        </tr>
<?php
}
?>		
        </tbody>
        </table>

<?php
   $conn->close();
   include('partials/footer.php');
?>