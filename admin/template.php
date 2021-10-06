<?php

include('class/admin_back.php');

session_start();

$adminid = $_SESSION['id'];
$adminemail =  $_SESSION['email'];

if ($adminid == NULL) {
    header('location: index.php');
}

if (isset($_GET['adminlogout'])) {
    $adminobj = new AdminBack();
    $adminobj->adminlogout();

}



?>


<?php include('include/header.php'); ?>
  <body>
	  <div class="fixed-button">
		<a href="https://codedthemes.com/item/gradient-able-admin-template" target="_blank" class="btn btn-md btn-primary">
			<i class="fa fa-shopping-cart" aria-hidden="true"></i> Upgrade To Pro
		</a>
	  </div>
       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

        

               <?php include_once('include/topbar.php'); ?>

                    <div class="pcoded-main-container">
                 <div class="pcoded-wrapper">
                    <?php include_once('include/leftbar.php'); ?>

                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">

                                    <div class="page-body">
                                  
                                       <?php

                                        if ($views) {
                                          if ($views == 'dashboard') {
                                              include('views/dashboard_view.php');
                                          }
                                          elseif($views == 'addcategory') {
                                            include('views/add_category_view.php');
                                          } 
                                          elseif($views == 'addproduct') {
                                            include('views/add_product_view.php');
                                          }
                                           elseif($views == 'managecategory') {
                                            include('views/manage_product_view.php');
                                          } 
                                          elseif($views == 'manageproduct') {
                                            include('views/manage_product_view.php');
                                          }  
                                          elseif($views == 'manageuser') {
                                            include('views/manage_user_view.php');
                                          }
                                        }

                                       ?>

                                        </div>
                                    </div>

                                    <div id="styleSelector">

                                    </div>
                                </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Warning Section Starts -->
 
<!-- Warning Section Ends -->
<?php include('include/script.php'); ?>