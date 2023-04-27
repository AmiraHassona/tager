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
				<h2 class="page-header">BLOG</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/add_blog.php" enctype="multipart/form-data">
            <div class="form-group">
             <label for="category_blog">Category Blog</label>
             <select class="form-control" id="category_blog" name="category_blog_id">
               <option selected disabled>Choose...</option>
               <?php
               $select_cate = "SELECT id , cb_name FROM category_blog";
               $rsl_cate = $conn->query($select_cate);
               foreach($rsl_cate  as $row_cate){
                ?>
               <option value="<?=$row_cate['id']?>"><?=$row_cate['cb_name']?></option>
               <?php
               }
               ?>
             </select>
             </div>         
             <div class="form-group">
             <label for="title">Blog Title</label>
             <input type="text" class="form-control" id="title" placeholder="Blog Title" name="title">
             </div>
             <div class="form-group">
             <label for="detalis">Blog Detalis</label></br>
             <textarea name="detalis" id="detalis"  rows="3" class="form-control" placeholder="Blog Detalis"></textarea>
             </div>
             <div class="form-group">
             <label for="quote">Quote</label></br>
             <textarea name="quote" id="quote"  rows="3" class="form-control" placeholder="Quote"></textarea>
             </div>
             <div class="form-group">
             <label for="author">Author</label></br>
             <textarea name="author" id="author"  rows="3" class="form-control" placeholder="Author"></textarea>
             </div>
             <div class="form-group">
             <label for="images">Blog Image</label>
             <input type="file" id="images" name="images[]" multiple>
             </div>
         
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>