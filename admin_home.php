<?php
session_start();
include 'handle/config.php';
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']!=1){
		header("Location:student_home.php");
	}

	$data=array();
	$result=mysqli_query($link,"select * from users where usertype='2'");
	while($row=mysqli_fetch_assoc($result)){
		array_push($data,$row);
	}


include "admin/header.php";
include "admin/navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <title>ADMIN HOME</title>
</head>
<body>
<?php
include('handle/config.php');
?>

<div class="row p-3">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Registered Lecturers</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                    
                                $sql = "select * from users where usertype='1'";  
                                $query_run = mysqli_query($link, $sql);
                                $row = mysqli_num_rows($query_run);
                                echo '<a href="lecturers.php" style="text-decoration: none;"><h4> Total Lecturers: '.$row.'</h4></a>';
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Registered Students</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                    
                                $sql = "select * from users where usertype='2'";  
                                $query_run = mysqli_query($link, $sql);
                                $row = mysqli_num_rows($query_run);
                                echo '<a href="students.php" style="text-decoration: none;"><h4> Total Students: '.$row.'</h4></a>';
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Registered Courses</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <?php
                    
                                $sql = "select * from courses";  
                                $query_run = mysqli_query($link, $sql);
                                $row = mysqli_num_rows($query_run);
                                echo '<a href="courses.php" style="text-decoration: none;"><h4> Total Courses: '.$row.'</h4></a>';
                            ?>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
	<div class="row">
   		<?php if(isset($_REQUEST['error'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;">
   				<?php echo $_REQUEST['error']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div>
	 <div class="row">
   		<?php if(isset($_REQUEST['success'])) { ?>
   		<div class="col-lg-12">
   			<span class="alert alert-success" style="display: block;">
   				<?php echo $_REQUEST['success']; ?>	
			</span>
   		</div>
	   	<?php } ?>
	 </div></br></br>



</div>
</body>
</html>

<?php
include "admin/scripts.php";
include "admin/footer.php";


}
else{
	header("Location:index.php?error=UnAuthorized Access");
}
?>