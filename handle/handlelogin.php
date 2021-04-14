<?php


session_start();
include 'config.php';

if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){

	//mysqli real escape prevent from sql injection which filter the user input
	$email=mysqli_real_escape_string($link,$_REQUEST['email']);
	$password=mysqli_real_escape_string($link,$_REQUEST['password']);
    $sql="select * from users where email='".$email."' and password='".md5($password)."'";
	$result=mysqli_query($link,$sql);
	if(mysqli_num_rows($result)>0){
		$data=mysqli_fetch_assoc($result);
		$_SESSION['user_data']=$data;
		if($data['usertype']==1){
			header("Location:../admin_home.php");
		}else{
			header("Location:../student_home.php");
		}

	}
	else{
		header("Location:index.php?error=Invalid Login Details");		
	}
}
else{
	header("Location:index.php?error=Please Enter Email and Password");
}