<div class="nav-item">
            <div class="container ">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
<?php                            
   $select_subcategories_row = "SELECT * FROM subcategories WHERE sc_status=1 ORDER BY id LIMIT 6";
   $rsl_subcategories_row = $conn->query($select_subcategories_row);
   foreach($rsl_subcategories_row as $subcategories_rows){

      $id_category =$subcategories_rows['id_category'];
      $select_category_row = "SELECT id,c_name FROM categories WHERE id= $id_category";
      $rsl_category_row = $conn->query($select_category_row);
      $row_category=$rsl_category_row->fetch_assoc();
?>
                            <li class="active"><a href="<?=$row_category['id']?>"><?=$subcategories_rows['sc_name']?> / <?=$row_category['c_name']?></a></li>
<?php
   }
?>                          
                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="active"><a href="./index.php">Home</a></li>
                        <li><a href="shop.php">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="">Blog Details</a></li>
                                <li><a href="">Shopping Cart</a></li>
                                <li><a href="">Checkout</a></li>
                                <li><a href="">Faq</a></li>
                                <li><a href="">Register</a></li>
                                <li><a href="">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>