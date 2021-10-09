<?php


include_once('admin/class/admin_back.php');

$obj = new AdminBack();

$data = $obj->P_DispalyCategory();

$ctgdatas = array();

while ($ctg=mysqli_fetch_assoc($data)) {
    $ctgdatas[] = $ctg;
}

if (isset($_GET['status'])) {
    $getID = $_GET['id'];
    $catinfo = $obj->Category_to_product($getID);


    $catwproducts = array();

    while($catdata= mysqli_fetch_assoc($catinfo)){
        $catwproducts[] = $catdata;
    }
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

    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">
            <?php foreach($catwproducts as $cat) {
                 echo $cat['cat_name'];
           } ?>
        </h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="index.php" class="permal-link">Home</a></li>
                <?php foreach($catwproducts as $cat) { ?>
                <li class="nav-item"><span class="current-page"><?php echo $cat['pro_name']; ?></span></li>
                <?php } ?>
            </ul>
        </nav>
    </div>

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <div class="product-category grid-style">

                        <div id="top-functions-area" class="top-functions-area">
                            <div class="row">
                                <ul class="products-list">
                                    <?php foreach($catwproducts as $cat){ ?>
                                    <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                        <div class="contain-product layout-default">
                                            <div class="product-thumb">
                                                <a href="single_product.php?status=singleproduct&&id=<?php echo $cat['Pro_id']; ?>" class="link-to-product">
                                                    <img src="admin/uploadimage/<?php echo $cat['pro_img'] ?>" alt="dd" width="270" height="270" class="product-thumnail">
                                                </a>
                                            </div>
                                            <div class="info">
                                                <b class="categories"><?php echo $cat['cat_name'] ?></b>
                                                <h4 class="product-title"><a href="single_product.php?status=singleproduct&&id=<?php echo $cat['Pro_id']; ?>" class="pr-name"><?php echo $cat['pro_name']; ?></a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $cat['pro_price']; ?></span></ins>
                                                </div>
                                                <div class="shipping-info">
                                                    <p class="shipping-day">3-Day Shipping</p>
                                                    <p class="for-today">Pree Pickup Today</p>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">All products are carefully selected to ensure food safety.</p>
                                                    <div class="buttons">
                                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>add to cart</a>
                                                        <a href="single_product.php?status=singleproduct&&id=<?php echo $cat['Pro_id']; ?>" class="btn compare-btn"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                            <div class="biolife-panigations-block">
                                <ul class="panigation-contain">
                                    <li><span class="current-page">1</span></li>
                                    <li><a href="#" class="link-page">2</a></li>
                                    <li><a href="#" class="link-page">3</a></li>
                                    <li><span class="sep">....</span></li>
                                    <li><a href="#" class="link-page">20</a></li>
                                    <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                                </ul>
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
