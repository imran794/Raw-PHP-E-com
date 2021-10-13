<?php


include_once('admin/class/admin_back.php');

$obj = new AdminBack();

$data = $obj->P_DispalyCategory();

$ctgdatas = array();

while ($ctg=mysqli_fetch_assoc($data)) {
    $ctgdatas[] = $ctg;
}




?>

<?php include_once('includes/head.php'); ?>

<body class="biolife-body">

    <!-- Preloader -->
    <?php include_once('includes/preloader.php'); ?>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">

        <?php include_once('includes/header_top.php'); ?>
        <?php include_once('includes/header_middle.php'); ?>
        <?php include_once('includes/header_bottom.php'); ?>


    </header>

    
    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

               <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="#" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Email Address:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="user_email" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="user_password" value="" class="txt-input">
                                </p>
                                <p class="form-row wrap-btn">
                                    <button name="log_btn" class="btn btn-submit btn-bold" type="submit">Log in</button>
                                    <a href="#" class="link-to-help">Forgot your password</a>
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">New Customer?</h4>
                                <p class="sub-title">Create an account with us and you’ll be able to:</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="register.php" class="btn btn-bold">Create an account</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
            </div>
        </div>





        <!-- FOOTER -->
        <?php include_once('includes/footer.php'); ?>


        <!--Footer For Mobile-->
        <?php include_once('includes/footer_for_mobile.php'); ?>


        <!-- Scroll Top Button -->
        <?php include_once('includes/script.php'); ?>
</body>

</html>
