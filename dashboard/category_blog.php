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
				<h1 class="page-header">Category Blog</h1>
			</div>
		</div><!--/.row-->
		<a href="add_category_blog.php" class="btn btn-primary" style="margin-bottom:10px;"> Add Category Blog </a>
		
		<table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Category Blog Name</th>
		      <th scope="col">Action</th>
        </tr>
        </thead>
		<tbody>
<?php
$index = 1;
$select_cate = "SELECT * FROM category_blog";
$rsl_cate = $conn->query($select_cate);
foreach($rsl_cate  as $row_cate){
  
?>		

        <tr>
          <th scope="row"><?=$index++?></th>
          <td><?=$row_cate['cb_name']?></td>
		      <td>
            <a href="edit_category_blog.php?id=<?=$row_cate['id']?>" class="btn btn-sm btn-warning">Edit</a>
 <!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_cate['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_cate['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Are You Sure You Want Delete <span style="color:red ;"><?=$row_cate['cb_name']?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="functions/delete_category_blog.php?id=<?=$row_cate['id']?>"  class="btn btn btn-danger">Delete</a>
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