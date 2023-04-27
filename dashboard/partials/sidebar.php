
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">

				<img src="../images/admins/<?=$_SESSION['user']['image']?>" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name"><?=$_SESSION['user']['username']?></div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		<form role="search">
			<div class="form-group">
				<input type="text" class="form-control" placeholder="Search">
			</div>
		</form>
		<ul class="nav menu">
			<?php
			 $active_page=basename($_SERVER['PHP_SELF'],".php");
			 $active = "active" ;
			 
			?>
			<li class="<?php if($active_page =='index'||$active_page =='add_admin' ||$active_page =='edit_admin'){echo $active;}?>"><a href="index.php"><em class="fa fa-group">&nbsp;</em> Admins</a></li>

			<li class="<?php if($active_page =='category'||$active_page =='add_category' ||$active_page =='edit_category'){echo $active;}?>"><a href="category.php"><em class="fa fa-star">&nbsp;</em> Categories </a></li>

			<li class="<?php if($active_page =='subcategory'||$active_page =='add_subcategory' ||$active_page =='edit_subcategory'){echo $active;}?>"><a href="subcategory.php"><em class="fa fa-bars">&nbsp;</em> Subcategories </a></li>	

			<li class="<?php if($active_page =='product'||$active_page =='add_product'||$active_page =='details_product'||$active_page =='edit_product'){echo $active;}?>"><a href="product.php"><em class="fa fa-product-hunt">&nbsp;</em> Products </a></li>	

			<li class="<?php if($active_page =='category_blog'||$active_page =='add_category_blog' ||$active_page =='edit_category_blog'){echo $active;}?>"><a href="category_blog.php"><em class="fa  fa-sitemap">&nbsp;</em> Categories Blog </a></li>	
			
			<li class="<?php if($active_page =='blog'||$active_page =='add_Blog'||$active_page =='details_blog'||$active_page =='edit_blog'){echo $active;}?>"><a href="blog.php"><em class="fa  fa-file-text">&nbsp;</em> Blog </a></li>	
			
			<li class="<?php if($active_page =='message'||$active_page =='view_message'){echo $active;}?>"><a href="message.php"><em class="fa  fa-envelope ">&nbsp;</em> Messages </a></li>
			
			<li class="<?php if($active_page =='site_info'||$active_page =='edit_site_info'){echo $active;}?>"><a href="site_info.php"><em class="fa  fa-info-circle">&nbsp;</em>Site Informations</a></li>	

			<li><a href="functions/logout_action.php"><em class="fa fa-power-off">&nbsp;</em> Logout </a></li>
			
		</ul>
	</div><!--/.sidebar-->