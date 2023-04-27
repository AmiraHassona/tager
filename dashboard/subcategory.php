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
				<h1 class="page-header">Subcategories</h1>
			</div>
		</div><!--/.row-->
		<a href="add_subcategory.php" class="btn btn-primary" style="margin-bottom:10px;"> Add Subcategory </a>
		
		<table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Name</th>
          <th scope="col">Subcategory Name</th>
          <th scope="col">Subcategory Icon</th>
          <th scope="col">Status</th>
		      <th scope="col">Action</th>
        </tr>
        </thead>
		<tbody>
<?php
$index = 1;
$select_scate = "SELECT * FROM subcategories";
$rsl_scate = $conn->query($select_scate);
foreach($rsl_scate  as $row_scate){

      $status = $row_scate['sc_status'];
         if ($status  == '0') {
         $role_scate =' Unavailable ';
         $style_scate = 'color:Tomato';
         }else  if ($status  == '1') {
         $role_scate =' Available ';
         $style_scate = 'color:Violet';
         }
$id_cate= $row_scate['id_category'];
$select_cate = "SELECT c_name FROM categories Where id=$id_cate";
$rsl_cate = $conn->query($select_cate);
$row_cate = $rsl_cate->fetch_assoc();        
         
?>		

        <tr>
          <th scope="row"><?=$index++?></th>
          <td><?=$row_cate['c_name']?></td>
          <td><?=$row_scate['sc_name']?></td>
          <td><i class="fa fa-<?=$row_scate['sc_icon']?>"></i></td>
          <td>
            <h4 style="font-weight: bold; <?=$style_scate;?>">
               <?=$role_scate;?>
            </h4>
          </td>
		      <td>
            <a href="edit_subcategory.php?id=<?=$row_scate['id']?>" class="btn btn-sm btn-warning">Edit</a>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_scate['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_scate['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Are You Sure You Want Delete <span style="color:red ;"><?=$row_scate['sc_name']?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="functions/delete_subcategory.php?id=<?=$row_scate['id']?>"  class="btn btn btn-danger">Delete</a>
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