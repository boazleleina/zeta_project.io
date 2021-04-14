<?php

if (isset($_GET["id"]) and !empty(trim($_GET["id"]))){
    require_once "handle/config.php";

    $id= trim($_GET["id"]);
    
    $sql="SELECT * FROM `users` WHERE id='$id'";

    $result=mysqli_query($link,$sql);

    if($result){
        if (mysqli_num_rows($result)==1){
            $row = mysqli_fetch_array($result);

            $name=$row["name"];
            $phonenumber=$row["phonenumber"];
            $email=$row["email"];
            $address=$row["address"];
        }


    }else{
        echo "error executing query $sql".mysqli_error($link);
    }


}else{
    echo "Url has not fetched the ID";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VIEW DETAILS</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="bootstrap/js/jquery.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="contanier"> 
        <div class="row">
            <div class="col text-center">
                <h2>VIEW RECORDS</h2>
                <div class="">
                    <label for=""><b>Full Names</b></label>
                    <p><?php echo $name;?></p>
                </div>
                <div class="">
                    <label for=""><b>Phone Number</b></label>
                    <p><?php echo $phonenumber;?></p>
                </div>
                <div class="">
                    <label for=""><b>Email</b></label>
                    <p><?php echo $email;?></p>
                </div>
                <div class="">
                    <label for=""><b>Address</b></label>
                    <p><?php echo $address;?></p>
                </div>
                

                
                
            </div>
            <div class="text-center m-3 border-2">
                <p><a href="students.php" class = "btn btn-outline-primary text-center m-3">BACK TO HOME</a></p>
            </div>
        </div>
    
    </div>
    
</body>
</html>