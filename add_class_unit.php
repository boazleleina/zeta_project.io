<?php

// initialize
session_start();
//check if user is logged in
// if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
//     header("location:index.php");
// }
include "handle/config.php";

include "admin/header.php";
include "admin/navbar.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<div class="container-fluid">
        <div class="row">
			<a href="class_unit.php" class="btn btn-sm btn-primary col-sm-3 offset-md-3" style="margin:10px; width:10%">Back</a>
		</div>
    <form action="handle/handleadd_class_unit.php" method="post" enctype="multipart/form-data>
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div id="msg" class="form-group"></div>        
        <div class="form-group">
            <label for="" class="control-label">Class</label>
            <select name="class_id" id="" class="custom-select select2">
                <option value=""></option>
                <?php
                $class = $link->query("SELECT c.*,concat(co.coursename,' ',c.year,'-',c.semester) as `class` FROM `class` c inner join courses co on co.id = c.course_id order by concat(co.coursename,' ',c.year,'-',c.semester) asc");
                while($row=$class->fetch_assoc()):
                ?>
                <option value="<?php echo $row['id'] ?>" <?php echo isset($class_id) && $class_id == $row['id'] ? 'selected' : '' ?>><?php echo $row['class'] ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Faculty</label>
            <select name="faculty_id" id="" class="custom-select select2">
                <option value=""></option>
                <?php
                $class = $link->query("SELECT * FROM users WHERE usertype='1' order by name asc");
                while($row=$class->fetch_assoc()):
                ?>
                <option value="<?php echo $row['id'] ?>" <?php echo isset($faculty_id) && $faculty_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['name']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="form-group">
            <label for="" class="control-label">Unit</label>
            <select name="unit_id" id="" class="custom-select select2">
                <option value=""></option>
                <?php
                $class = $link->query("SELECT * FROM units");
                while($row=$class->fetch_assoc()):
                ?>
                <option value="<?php echo $row['id'] ?>" <?php echo isset($unit_id) && $unit_id == $row['id'] ? 'selected' : '' ?>><?php echo ucwords($row['unitname']) ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="row">
			<div class="col-md-12">
                <button class="btn btn-sm btn-primary col-sm-3 offset-md-3" name="uploaddata"> Save</button>
				<button class="btn btn-sm btn-default col-sm-3" type="reset"> Cancel</button>
			</div>
		</div>
    </form>
</div>


</body>
</html>

<?php
include "admin/scripts.php";
include "admin/footer.php";
?>