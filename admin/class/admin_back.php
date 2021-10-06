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


	 public function addcategory($data)
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

	 

}






?>