<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }
   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');

   $id= $_GET['id'];
   $update_message_read ="UPDATE messages SET m_read='1' WHERE id = $id";
   $conn->query($update_message_read);

   $select_message_row = "SELECT * FROM messages WHERE id = $id";
   $rsl_message_row = $conn->query($select_message_row);
   $message_row=$rsl_message_row->fetch_assoc();
  
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
				<h2 class="page-header">Details Message</h2>
			</div>
		</div><!--/.row-->
    
    <div class="card mb-3 " style="padding: 30px;">
        <div class="row no-gutters">
         <div class="col-md-12">
          <div class="card-body">
            <h3 class="card-title" style="color:blue;"><?=$message_row['m_title']?></h3>
            <p class="card-text">Message Date : <?=$message_row['m_date']?></p>
            <p class="card-text">User Name : <?=$message_row['username']?></p>
            <p class="card-text">user Email : <?=$message_row['email']?></p>
            <p class="card-text">Message : <?=$message_row['message']?></p>
          </div>
          <a href="message.php" class=" btn btn-info" > Back to Messages</a>
         </div>
        </div>
    </div>
   


<?php
   $conn->close();
   //include('partials/footer.php');
?>