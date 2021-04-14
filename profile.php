<!DOCTYPE html>
<html lang="en-US">
  <head>
  <title>User Profile</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="bootstrap/style.css">
  </head>
  <div class="p-3">
  <?php
  include 'handle/config.php';
  session_start();
$id=$_SESSION['id'];
$query=mysqli_query($link,"SELECT * FROM users where id='$id'")or die(mysqli_error());
$row=mysqli_fetch_array($query);
  ?>

  <h1>User Profile</h1>
<div class="profile-input-field">
    
        <form method="post" action="#" >
          <div class="form-group">
            <label>Fullname</label>
            <input type="text" class="form-control" name="name" style="width:20em;" placeholder="Enter your Fullname" value="<?php echo $row['name']; ?>" required />
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input type="text" class="form-control" name="phonenumber" style="width:20em;" placeholder="Enter your Phone Number" required value="<?php echo $row['phonenumber']; ?>" />
          </div>
          <div class="form-group">
            <label>email</label>
            <input type="text" class="form-control" name="email" style="width:20em;" placeholder="Enter your Age" value="<?php echo $row['email']; ?>">
          </div>
          <div class="form-group">
            <label>Address</label>
            <input type="text" class="form-control" name="address" style="width:20em;" required placeholder="Enter your Address" value="<?php echo $row['address']; ?>"></textarea>
          </div>
          <div class="form-group">
        
            <center>
             <a href="student_home.php">Back Home</a>
           </center>
          </div>
        </form>
      </div>
      </div>
      </html>
      <?php
      if(isset($_POST['submit'])){
        $fullname = $_POST['name'];
        $gender = $_POST['phonenumber'];
        $age = $_POST['email'];
        $address = $_POST['address'];
      $query = "UPDATE users SET name = '$name',
                      email = '$email', phonenumber = $phonenumber, address = '$address'
                      WHERE id = '$id'";
                    $result = mysqli_query($link, $query) or die(mysqli_error($link));
                    ?>
                     <script type="text/javascript">
            alert("Update Successfull.");
            window.location = "index.php";
        </script>
        <?php
             }               
?>