<?php

// initialize
session_start();
//check if user is logged in
// if (!isset($_SESSION["loggedin"]) or $_SESSION["loggedin"]!==true){
//     header("location:index.php");
// }


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

<body>
    <div class="container m-3">
        <div class="p-2">
            <div class="card-border-1 text-center">
                <h3>Students Table</h3>
            
            </div>
            
        </div>

        
        <?php

        require "handle/config.php";

        //select query
        $sql = "SELECT `id`, `name`, `phonenumber`, `email`, `address` FROM `users` WHERE `usertype`='2'";
        $result = mysqli_query($link,$sql);
        
        if($result){
            if(mysqli_num_rows($result)>0){
        ?>
            <div class="col-md-8">
                <div class="p-3">
                    <a href="add_student.php" class="btn btn-primary">ADD STUDENT</a>
                </div>
                <table class="table table-bordered table-striped p-3">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Full Name</th>
                            <th>Phone Number</th>
                            <th>Email</th>
                            <th>Address</th>
                            
                        
                            <th colspan="2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row=mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".$row['name']."</td>";
                            echo "<td>".$row['phonenumber']."</td>";
                            echo "<td>".$row['email']."</td>";
                            echo "<td>".$row['address']."</td>";
                            echo "<td><a href ='edit_student.php?id=".$row['id']."'><span class ='fa fa-pencil'></span></a></td>";
                            echo "<td><a href ='delete_student.php?id=".$row['id']."'><span class ='fa fa-trash'></span></a></td>";
                        }
                
                        ?>
                    </tbody>
                </table>
            </div>
    

        <?php
            }else{
                echo "<p class='lead'><em>No records were found</em></p>";
            }

        }else{
            echo "Error executing query $sql".mysqli_error($link);
        }
        


        ?>


    </div>
</body>
</html>

<?php
include "admin/scripts.php";
include "admin/footer.php";
?>