<?php
    session_start();
    include('connection.php');
    if (!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        $msg = "";
        $username=$_SESSION['username'];
        $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
		$res=mysqli_fetch_assoc($q);
        if(isset($_FILES['file'])){
            $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
            $q=mysqli_query($con,$sql);
            $res=mysqli_fetch_assoc($q);
            
            $sql="UPDATE `opai_user_details` SET user_image = '".$_FILES['file']['name']."' WHERE user_id = '$id'";
            if(mysqli_query($con,$sql)){
            //echo "successfulll";
                header('Location:user_profile_edit.php');
            }
            else{
                echo "failed";
            }
        }
        if (isset($_POST['update'])){
            $mobile=mysqli_real_escape_string($con,$_POST['mobile']);
            $fullname=mysqli_real_escape_string($con,$_POST['fullname']);
            $dateofbirth=mysqli_real_escape_string($con,$_POST['dateofbirth']);
            $currentlocation=mysqli_real_escape_string($con,$_POST['currentlocation']);
            $institution=mysqli_real_escape_string($con,$_POST['institution']);
            $gender=mysqli_real_escape_string($con,$_POST['gender']);
            $facebook=mysqli_real_escape_string($con,$_POST['facebookurl']);
            $linkedin=mysqli_real_escape_string($con,$_POST['linkedin']);
            $git=mysqli_real_escape_string($con,$_POST['GitHub']);
            $bio=mysqli_real_escape_string($con,$_POST['bio']);
            $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
            $q=mysqli_query($con,$sql);
            $res=mysqli_fetch_assoc($q);
            $id=$res["userid"];
            $sql="SELECT * FROM `opai_user_details` WHERE user_id='$id'";
            $q=mysqli_query($con,$sql);
            $res=mysqli_fetch_assoc($q);

            $sql="UPDATE `opai_user_details` SET `user_mobile_no`='$mobile',`user_full_name`='$fullname',`user_date_of_birth`='$dateofbirth',`user_current_location`='$currentlocation',`user_institution`='$institution',`user_gender`='$gender',`user_facebook_url`='$facebook',`user_linkedin_url`='$linkedin',`user_github_url`='$git',`user_bio`='$bio' WHERE user_id='$id'";
            $q=mysqli_query($con,$sql);
            header('Location:userProfile.php');
        }
    }
?>