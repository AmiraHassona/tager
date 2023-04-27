<?php include('design_website/header.php');?>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header Section Begin -->
    <header class="header-section">
      <?php include('design_website/header_top.php');?>
      <?php include('design_website/navbar.php');?>
    </header>
    <!-- Header End -->

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="#"><i class="fa fa-home"></i> Home</a>
                        <span>Register</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Form Section Begin -->

    <!-- Register Section Begin -->
    <div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="register-form">
                        <h2>Register</h2>
                        <form >
                            <div class="row">   
                            <div class="group-input col-6">
                                <label for="first_name">First Name *</label>
                                <input type="text" id="first_name" name="first_name">
                            </div>
                            <div class="group-input col-6">
                                <label for="last_name">Last Name *</label>
                                <input type="text" id="last_name" name="last_name">
                            </div>
                            <div class="group-input col-12">
                                <label for="email">User Email *</label>
                                <input type="email" id="email" name="email">
                            </div>
                            <span class="group-input col-12" id="check_isemail"></span>
                            <div class="group-input col-12">
                                <label for="pass">Password *</label>
                                <input type="password" id="password" name="password">
                            </div>
                            <div class="group-input col-12">
                                <label for="con-pass">Confirm Password *</label>
                                <input type="password" id="con_password" name="con_password">
                            </div>
                            <div class="group-input col-12" id="check_password"></div>
                            <!-- <div class="group-input col-12">
                                <label for="inputGroupFile04">User Image *</label>
                                <div class="custom-file">
                                <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04"  name="image">
                                <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                </div>
                            </div> -->
                            <div class="group-input col-12">
                            <a class="site-btn register-btn send_register">REGISTER</a>
                            </div>
                            </div>
                        </form>
                        <div class="switch-login">
                            <a href="login.php" class="or-login">Or Login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->
    
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->

    <!-- Footer Section Begin -->
    <?php include('design_website/footer.php');?>