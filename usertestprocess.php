<?php
    session_start();
    include('connection.php');
    $testid=$_POST['testid'];
    $testname=$_POST['testname'];
    $testname="rg".$testname;
    $username=$_POST['username'];
    $userid=$_POST['userid'];
    $sql="SELECT * FROM `$testname` WHERE username='$username'";
    $q=mysqli_query($con,$sql);
    $total=mysqli_num_rows($q);
    if($total==1){
        echo "You are alreay Registered";
    }
    else{
        $sql1="INSERT INTO `$testname` (`username`) VALUES('$username')";
        $q1=mysqli_query($con,$sql);
        $sql2="INSERT INTO `opai_user_registeredtable` (`userid`,`testid`) VALUES ('$userid','$testid')";
        $q2=mysqli_query($con,$sql2);
        if($q1 and $q2){
            echo "You have been successfully Registered";
        }
        else{
            echo "Sorry Something  went wrong";
        }
    }
    
    
?>