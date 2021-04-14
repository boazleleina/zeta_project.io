<?php
session_start();
include 'config.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:lecturer_home.php");
	}
	$name=mysqli_real_escape_string($link,$_REQUEST['name']);
	$phonenumber=mysqli_real_escape_string($link,$_REQUEST['phonenumber']);
	$email=mysqli_real_escape_string($link,$_REQUEST['email']);
	$address=mysqli_real_escape_string($link,$_REQUEST['address']);
	$password=mysqli_real_escape_string($link,$_REQUEST['password']);
    


    $sql="INSERT into users (name,phonenumber,email,address,password,usertype,created_at) values ('".$name."','".$phonenumber."','".$email."','".$address."','".md5($password)."','1','".date('Y-m-d H:i:s')."')";
	$qr=mysqli_query($link,$sql);
	if($qr){
		header("Location:../add_lecturer.php?success=Added Successfully");
	}
	else{
		header("Location:../add_lecturer.php?error=Failed to Add Lecturer");
	}
?>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}