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
				<h1 class="page-header">Messages</h1>
			</div>
		</div><!--/.row-->
	
		<table class="table">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Message Title</th>
          <th scope="col">Message Read</th>
          <th scope="col">Message Date</th>
		      <th scope="col">Action</th>
        </tr>
        </thead>
		<tbody>
<?php
$index = 1;
$select_message = "SELECT * FROM messages";
$rsl_message = $conn->query($select_message);
foreach($rsl_message  as $row_message){

 if ($row_message['m_read'] == 0){
   $check_message_read = 'fa-square-o' ; 
 }elseif($row_message['m_read'] == 1){
   $check_message_read = 'fa-check-square-o' ; 
 }
?>		


        <tr>
          <th scope="row"><?=$index++?></th>
          <td><?=$row_message['m_title']?></td>
          <td><i class="fa <?=$check_message_read?>"></i></td>
          <td><?=$row_message['m_date']?></td>
		      <td>
            <a href="details_message.php?id=<?=$row_message['id']?>" class="btn btn-sm btn-success">Details</a>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?=$row_message['id']?>">
  Delete
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row_message['id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         Are You Sure You Want Delete <span style="color:red ;"><?=$row_message['m_title']?></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="functions/delete_message.php?id=<?=$row_message['id']?>"  class="btn btn btn-danger">Delete</a>
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