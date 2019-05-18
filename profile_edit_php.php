<?php session_start();
  $_SESSION['username']="fayedanik";
  $u=$_SESSION['username'];
  $c = mysqli_connect("localhost","root","","selise_online_exam");

  if(isset($_FILES['file'])){

    $name_file = $_FILES['file']['name'];
    $tmp_name = $_FILES['file']['tmp_name'];
    $local_image = "img/";
    move_uploaded_file($tmp_name,$local_image.$name_file);
    $sql= "UPDATE userprofile SET image = '".$_FILES['file']['name']."' WHERE username = '$u'";
    $q = mysqli_query($c,$sql);
    header("Location: profile.php");
  }

  if(isset($_POST['sub'])){
    $mobile = mysqli_real_escape_string($c,$_POST['mobile']);
    $fullname = mysqli_real_escape_string($c,$_POST['fullname']);
    $birthdate = mysqli_real_escape_string($c,$_POST['birthdate']);
    $location = mysqli_real_escape_string($c,$_POST['location']);
    $institution = mysqli_real_escape_string($c,$_POST['institution']);
    $gender = mysqli_real_escape_string($c,$_POST['gender']);
    $website = mysqli_real_escape_string($c,$_POST['website']);
    $link = mysqli_real_escape_string($c,$_POST['link']);
    $aboutme = mysqli_real_escape_string($c,$_POST['aboutme']);

    $d =  "UPDATE `userprofile` SET `mobile no.`= '$mobile',`fullname`='$fullname' ,`birthdate`='$birthdate',`location`='$location',`institution`='$institution',`gender`='$gender',`website`='$website',`link`='$link',`about me`='$aboutme' WHERE username='$u'";
    $h = mysqli_query($c,$d);
    header("Location: profile.php");

  }
 ?>
