<?php
include "config.php";

if(isset($_POST["uploaddata"])){
   
    $class_id=trim($_POST["class_id"]);
    $unit_id=trim($_POST["unit_id"]);
    $faculty_id=trim($_POST["faculty_id"]);
    

    $sql= "INSERT INTO `class_unit`(`class_id`, `unit_id`, `faculty_id`) VALUES ('$class_id','$unit_id','$faculty_id')";

    $result=mysqli_query($link,$sql);


    if($result){
        echo "Your upload was successful";
        header("location:../class_unit.php");
    }else{
        echo "Upload data Error $sql".mysqli_error($link);

    }



}

//close connection
mysqli_close($link);