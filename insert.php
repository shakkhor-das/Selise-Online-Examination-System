<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    $username=$_SESSION['username'];
    $sql="SELECT * FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
    $q=mysqli_query($con,$sql);
    $res=mysqli_fetch_assoc($q);
    $id=$res["setterid"];
    $sql1="SELECT * FROM `opai_setter_details` WHERE setter_id='$id'";
    $q1=mysqli_query($con,$sql1);
    $res1=mysqli_fetch_assoc($q1); 
    $title=$_POST["questiontitle"];
    $point=$_POST["questionpoint"];
    $option=$_POST["option"];
    $tablename=$_POST["tablename"];
    $sql="INSERT INTO `$tablename` (`question_title`,`questionoption`,`qustionpoint`) VALUES('$title','$option','$point')";
    $res=mysqli_query($con,$sql);
    echo "Question Added";
?>