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
				<h2 class="page-header">Blog Edit</h2>
			</div>
            <div class="col-lg-12">
            <form method="POST" action="functions/edit_blog.php" enctype="multipart/form-data">
             <input type="hidden" name="id" value="<?=$blog_row['id']?>">
             <div class="form-group">
             <label for="category"> Blog Category</label>
             <select class="form-control" id="category" name="category_blog_id">
               <?php
               $select_cate = "SELECT id , cb_name FROM category_blog";
               $rsl_cate = $conn->query($select_cate);
               foreach($rsl_cate  as $row_cate){
                ?>
                <option value="<?=$row_cate['id']?>" <?php if($blog_row['category_blog_id'] == $row_cate['id']) {echo'selected';}?>><?=  $row_cate['cb_name'];?></option>
               <?php
               }
               ?>
             </select>
             </div>
             <div class="form-group">
             <label for="title">Blog Title</label>
             <input type="text" class="form-control" id="title" placeholder="Blog Title" name="title" value="<?=$blog_row['title'];?>">
             </div>
             <div class="form-group">
             <label for="detalis">Blog Detalis</label></br>
             <textarea name="detalis" id="detalis"  rows="3" class="form-control" placeholder="Blog Detalis"><?=$blog_row['detalis'];?></textarea>
             </div>
             <div class="form-group">
             <label for="quote">Quote</label></br>
             <textarea name="quote" id="quote"  rows="3" class="form-control" placeholder="Quote"><?=$blog_row['quote'];?></textarea>
             </div>
             <div class="form-group">
             <label for="author">Author</label></br>
             <textarea name="author" id="author"  rows="3" class="form-control" placeholder="Author"><?=$blog_row['author'];?></textarea>
             </div>
             <div class="form-group " >
             <label for="image">blog Image</label></br>
             <div class="" style="display:flex; justify-content:center; flex-wrap:wrap;" > 
             <?php 
             $images = $blog_row['images'] ;
             $image = explode(',',$images) ;
             foreach($image as $key => $value){
             ?>  
               <div style="margin-bottom: 2em">
               <img  src="../images/blogs/<?=$value?>" alt="<?=$blog_row['title']?>" width="300px" height="200px"></br>
               <input type="file" id="image" name="images[]" multiple>
               </div>
             <?php  
               }
             ?>
             </div>
             </div>
             <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
		</div><!--/.row-->
		
	
<?php
   include('partials/footer.php');
?>