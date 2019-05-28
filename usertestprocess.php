<?php
    session_start();
    include('connection.php');
    $testid=$_POST['testid'];
    $testname=$_POST['testname'];
    $testname="rg".$testname;
    $username=$_POST['username'];
    $userid=$_POST['userid'];
    $sql="INSERT INTO `$testname` (`username`) VALUES('$username')";
    $q=mysqli_query($con,$sql);
    $sql1="INSERT INTO `opai_user_registeredtable`(`userid`,`testid`) VALUES ('$userid','$testid')";
    $q1=mysqli_query($con,$sql1);
    if($q and $q1){
        echo "You have been successfully Registered";
    }
    else{
        echo "Sorry Something  went wrong";
    }
?>