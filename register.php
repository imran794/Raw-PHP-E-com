<?php


include_once('admin/class/admin_back.php');

$obj = new AdminBack();

$data = $obj->P_DispalyCategory();

$ctgdatas = array();

while ($ctg=mysqli_fetch_assoc($data)) {
    $ctgdatas[] = $ctg;
}

if (isset($_POST['regi_btn'])) {
   $msg =  $obj->UserRegister($_POST);
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
                  <?php if (isset($msg)) {
                     echo $msg;
                  } ?>
                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="#" name="frm-login" method="post">
                                <p class="form-row">
                                    <label for="fid-name">Full Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Frist Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_f_name" value="" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Last Name:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="user_l_name" class="txt-input">
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="user_email" value="" class="txt-input">
                                </p>

                                <p class="form-row">
                                    <label for="fid-pass">Password:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="user_password" class="txt-input">
                                </p> 
                                <p class="form-row">
                                    <label for="fid-pass">Number:<span class="requite">*</span></label>
                                    <input type="number" id="fid-pass" name="user_number" class="txt-input">
                                </p>
                                <input type="hidden" name="role" value="5">
                                <p class="form-row wrap-btn">
                                   <input style="color: white;" type="submit" value="Register" class="btn btn-success btn-block" name="regi_btn">
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Already Registered?</h4>
                                <p class="sub-title">Login to Access Youe Profile</p>
                                <ul class="lis">
                                    <li>Check out faster</li>
                                    <li>Save multiple shipping anddesses</li>
                                    <li>Access your order history</li>
                                    <li>Track new orders</li>
                                    <li>Save items to your Wishlist</li>
                                </ul>
                                <a href="login.php" class="btn btn-bold">Create an account</a>
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
