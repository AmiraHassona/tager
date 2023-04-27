<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }
   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');

$select_info="SELECT * FROM side_info";
$rslt_info=$conn->query($select_info);
$row_info=$rslt_info->fetch_assoc();
  
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
				<h2 class="page-header">Website Information</h2>
			</div>
      <div class="col-lg-12">
      <div class="card" >
      
        <img  src="../images/site_info/<?php echo $row_info['site_image'];?>" alt="<?php echo $row_info['site_name'];?>" width="100px">
         <div class="card-body">
          <h3 class="card-title text-capitalize"><?=$row_info['site_name'];?></h3>
         </div>
          <ul class="list-group list-group-flush">
              <li class="list-group-item"><h5>Website Phone :  <?=$row_info['site_phone'];?></h5></li>
              <li class="list-group-item"><h5>Website Email : <?=$row_info['site_email'];?> </h5></li>
              <li class="list-group-item"><h5>Website Address : <?=$row_info['site_address'];?> </h5></li>
              <li class="list-group-item"><h5>Website Location : <?=$row_info['site_location'];?> </h5></li>
              <li class="list-group-item"><h5>Website Facebook : <?=$row_info['site_facebook'];?></h5></li>
              <li class="list-group-item"><h5>Website Twitter :<?=$row_info['site_twitter'];?> </h5></li>
              <li class="list-group-item"><h5>Website Instagram : <?=$row_info['site_instagram'];?> </h5></li>
              <li class="list-group-item"><h5>Website Pinterest :<?=$row_info['site_pinterest'];?> </h5></li>
          </ul>
      </div>
      </div>
		</div><!--/.row-->
		<a href="edit_site_info.php" class="btn btn-info" style="margin-bottom:10px;"> Edit Information </a>




<?php
   $conn->close();
   include('partials/footer.php');
?>