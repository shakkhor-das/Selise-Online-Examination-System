<?php
    include('connection.php');
    $testid=$_POST["testid"];
    $testname=$_POST["testname"];
    $userid=$_POST["userid"];
    $username=$_POST["username"];
    $sql="SELECT * FROM `opai_setter_global` WHERE test_id='$testid' AND setter_id='$userid'";
    $query=mysqli_query($con,$sql);
    $res=mysqli_fetch_assoc($query);
    $sql1="DELETE FROM `opai_setter_global` WHERE test_id='$testid' AND setter_id='$userid'";
    $query1=mysqli_query($con,$sql1);
    $edulevel=$res["education_level"];
    $edubackground=$res["education_background"];
    $subject=$res["subject"];
    $testtype=$res["test_type"];
    $testtitle=$res["test_title"];
    $testbegintime=$res["test_begin_time"];
    $testduration=$res["test_duration"];
    $testvisibility=$res["test_visibility"];
    $testpassword=$res["test_password"];
    $check="SELECT * FROM `opai_setter_previoustest` WHERE test_id='$testid' AND setter_id='$userid'";
    $run=mysqli_num_rows($con,$check);
    if(mysqli_num_rows($run)==0){
        $sql2="INSERT INTO `opai_setter_previoustest` (`test_id`,`setter_id`,`test_name`,`education_level`,`education_background`,`subject`,`test_type`,`test_title`,`test_begin_time`,`test_duration`,`test_visibility`,`test_password`) VALUES('$testid','$userid','$testname','$edulevel','$edubackground','$subject','$testtype','$testtitle','$testbegintime','$testduration','$testvisibility','$testpassword')";
        $query2=mysqli_query($con,$sql2);
    }
    
?>