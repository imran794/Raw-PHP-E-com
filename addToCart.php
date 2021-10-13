<?php

session_start();

include_once('admin/class/admin_back.php');

$obj = new AdminBack();

$data = $obj->P_DispalyCategory();

$ctgdatas = array();

while ($ctg=mysqli_fetch_assoc($data)) {
    $ctgdatas[] = $ctg;
}

if (isset($_POST['addcat_btn'])) {
    if (isset($_SESSION['cart'])) {
     $prodtcts = array_column($_SESSION['cart'], 'pdt_name');
     if (in_array($_POST['pdt_name'], $prodtcts)) {
         echo "<script>
         alert('The Product Already Added')
           </script>";
     }else{
        $count = count($_SESSION['cart']);
       $_SESSION['cart'][$count]=array(
            'pdt_name'  => $_POST['pdt_name'],
            'pdt_price'  => $_POST['pdt_price'],
            'pdt_img'  => $_POST['pdt_img'],
            'qty'  => 1,

        );
     }
       
    }else{
        $_SESSION['cart'][0]=array(
            'pdt_name'  => $_POST['pdt_name'],
            'pdt_price'  => $_POST['pdt_price'],
            'pdt_img'  => $_POST['pdt_img'],
            'qty'  => 1,

        );

    }
}

if (isset($_POST['remove_cart'])) {
     foreach($_SESSION['cart'] as $key => $value){
        if ($value['pdt_name'] == $_POST['prt_name']) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart']=array_values( $_SESSION['cart']);
        }

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
        <h1 class="page-title">Organic Fruits</h1>
    </div>
   
  

    <div class="page-contain single-product">
        <div class="container">
  <div class="shopping-cart-container" style="margin-top: 100px; margin-bottom: 100px;">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                            <h3 class="box-title">Your cart items</h3>
                            <form class="shopping-cart-form" action="#" method="post">
                                <table class="shop_table cart-form">
                                    <thead>
                                    <tr>
                                        <th class="product-name">Product Name</th>
                                        <th class="product-price">Price</th>
                                        <th class="product-quantity">Remove</th>
                                        <th class="product-subtotal">Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if(isset($_SESSION['cart'])){
                                        $subtotal = 0;
                                        foreach($_SESSION['cart'] as $key=>$value){ 
                                       $subtotal = $subtotal + $value['pdt_price'];


                                        ?>
                                    <tr class="cart_item">
                                        <td class="product-thumbnail" data-title="Product Name">
                                            <a class="prd-thumb" href="#">
                                                <figure><img width="113" height="113" src="admin/uploadimage/<?php echo $value['pdt_img']; ?>" alt="shipping cart"></figure>
                                            </a>
                                            <a class="prd-name" href="#"><?php echo $value['pdt_name']; ?></a>
                                            
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span><?php echo $value['pdt_price']; ?></span></ins>
                                            
                                            </div>
                                        </td>
                                        <td class="product-quantity" data-title="Quantity">
                                            <div class="quantity-box type1">
                                                <form action="" method="POST">
                                                    <input type="hidden" name="prt_name" value="<?php echo $value['pdt_name']; ?>">
                                                <div class="action">
                                                <button type="submit" name="remove_cart" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </div>
                                            </form>
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Total">
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">£</span>85.00</span></ins>
                                    
                                            </div>
                                        </td>
                                    </tr>
                                <?php } }else{
                                    echo 'The Cart is Empty';
                                }?>
                                    <tr class="cart_item wrap-buttons" style="padding-bottom: 100px;">
                                        <td class="wrap-btn-control" colspan="4">
                                            <a class="btn back-to-shop">Back to Shop</a>
                                            <button class="btn btn-update" type="submit" disabled>update</button>
                                            <button class="btn btn-clear" type="reset">clear all</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>
                        <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                            <div class="shpcart-subtotal-block"  style="margin-top: 40px;">
                                <div class="subtotal-line">
                                    <b class="stt-name">Subtotal <span class="sub">(2ittems)</span></b>
                                    <span class="stt-price">£<?php echo $subtotal; ?></span>
                                </div>
                                <div class="subtotal-line">
                                    <b class="stt-name">Shipping</b>
                                    <span class="stt-price">£0.00</span>
                                </div>
                                <div class="tax-fee">
                                    <p class="title">Est. Taxes & Fees</p>
                                    <p class="desc">Based on 56789</p>
                                </div>
                                <div class="btn-checkout">
                                    <a href="#" class="btn checkout">Check out</a>
                                </div>
                                <div class="biolife-progress-bar" >
                                    <table>
                                        <tr>
                                            <td class="first-position">
                                                <span class="index">$0</span>
                                            </td>
                                            <td class="mid-position">
                                                <div class="progress">
                                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td class="last-position">
                                                <span class="index">$99</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <p class="pickup-info"><b>Free Pickup</b> is available as soon as today More about shipping and pickup</p>
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
