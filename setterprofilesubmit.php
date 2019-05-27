<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{

        $username=$_SESSION['username'];
        $sql="SELECT * FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
		    $res=mysqli_fetch_assoc($q);
		    if(isset($_FILES['file'])){
			       $sql="SELECT * FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
		         $q=mysqli_query($con,$sql);
			       $res=mysqli_fetch_assoc($q);
             $name=$_FILES['file']['name'];
             echo "$name";
			       $tmp_name=$_FILES['file']['tmp_name'];
			       $des='img/';
             move_uploaded_file($tmp_name,$des.$name);
             $id=$res["setterid"];
             $sql="UPDATE opai_setter_details SET setter_image = '".$_FILES['file']['name']."' WHERE setter_id = '$id'";
             if(mysqli_query($con,$sql)){
                //echo "successfulll";
                header('Location:profile_edit.php');
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
            $sql="SELECT * FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
            $q=mysqli_query($con,$sql);
            $res=mysqli_fetch_assoc($q);
            $id=$res["setterid"];
            $sql="SELECT * FROM `opai_setter_details` WHERE setter_id='$id'";
            $q=mysqli_query($con,$sql);
            $res=mysqli_fetch_assoc($q);

            /*
            if($mobile==""){
                $mobile=$res["setter_mobile_no"];
            }
            if($fullname==""){
                $fullname=$res["setter_full_name"];
            }
            if($dateofbirth==""){
                $dateofbirth=$res["setter_date_of_birth"];
            }
            if($currentlocation==""){
                $currentlocation=$res["setter_current_location"];
            }
            if($institution==""){
                $institution=$res["setter_institution"];
            }
            if($gender==""){
                $gender=$res["setter_gender"];
            }
            if($facebook==""){
                $facebook=$res["setter_facebook_url"];
            }
            if($git==""){
                $git=$res["setter_github_url"];
            }
            if($linkedin==""){
                $linkedin=$res["setter_linkedin_url"];
            }
            if($bio==""){
                $bio=$res["setter_bio"];
            }*/




            $sql="UPDATE `opai_setter_details` SET `setter_mobile_no`='$mobile',`setter_full_name`='$fullname',`setter_date_of_birth`='$dateofbirth',`setter_current_location`='$currentlocation',`setter_institution`='$institution',`setter_gender`='$gender',`setter_facebook_url`='$facebook',`setter_linkedin_url`='$linkedin',`setter_github_url`='$git',`setter_bio`='$bio' WHERE setter_id='$id'";
            $q=mysqli_query($con,$sql);
            header('Location:setterprofile.php');
        }
    }



?>
