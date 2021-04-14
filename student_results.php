<?php
session_start();
include 'handle/config.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=2){
		header("Location:teacher_home.php");
	}

	$result_data=array();
	$is_result=false;
	$result=mysqli_query($link,"select * from results where student_id='".$_SESSION['user_data']['id']."'");
	if(mysqli_num_rows($result)>0){
		$is_result=true;
		$result_row=mysqli_fetch_assoc($result);

		$data_qr=mysqli_query($link,"select result_data.*,subjects.subject_name from result_data,subjects where subjects.id=result_data.subject_id and result_data.result_id='".$result_row['id']."'");


		while($row=mysqli_fetch_assoc($data_qr)){
			array_push($result_data,$row);
		}
		echo mysqli_error($link);
	}

include "student/header.php";
include "student/navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>View Result</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	</div>
	<div class="row">
	<?php if($is_result) { ?>
		<div class="col-lg-12">
			<table class="table">
				<tr><th colspan="3">Result</th></tr>
				<tr>
					<th>Subject</th>
					<th>Marks</th>
					<th>Marks Obtained</th>
				</tr>
				<?php foreach($result_data as $result){ ?>
					<tr>
						<td>
							<?php echo $result['subject_name']; ?>
						</td>
						<td>
							100
						</td>
						<td>
							<?php echo $result['marks']; ?>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>
	<?php } else { ?>
		<div class="col-lg-12">
			<h2>Result Not Found!</h2>
		</div>
	<?php }	?>
</div>
</div>
</body>
</html>	
<?php	
}
else{
	header("Location:index.php?error=UnAuthorized Access");
}


include "student/scripts.php";
include "student/footer.php";
?>