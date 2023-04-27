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
				<h1 class="page-header">Products</h1>
			</div>
		</div><!--/.row-->
		<a href="add_product.php" class="btn btn-primary" style="margin-bottom:10px;"> Add Product </a>
		
		<table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Image</th>
		      <th scope="col">Action</th>
        </tr>
        </thead>
		<tbody>
<?php
$index = 1;
$select_product = "SELECT * FROM Products";
$rsl_product = $conn->query($select_product);
foreach($rsl_product  as $row_product){
   
?>		

        <tr>
          <th scope="row"><?=$index++?></th>
          <td><?=$row_product['p_name']?></td>
          <td><img src="../images/products/<?=$row_product['p_image']?>" alt="<?=$row_product['p_name']?>" width="100px" height="100px"></td>
		      <td>
            <a href="details_product.php?id=<?=$row_product['id']?>" class="btn btn-sm btn-success">Details</a>
            <a href="edit_product.php?id=<?=$row_product['id']?>" class="btn btn-sm btn-warning">Edit</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_product['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_product['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Are You Sure You Want Delete <span style="color:red ;"><?=$row_product['p_name']?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="functions/delete_product.php?id=<?=$row_product['id']?>"  class="btn btn btn-danger">Delete</a>
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