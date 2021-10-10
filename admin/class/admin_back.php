<?php


class AdminBack{

	 private $conn;

	 public function __construct()
	 {
	 	# Database host, Database user, Database password, Database name

	 	$dbhost = 'localhost';
	 	$dbuser = 'root';
	 	$dbpass = '';
	 	$dbname = 'e-comrawphp';

	 	$this->conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	 	if (!$this->conn) {
	 		die('Database Connecction Error!!');
	 	}
	 }

	 public function adminLogin($data)
	 {
	 	 $email = $data['email'];
	 	 $pass = md5($data['password']);

	 	 $query = "SELECT * FROM adminlogin WHERE email='$email' AND  password='$pass'";

	 	 if (mysqli_query($this->conn, $query)) {
	 	 	 $result = mysqli_query($this->conn, $query);
	 	 	 $amdininfo = mysqli_fetch_assoc($result);

	 	 	 if ($amdininfo) {
	 	 	  header('location: dashboard.php');

	 	 	  session_start();
	 	 	  $_SESSION['id'] = $amdininfo['id'];
	 	 	  $_SESSION['email'] = $amdininfo['email'];
	 	 	  $_SESSION['password'] = $amdininfo['password'];

	 	 	  

	 	 	 }
	 	 	 else{
	 	 	 	$msg = 'Your User Name or Password is Incorrect!';
	 	 	 	 return $msg;
	 	 	 }
	 	 }
	 }

	 public function adminlogout()
	 {
	 	 unset( $_SESSION['id']);
	 	 unset( $_SESSION['email']);
	 	 unset( $_SESSION['password']);
	 	 header('location: index.php');
	 }


	  function addcategory($data)
	 {
	 	 $category_name = $data['cat_name'];
	 	 $category_des = $data['cat_des'];
	 	 $category_status = $data['cat_status'];

	 	 $query = "INSERT INTO category(cat_name,cat_des,cat_status) VALUE ('$category_name','$category_des','$category_status')";

	 	 if (mysqli_query($this->conn, $query)) {
	 	 	$message = 'Category Added Successfully!';
	 	 	return $message;
	 	 }
	 	 else{
	 	 	$message = 'Category Not Added!';
	 	 	return $message;
	 	 }
	 }

	  function DispalyCategory()
	 {
	 	$query = "SELECT * FROM category";

	 	if (mysqli_query($this->conn, $query)) {
	 		$allcategory = mysqli_query($this->conn, $query);
	 		return $allcategory;
	 	}
	 }

     function P_DispalyCategory()
	 {
	 	$query = "SELECT * FROM category WHERE cat_status=1";

	 	if (mysqli_query($this->conn, $query)) {
	 		$allcategory = mysqli_query($this->conn, $query);
	 		return $allcategory;
	 	}
	 }


	 function DeactiveCategory($id)
	 {
	 	$query = "UPDATE category SET cat_status=0 WHERE cat_id='$id'";

	 	if (mysqli_query($this->conn, $query)) {
	 		$msg = mysqli_query($this->conn, $query);
	 		return $msg;
	 	}
	 }


	 function ActiveCategory($id)
	 {
	 	$query = "UPDATE category SET cat_status=1 WHERE cat_id='$id'";

	   mysqli_query($this->conn, $query);
	 }

	 function DeleteCategory($id)
	 {
	    $query = "DELETE FROM category WHERE cat_id='$id'";

	    if (mysqli_query($this->conn, $query)) {
	    	$msg = 'Category Delete Successfully!';
	 	 	return $msg;
	    }
	 }

	 function EditCategory($id)
	 {
	 	$query = "SELECT * FROM category WHERE cat_id='$id'";

	 	if (mysqli_query($this->conn, $query)) {
	 		$allarraydata = mysqli_query($this->conn, $query);
	 		$alldata = mysqli_fetch_assoc($allarraydata);
	 		return $alldata;
	 	}
	 }

	 function UpdateCategory($Cat_data)
	 {
	 	$cat_name = $Cat_data['cat_name_up'];
	 	$cat_des = $Cat_data['cat_des_up'];
	 	$cat_id = $Cat_data['up_cat_id'];

	 	$query = "UPDATE category SET cat_name='$cat_name',cat_des='$cat_des' WHERE cat_id='$cat_id'";

	 	if (mysqli_query($this->conn, $query)) {
	 		$ret_msg = "Category Update Successfully!";
	 	}
	 }

	 function AddProduct($data)
	 {
	 	$pdt_name = $data['pro_name'];
	 	$pdt_price = $data['pro_price'];
	 	$dpt_des = $data['pro_des'];
	 	$cat_id = $data['pro_cat_id'];
	 	$pdt_img_name = $_FILES['pro_img']['name'];
	 	$pdt_img_size = $_FILES['pro_img']['size'];
	 	$pdt_img_tmp_name = $_FILES['pro_img']['tmp_name'];
	 	$pdt_img_extension = pathinfo($pdt_img_name, PATHINFO_EXTENSION);
	 	$pdt_status = $data['pro_status'];

	 	if ($pdt_img_extension == 'png' or $pdt_img_extension == 'jpg' or $pdt_img_extension == 'jpeg') {
	 		if ($pdt_img_size <= 2097152) {
	 		   $query = "INSERT INTO product(pro_name,pro_price,pro_des,pro_cat_id,pro_img,pro_status) VALUE('$pdt_name','$pdt_price','$dpt_des',$cat_id,'$pdt_img_name',$pdt_status)";

	 		   if (mysqli_query($this->conn, $query)) {
	 		   	 move_uploaded_file($pdt_img_tmp_name, 'uploadimage/'.$pdt_img_name);
	 		   	 $msg = 'Product Insert Successfully!';
	 		   	 return $msg;
	 		   }
	 		}
	 		else{
	 			'Your File Size Should Be Less Or Equal 2 MB';
	 		}
	 	}
	 	else{
	 		 $msg = "Your File Must be a Png Or JPG Or JPEG";
	 	}
	 }


	 function Category_to_product($id)
	 {
	 	 $query = "SELECT * FROM  product_info_category WHERE cat_id='$id'";

	 	 if (mysqli_query($this->conn, $query)) {
	 	 	 $catproduct = mysqli_query($this->conn, $query);
	 	 	 return $catproduct;
	 	 }
	 }

	 function product_by_id($id)
	 {
	 	$query = "SELECT * FROM product_info_category WHERE Pro_id='$id'";

	 	if (mysqli_query($this->conn, $query)) {
	 		$dataproduct = mysqli_query($this->conn, $query);
	 		return $dataproduct;
	 	}
	 }

	 function ManageProduct()
	 {
	 	$query = "SELECT * FROM product_info_category";

	 	if (mysqli_query($this->conn, $query)) {
	 		$ManageProduct = mysqli_query($this->conn, $query);
	 		return $ManageProduct;
	 	}
	 }

	 function DeleteProduct($id)
	 {
	 	$query = "DELETE FROM product WHERE Pro_id='$id'";

	 	if (mysqli_query($this->conn, $query)) {
	 		$msg = "Product Delete Successfully!";
	 		return $msg;
	 	}
	 }

	 function EditProduct($id)
	 {
	 	$query = "SELECT * FROM product_info_category WHERE Pro_id='$id'";

	 	if (mysqli_query($this->conn, $query)) {
	 		$pro_info = mysqli_query($this->conn, $query);
	 		$pro_data = mysqli_fetch_assoc($pro_info);
	 		return $pro_data;
	 	}
	 }

	 public function UpdateProduct($data)
	 {
	 	$pdt_id = $data['pro_id_u'];
	 	$pdt_name = $data['u_pro_name'];
	 	$pdt_price = $data['u_pro_price'];
	 	$dpt_des = $data['u_pro_des'];
	 	$cat_id = $data['u_pro_cat_id'];
	 	$pdt_img_name = $_FILES['u_pro_img']['name'];
	 	$pdt_img_size = $_FILES['u_pro_img']['size'];
	 	$pdt_img_tmp_name = $_FILES['u_pro_img']['tmp_name'];
	 	$pdt_img_extension = pathinfo($pdt_img_name, PATHINFO_EXTENSION);
	 	$pdt_status = $data['u_pro_status'];

	 	if ($pdt_img_extension == 'png' or $pdt_img_extension == 'jpg' or $pdt_img_extension == 'jpeg') {
	 		if ($pdt_img_size <= 2097152) {
	 		   $query = "UPDATE product SET pro_name='$pdt_name',pro_price=$pdt_price,pro_des='$dpt_des',pro_cat_id=$cat_id,pro_img='$pdt_img_name',pro_status=$pdt_status WHERE Pro_id=$pdt_id";

	 		   if (mysqli_query($this->conn, $query)) {
	 		   	 move_uploaded_file($pdt_img_tmp_name, 'uploadimage/'.$pdt_img_name);
	 		   	 $msg = 'Product Insert Successfully!';
	 		   	 return $msg;
	 		   }
	 		}
	 		else{
	 			'Your File Size Should Be Less Or Equal 2 MB';
	 		}
	 	}
	 	else{
	 		 $msg = "Your File Must be a Png Or JPG Or JPEG";
	 	}
	 }

	 function Related_Products($id)
	 {
	 	$query = "SELECT * FROM product_info_category WHERE cat_id=$id ORDER BY Pro_id DESC LIMIT 2";
	 	if (mysqli_query($this->conn, $query)) {
	 		$related_pro = mysqli_query($this->conn, $query);
	 		return $related_pro;
	 	}
	 }

	 
}



?>
