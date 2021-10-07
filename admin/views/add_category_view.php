<?php


 $adminobj = new AdminBack();

if (isset($_POST['cat_btn'])) {
    $msg = $adminobj->addcategory($_POST);
}


?>



   <h2 style="margin-bottom: 30px;">Add Category</h2>
          <?php if (isset($msg)) {
     echo $msg;
        } ?>

<div class="card-body">
    <form action="" method="POST">
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Category Name</label>
            <input class="form-control" id="inputEmailAddress" name="cat_name" type="text" placeholder="Category Name" />
        </div>
        <div class="form-group">
            <label class="small mb-1" for="inputPassword">Category Description</label>
            <textarea rows="4" class="form-control" name="cat_des" placeholder="Category Description"></textarea>
        </div> 

          <div class="form-group">
            <label class="small mb-1" for="inputPassword">Category Status</label>
             <select name="cat_status" class="form-control">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
            </select>
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" name="cat_btn" value="Add Category" class="btn btn-primary">
      
        </div>
    </form>
</div>