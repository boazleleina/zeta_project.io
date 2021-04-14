<?php

    require_once "handle/config.php";
    $name=$phonenumber=$email=$address="";
    if (isset($_POST["id"]) and !empty ($_POST["id"])){
        //get hidden input
        $id=$_POST["id"];

        //pick form updated values
        $updated_name=$_POST['name'];
        $updated_phonenumber=$_POST['phonenumber'];
        $updated_email=$_POST['email'];
        $updated_address=$_POST['address'];
        
        //run the update query
        $sql="UPDATE `users` SET `name`='$updated_name',`phonenumber`='$updated_phonenumber',`email`='$updated_email',`address`='$updated_address' WHERE id='id'";

        $result=mysqli_query($link,$sql);

        if($result){
            echo "<div class='alert alert-success' role='alert'>Record was updated successfully</div>";
        }else{
            echo"Error executing query $sql".mysqli_error($link);
        }

    }else{
        //pick id parameter and values

        if(isset($_GET["id"]) and !empty ($_GET["id"])){
            
            $id=trim($_GET["id"]);

            $sql="SELECT * FROM `users` WHERE id='$id'";

            $result=mysqli_query($link,$sql);

            if($result){
                if(mysqli_num_rows($result)==1){

                    //fetch the data
                    $row = mysqli_fetch_array($result);

                    //receive individual data
                    $name = $row['name'];
                    $phonenumber=$row['phonenumber'];
                    $email=$row['email'];
                    $address=$row['address'];
                    
                }

            }else{
                echo "Error executing query $sql".mysqli_error($link);
            }


        }else{
            echo "ID parameter was not found";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT RECORD</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <h2>Update Record</h2>
            <p>Please edit the input values to submit to this form</p>
        </div>
        <div>
            <form action="edit_student.php" method="post" enctype="multipart/form-data">
                <div class="row mb-4">
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="" class="form-control" name="name" value="<?php echo $name;?>" />
                            <label class="form-label" for="">Full Name</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="text" id="" class="form-control" name="phonenumber" value="<?php echo $phonenumber;?>" />
                            <label class="form-label" for="">Phone Number</label>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-outline">
                            <input type="email" id="" class="form-control" name="email" value="<?php echo $email;?>" />
                            <label class="form-label" for="">Email</label>
                        </div>
                    </div>
                    <div class="form-outline mb-4">
                        <input type="text" id="" class="form-control" name="address" value="<?php echo $address;?>"/>
                        <label class="form-label" for="">Address</label>
                    </div>
                </div>


                <div class="text-center">
                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <button type="submit" name="uploaddata" class="btn btn-primary btn-block mb-4 " >UPDATE</button>
                </div>
            </form>
            <div class="text-center m-3 border-2">
                <p><a href="view_student.php" class = "btn btn-outline-primary text-center m-3">BACK TO HOME</a></p>
            </div>

        </div>
    </div>

    
</body>
</html>

