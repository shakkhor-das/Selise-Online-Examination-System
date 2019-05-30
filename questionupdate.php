<?php
    include('connection.php');
    session_start();
    $username=$_SESSION['username'];
    $sql="SELECT * FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
    $q=mysqli_query($con,$sql);
    $res=mysqli_fetch_assoc($q);
    $id=$res["setterid"];
    $sql1="SELECT * FROM `opai_setter_details` WHERE setter_id='$id'";
    $q1=mysqli_query($con,$sql1);
    $res1=mysqli_fetch_assoc($q1);
    $title=$_POST["title"];
    $point=$_POST["point"];
    $option=$_POST["myjson"];
    $tablename=$_POST["tablename"];
    $testid=$_POST['testid'];
    $sql="INSERT INTO `$tablename` (`question_title`,`questionoption`,`qustionpoint`) VALUES('$title','$option','$point')";
    $res=mysqli_query($con,$sql);
?>