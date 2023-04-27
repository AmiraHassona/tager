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
      <form method="post" action="functions/edit_site_info.php" enctype="multipart/form-data">   
        <!-- site Name -->
        <div class="form-group">  
            <label>Website Name</label> 
            <input type="text" class="form-control" name="site_name" value="<?=$row_info['site_name'];?>">
        </div>
        <!-- site email -->
        <div class="form-group">  
            <label>Website Email</label> 
            <input type="text" class="form-control" name="site_email" value="<?=$row_info['site_email'];?>">
        </div>
        <!-- site phone -->
        <div class="form-group">  
            <label>Website Phone</label> 
            <input type="text" class="form-control" name="site_phone" value="<?=$row_info['site_phone'];?>">
        </div>
         <!-- site address -->
         <div class="form-group">  
            <label>Website Address</label> 
            <input type="text" class="form-control" name="site_address" value="<?=$row_info['site_address'];?>">
        </div>
           <!-- site location -->
        <div class="form-group">  
            <label>Website Location</label> 
            <input type="text" class="form-control" name="site_location" value="<?=$row_info['site_location'];?>">
        </div>
         <!-- site facebook -->
         <div class="form-group">  
            <label>Website Facebook</label> 
            <input type="text" class="form-control" name="site_facebook" value="<?=$row_info['site_facebook'];?>">
        </div>
         <!-- site twitter -->
        <div class="form-group">  
            <label>Website Twitter</label> 
            <input type="text" class="form-control" name="site_twitter" value="<?=$row_info['site_twitter'];?>">
        </div>
                     <!-- site instgram -->
         <div class="form-group">  
            <label>Website Instgram</label> 
            <input type="text" class="form-control" name="site_instagram" value="<?=$row_info['site_instagram'];?>">
        </div>
                     <!-- site pintrest -->
         <div class="form-group">  
            <label>Website Pinterest</label> 
            <input type="text" class="form-control" name="site_pinterest" value="<?=$row_info['site_pinterest'];?>">
        </div>
        <div class="form-group">
            <label>Website Logo</label> <br>
            <img  src="../images/site_info/<?php echo $row_info['site_image'];?>" alt="<?php echo $row_info['site_name'];?>" width="100px">
            <input type="file" name="site_image" >
        </div>
        <input type="submit" name="submit" value="Edit" class="btn btn-primary">
     </form>
  
    </div>
   </div><!--/.row-->
<?php
   $conn->close();
   include('partials/footer.php');
?>