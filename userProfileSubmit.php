<?php
    session_start();
    include('connection.php');
    if (!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        $username = $_SESSION['username'];
        $sql = "SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q = mysqli_query($con,$Sql);
        $res = mysqli_fetch_assoc($q);
        if (isset($_FILES['file'])){
            $sql = "SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
            $q = mysqli_query($con,$sql);
            $res = mysqli_fetch_assoc($q);
            $name = $_FILES['file']['name'];
            echo $name;
            $tmp_name = $_FILES['file']['tmp_name'];
            $des = "img/";
            move_uploaded_file($tmp_name,$des.$name);
            $id = $res['userid'];
            $sql = "UPDATE opai_user_details"
        }
    }
?>