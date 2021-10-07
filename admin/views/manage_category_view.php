<?php


$obj_adminback = new AdminBack();

$catdata = $obj_adminback->DispalyCategory();

if (isset($_GET['status'])){
	$getid = $_GET['id'];

	if ($_GET['status'] == 'deactive') {
	$message = $obj_adminback->DeactiveCategory($getid);
	}elseif($_GET['status'] == 'active'){
	  $message= $obj_adminback->ActiveCategory($getid);
	}

}

if (isset($_GET['status'])) {
	 $getid = $_GET['id'];
	 if ($_GET['status'] == 'delete') {
	 	$msg =  $obj_adminback->DeleteCategory($getid);
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
                         <td>Category Name</td>
                         <td>Category Description</td>
                         <td>Status</td>
                         <td>Action</td>
                     </tr>

                     <?php while ($cat= mysqli_fetch_assoc($catdata)) { ?>
                     <tr>
                         <td><?php echo $cat['cat_id']; ?></td>
                         <td><?php echo $cat['cat_name']; ?></td>
                         <td><?php echo $cat['cat_des']; ?></td>
                         <td>
                         	<?php if ($cat['cat_status'] == 1) {
                         	echo 	'Active';
                         	?>
                         	<a href="?status=deactive&&id=<?php echo $cat['cat_id']; ?>" class="btn btn-danger" title="">Deactive</a>
                         	<?php

                         	}else{ echo 'Deactive';
                         	?>
                           <a href="?status=active&&id=<?php echo $cat['cat_id']; ?>" class="btn btn-primary" title="">Active</a>
                         	<?php


                         }

                         	 ?>

                         	
                         </td>
                         <td>
                             <a href="edit_cat.php?status=edit&&id=<?php echo $cat['cat_id']; ?>" class="btn btn-primary" title="">Edit</a>
                             <a href="?status=delete&&id=<?php echo $cat['cat_id']; ?>" title="" class="btn btn-danger">Delete</a>
                         </td>
                     </tr>
                     <?php } ?>
                 </thead>
             </table>
         </div>
     </div>
 </div>
