<?php
include "config.php";

if(isset($_POST["uploaddata"])){
   
    $unitname=$_POST["unitname"];
    

    $sql= "INSERT INTO `units`(`unitname`) VALUES ('$unitname')";

    $result=mysqli_query($link,$sql);


    if($result){
        echo "Your upload was successful";
        header("location:../units.php");
    }else{
        echo "Upload data Error $sql".mysqli_error($link);

    }



}

//close connection
mysqli_close($link);