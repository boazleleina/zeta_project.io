<?php
session_start();
include 'handle/config.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}
	if(!isset($_REQUEST['id'])){
		header("Location:result_home.php?error=Please Enter ID");
	} 
	$qr=mysqli_query($link,"select * from users where usertype='2'");
	if(mysqli_num_rows($qr)==0){
		header("Location:result_home.php?error=Student ID Not Found");	
	}
	$result_qr=mysqli_query($link,"select * from results where student_id='id'");
	if(mysqli_num_rows($result_qr)>0){
		header("Location:result_home.php?error=Student Result Already Exist");	
	}
	$subjects=array();
	$subject_qr=mysqli_query($link,"select * from subjects");
	while($row=mysqli_fetch_assoc($subject_qr)){
		array_push($subjects,$row);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Result</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	<form action="handle/handleadd_result.php" method="post">
		<div class="row">
			<div col-lg-12>
				<a href="result_home.php" style="margin: 10px" class="btn btn-info">Home</a>
			</div>
		</div>
		<div class="row">
			<div col-lg-12>
				<h2 style="margin: 10px">Add Result</h2>
			</div>
		</div>
		<div class="row">

				<input type="hidden" name="student_id" value="<?php echo $_REQUEST['id']; ?>">
				<?php foreach($subjects as $subject)  { ?>
					<div class="col-lg-12 form-group">
						<label><?php echo $subject['subject_name']; ?></label>
						<input type="hidden" name="id[]" value="<?php echo $subject['id']; ?>">
						<input type="text" name="marks[]" class="form-control" placeholder="Marks">
						
					</div>
				<?php } ?>
		</div>
		<div class="row">
				<div class="col-lg-12">
					<button class="btn btn-info" type="submit">Add Result</button>
				</div>
		</div>		
		</form>
	</div>
</body>
</html>
<?php
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}