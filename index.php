<?php


include_once('admin/class/admin_back.php');

$obj = new AdminBack();

$data = $obj->P_DispalyCategory();

$ctgdatas = array();

while ($ctg=mysqli_fetch_assoc($data)) {
    $ctgdatas[] = $ctg;
}

$manageproduct = $obj->ManageProduct();

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

    <!-- Page Contain -->
    <div class="page-contain">

        <!-- Main content -->
        <div id="main-content" class="main-content">

            <!--Block 01: Main Slide-->
            <?php include_once('includes/slider.php'); ?>

            <!--Block 02: Banners-->
            <?php include_once('includes/banner.php'); ?>


            <!--Block 03: Product Tabs-->
            <?php include_once('includes/related_products.php'); ?>


            <!--Block 04: Banner Promotion 01-->
            <?php include_once('includes/healthy_food.php'); ?>

            <!--Block 05: Banner promotion 02-->
            <?php include_once('includes/food_heaven.php'); ?>


            <!--Block 06: Products-->
            <?php include_once('includes/deals_ofthe.php'); ?>

            <!--Block 07: Brands-->
            <?php include_once('includes/brands.php'); ?>

            <!--Block 08: Blog Posts-->
            <?php include_once('includes/blog.php'); ?>

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
