<?php
   session_start();
   if(!isset($_SESSION['user'])){
	 header("location:login.php");
   }
   include('partials/header.php');
   include('partials/nav.php');
   include('partials/sidebar.php');

   $id= $_GET['id'];
   $select_blog_row = "SELECT * FROM blog WHERE id = $id";
   $rsl_blog_row = $conn->query($select_blog_row);
   $blog_row=$rsl_blog_row ->fetch_assoc();
  
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
				<h2 class="page-header">Details Blog</h2>
			</div>
		</div><!--/.row-->
    <h2 class="card-text" ><?=$blog_row['title']?></h2>
    <h4  class="" style="margin-left: 90%;"> <?=$blog_row['date']?></h4>
             <?php
               $select_cate = "SELECT id , cb_name FROM category_blog";
               $rsl_cate = $conn->query($select_cate);
               foreach($rsl_cate  as $row_cate){
               if($blog_row['category_blog_id'] == $row_cate['id']){
             ?>
             <h4 class="card-text" style=" margin-bottom:2em"><?=$row_cate['cb_name']?></h4>
             <?php
               }
              }
             ?>
      <div class="" style="display:flex; justify-content:center; flex-wrap:wrap;" > 
             <?php 
             $images = $blog_row['images'] ;
             $image = explode(',',$images) ;
             foreach($image as $key => $value){
             ?>  
            <div class="col-lg-4" style="margin-bottom: 2em">
               <img  src="../images/blogs/<?=$value?>" alt="<?=$blog_row['title']?>" width="100%"></br>
            </div>   
             <?php  
               }
             ?>
      </div>
  <div style="margin:2em">
  <h4 class="mb-3">Detalis:</h4>
  <p class="card-text"><?=$blog_row['detalis']?></p>
  <h4 class="mb-3">Quote:</h4>
  <p class="card-text"><?=$blog_row['quote']?></p>
  <h4>Author:</h4>
  <p class="card-text"><?=$blog_row['author']?></p>

  </div> 
  <a href="blog.php" class="btn btn-info" style=" margin-top: 1em; margin-bottom: 2em; margin-left: 80%;"> Back to Blogs</a>
<?php
   $conn->close();
   include('partials/footer.php');
?>