<?php


 $adminobj = new AdminBack();

 $categoies = $adminobj->P_DispalyCategory();

 if (isset($_POST['pro_btn'])) {
 	$msg = $adminobj->AddProduct($_POST);
 }


?>



   <h2 style="margin-bottom: 30px;">Add Product</h2>

<div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
    	<?php if (isset($msg)) {
    		echo $msg;
    	} ?>
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Product Name</label>
            <input class="form-control" id="inputEmailAddress" name="pro_name" type="text" placeholder="Product Name" />
        </div>
         <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Product Price</label>
            <input class="form-control" id="inputEmailAddress" name="pro_price" type="text" placeholder="Product Price" />
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputPassword">Product Description</label>
            <textarea rows="4" class="form-control" name="pro_des" placeholder="Product Description"></textarea>
        </div> 

          <div class="form-group">
            <label class="small mb-1" for="inputPassword">Product Category</label>
             <select name="pro_cat_id" class="form-control">
             	<option value="">Select Category</option>}
             	<?php while($category= mysqli_fetch_assoc($categoies)) { ?>
                <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
            <?php } ?>
            </select>
        </div> 
          <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Product Image</label>
            <input class="form-control" id="inputEmailAddress" name="pro_img" type="file" placeholder="Product Image" />
        </div>

         <div class="form-group">
            <label class="small mb-1" for="inputPassword">Product Status</label>
             <select name="pro_status" class="form-control">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" name="pro_btn" value="Add Product" class="btn btn-primary">
      
        </div>
    </form>
</div>