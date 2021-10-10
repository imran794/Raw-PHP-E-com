<?php


$obj_adminback = new AdminBack();

$manageproduct = $obj_adminback->ManageProduct();

if (isset($_GET['status'])) {
	$getID = $_GET['id'];
	if ($_GET['status'] == 'delete') {
		$msg = $obj_adminback->DeleteProduct($getID);
	}
}


?>


 <div class="container">
     <div class="row">
         <div class="col-lg-12">
         	<h2 style="margin-bottom: 30px;">Manage Category</h2>
         	  <?php if (isset($msg)) {
              echo $msg;
                } ?>
             <table class="table">
                 <thead>

                     <tr>
                         <td>ID</td>
                         <td>Name</td>
                         <td>Price</td>
                         <td>Image</td>
                         <td>Status</td>
                         <td>Category ID</td>
                         <td>Action</td>
                     </tr>

                     <?php while ($allproduct= mysqli_fetch_assoc($manageproduct)) { ?>
                     <tr>
                         <td><?php echo $allproduct['Pro_id']; ?></td>
                         <td><?php echo $allproduct['pro_name']; ?></td>
                         <td>$<?php echo $allproduct['pro_price']; ?></td>
                         <td>
                         	<img style="height: 150px"; src="uploadimage/<?php echo $allproduct['pro_img']; ?>" alt="">
                         </td>
                         <td>
                         	<?php
                                if ($allproduct['pro_status'] == 1) {
                                	echo 'Published';
                                }else{
                                	echo 'UnPublished';
                                }
                         	?>
                         </td>
                              <td><?php echo $allproduct['cat_name']; ?></td>
                         <td>
                             <a href="edit_product.php?status=edit&&id=<?php echo $allproduct['Pro_id']; ?>" class="btn btn-primary" title="">Edit</a>
                             <a href="?status=delete&&id=<?php echo $allproduct['Pro_id']; ?>" title="" class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                     <?php } ?>
                 </thead>
             </table>
         </div>
     </div>
 </div>
