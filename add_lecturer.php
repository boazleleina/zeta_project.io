<?php
session_start();
include 'handle/config.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Student</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<form action="handle/handleadd_lecturer.php" method="post">
	<div class="container">
		<div class="row">
			<a href="admin_home.php" class="btn btn-info" style="margin:10px;">Home</a>
		</div>
		<div class="row">
   		<?php if(isset($_REQUEST['error'])){ ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
   		</div>
	   	<?php } ?>
	   	</div>
	   	<div class="row">
   		<?php if(isset($_REQUEST['success'])){ ?>
   		<div class="col-lg-12">
   			<span class="alert alert-success" style="display: block;"><?php echo $_REQUEST['success']; ?></span>
   		</div>
	   	<?php } ?>
	   	</div>
		<div class="row">
			<h2 style="margin:15px;" class="text-center">Add Lecturer</h2>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="text" name="name" placeholder="Full Name" required="required" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="text" name="phonenumber" placeholder="Phone Number" required="required" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="email" name="email" placeholder="Email" required="required" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="text" name="address" placeholder="Address" required="required" class="form-control">
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12 form-group">
				<input type="password" name="password" placeholder="Password" required="required" class="form-control">
			</div>
		</div>

        
		<div class="row">
			<div class="col-lg-12 form-group">
				<button type="submit" class="btn btn-info btn-block"> Add Lecturer</button>
			</div>
		</div>
	</div>
	</form>
</body>
</html>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}