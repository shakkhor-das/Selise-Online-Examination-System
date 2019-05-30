<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        
        $username=$_SESSION['username'];
		if(isset($_FILES['file'])){
            echo "anikkkkk";
			$sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
		    $q=mysqli_query($con,$sql);
			$res=mysqli_fetch_assoc($q);
            $name=$_FILES['file']['name'];
            echo "$name";
			$tmp_name=$_FILES['file']['tmp_name'];
			$des='img/';
            move_uploaded_file($tmp_name,$des.$name);
            $id=$res["userid"];
            $sql="UPDATE opai_user_details SET user_image = '".$_FILES['file']['name']."' WHERE user_id = '$id'";
            if(mysqli_query($con,$sql)){
                //echo "successfulll";
                header('Location:userProfile.php');
            }
			else{
                echo "failed";
            }		
        }
        
        if(isset($_POST['update'])){
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
            if($mobile==""){
                $mobile=$res["user_mobile_no"];
            }
            if($fullname==""){
                $fullname=$res["user_full_name"];
            }
            if($dateofbirth==""){
                $dateofbirth=$res["user_date_of_birth"];
            }
            if($currentlocation==""){
                $currentlocation=$res["user_current_location"];
            }
            if($institution==""){
                $institution=$res["user_institution"];
            }
            if($gender==""){
                $gender=$res["user_gender"];
            }
            if($facebook==""){
                $facebook=$res["user_facebook_url"];
            }
            if($git==""){
                $git=$res["user_github_url"];
            }
            if($linkedin==""){
                $linkedin=$res["user_linkedin_url"];
            }
            if($bio==""){
                $bio=$res["user_bio"];
            }
            //echo $fullname;

            $sql="UPDATE `opai_user_details` SET `user_mobile_no`='$mobile',`user_full_name`='$fullname',`user_date_of_birth`='$dateofbirth',`user_current_location`='$currentlocation',`user_institution`='$institution',`user_gender`='$gender',`user_facebook_url`='$facebook',`user_linkedin_url`='$linkedin',`user_github_url`='$git',`user_bio`='$bio' WHERE user_id='$id'";
            $q=mysqli_query($con,$sql);
            header('Location:userProfile.php');
        }
    }



?>