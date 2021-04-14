<?php
session_start();
include 'config.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}
	$name=mysqli_real_escape_string($link,$_REQUEST['name']);
	$phonenumber=mysqli_real_escape_string($link,$_REQUEST['phonenumber']);
	$email=mysqli_real_escape_string($link,$_REQUEST['email']);
	$address=mysqli_real_escape_string($link,$_REQUEST['address']);
	$password=mysqli_real_escape_string($link,$_REQUEST['password']);
	$status=1;


    $sql="INSERT into users (name,phonenumber,email,address,password,usertype,created_at,status) values ('".$name."','".$phonenumber."','".$email."','".$address."','".md5($password)."','2','".date('Y-m-d H:i:s')."','".$status."')";
	$qr=mysqli_query($link,$sql);
	if($qr){
		header("Location:../add_student.php?success=Added Successfully");
	}
	else{
		header("Location:../add_student.php?error=Failed to Add Student");
	}
?>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}