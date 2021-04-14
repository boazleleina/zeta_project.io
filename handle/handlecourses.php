<?php
include "config.php";

if(isset($_POST["uploaddata"])){
   
    $coursename=trim($_POST["coursename"]);
    

    $sql= "INSERT INTO `courses`(`coursename`) VALUES ('$coursename')";

    $result=mysqli_query($link,$sql);


    if($result){
        echo "Your upload was successful";
        header("location:../courses.php");
    }else{
        echo "Upload data Error $sql".mysqli_error($link);

    }



}

//close connection
mysqli_close($link);