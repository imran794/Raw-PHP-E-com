<?php


 $adminobj = new AdminBack();

 $categoies = $adminobj->P_DispalyCategory();

 if (isset($_GET['status'])) {
     $getID = $_GET['id'];
     if ($_GET['status'] == 'edit') {
        $pro_datas =  $adminobj->EditProduct($getID);
     }
 }

if (isset($_POST['pro_btn_update'])) {
   $msg =  $adminobj->UpdateProduct($_POST);
 }


?>



   <h2 style="margin-bottom: 30px;">Update Product</h2>

<div class="card-body">
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="pro_id_u" value="<?php echo $pro_datas['Pro_id']; ?>">
    	<?php if (isset($msg)) {
    		echo $msg;
    	} ?>
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Product Name</label>
            <input class="form-control" id="inputEmailAddress" name="u_pro_name" type="text" value="<?php echo $pro_datas['pro_name']; ?>" />
        </div>
         <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Product Price</label>
            <input class="form-control" id="inputEmailAddress" name="u_pro_price" type="text" value="<?php echo $pro_datas['pro_price']; ?>" />
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputPassword">Product Description</label>
            <textarea rows="4" class="form-control" name="u_pro_des" placeholder="Product Description"><?php echo $pro_datas['pro_des']; ?></textarea>
        </div> 

          <div class="form-group">
            <label class="small mb-1" for="inputPassword">Product Category</label>
             <select name="u_pro_cat_id" class="form-control">
             	<option value="">Select Category</option>}
             	<?php while($category= mysqli_fetch_assoc($categoies)) { ?>
                <option value="<?php echo $category['cat_id']; ?>"><?php echo $category['cat_name']; ?></option>
            <?php } ?>
            </select>
        </div> 
          <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Product Image</label>
            <input class="form-control" id="inputEmailAddress" name="u_pro_img" type="file"/>
            <div class="pt-3">
                <img src="uploadimage/<?php echo $pro_datas['pro_img']; ?>" alt="">
            </div>
        </div>

         <div class="form-group">
            <label class="small mb-1" for="inputPassword">Product Status</label>
             <select name="u_pro_status" class="form-control">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" name="pro_btn_update" value="Update Product" class="btn btn-primary">
      
        </div>
    </form>
</div>