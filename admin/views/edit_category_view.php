<?php


$obj_adminback = new AdminBack();

if (isset($_GET['status'])) {
    $getid = $_GET['id'];
    if ($_GET['status'] == 'edit') {
       $retrundata = $obj_adminback->EditCategory($getid);
    }
}

if (isset($_POST['cat_btn_up'])) {
  $msg =  $obj_adminback->UpdateCategory($_POST);
}



?>


 <h2 style="margin-bottom: 30px;">Update Category</h2>
          <?php if (isset($msg)) {
     echo $msg;
        } ?>

<div class="card-body">
    <form action="" method="POST">
        <input type="hidden" name="up_cat_id" value="<?php  echo $retrundata['cat_id']; ?>">
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Category Name</label>
            <input class="form-control" id="inputEmailAddress" name="cat_name_up" type="text" value="<?php echo $retrundata['cat_name']; ?>" />
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputPassword">Category Description</label>
            <textarea rows="4" class="form-control" name="cat_des_up"><?php echo $retrundata['cat_des']; ?></textarea>
        </div> 

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" name="cat_btn_up" value="Update Category" class="btn btn-primary">
      
        </div>
    </form>
</div>
