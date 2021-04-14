<?php
session_start();
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']==1){
		header("Location:admin_home.php");
	}
	else{
		header("Location:student_home.php");	
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
		.container{
			margin-top: 30px;
		}
				body {
		  padding-top: 40px;
		  padding-bottom: 40px;
		  background-image: url("images/paper.jpg");
		  background-repeat: no-repeat;
  		  background-attachment: fixed;
  		  background-position: center;
		  background-color: #eee;
		  background-size: cover;
		}

		.form-signin {
		  max-width: 330px;
		  padding: 15px;
		  margin: 0 auto;
		}
		.form-signin .form-signin-heading,
		.form-signin .checkbox {
		  margin-bottom: 10px;
		}
		.form-signin .checkbox {
		  font-weight: normal;
		}
		.form-signin .form-control {
		  position: relative;
		  height: auto;
		  -webkit-box-sizing: border-box;
		     -moz-box-sizing: border-box;
		          box-sizing: border-box;
		  padding: 10px;
		  font-size: 16px;
		}
		.form-signin .form-control:focus {
		  z-index: 2;
		}
		.form-signin input[type="email"] {
		  margin-bottom: -1px;
		  border-bottom-right-radius: 0;
		  border-bottom-left-radius: 0;
		}
		.form-signin input[type="password"] {
		  margin-bottom: 10px;
		  border-top-left-radius: 0;
		  border-top-right-radius: 0;
		}
	</style>
</head>
<body>
   <div class="container">
   	<div class="row">
   		<?php if(isset($_REQUEST['error'])){ ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
   		</div>
	   	<?php } ?>
   	</div>
   	<div class="row">
   		<div class="col-lg-4">
   		</div>
   		<div class="col-lg-4">
           <div class="form-group">
	    	    <h2 class="form-signin-heading text-center"style="color: black;"><b>SCHOOL MANAGEMENT SYSTEM</b></h2>
		    </div>
	     <form class="form-signin" action="handle/handlelogin.php" method="post">
	     	<div class="form-group">
	    	    <h2 class="form-signin-heading text-center" style="color: black;">Please Login in</h2>
		    </div>
	        <div class="form-group">
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
	  		</div>
	        <div class="form-group">
		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
		    </div>
		    <div class="form-group">
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
		    </div>
	      </form>
		</div>
	    <div class="col-lg-4">
   		</div>
	  </div>
    </div>
</body>
</html>