<?php
    session_start();
    if (!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        include('connection.php');
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q = mysqli_query($con,$sql);
        $res = mysqli_fetch_assoc($q);
        $id = $res['userid'];
        $sql1 = "SELECT * FROM `opai_user_details` WHERE user_id='$id'";
        $q1 = mysqli_query($con,$sql1);
        $res1 = mysqli_fetch_assoc(q1);
        if (isset($_POST['submit'])){
            $currentpassword = mysqli_real_escape_string($con,$_POST['currentpassword']);
            $currentpassword = md5($currentpassword);
            $serverpassword = $res['userpassword'];
            $newpassword = mysqli_real_escape_string($con,$_POST['newpassword']);
            
        }
    }
?>