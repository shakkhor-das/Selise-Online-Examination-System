<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    if(isset($_POST['submit'])){
                $username=$_SESSION['username'];
                $sql="SELECT * FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
                $q=mysqli_query($con,$sql);
                $res=mysqli_fetch_assoc($q);
                $id=$res["setterid"];
                $sql1="SELECT * FROM `opai_setter_details` WHERE setter_id='$id'";
                $q1=mysqli_query($con,$sql1);
                $res1=mysqli_fetch_assoc($q1);
                $a=array();
                foreach ($_POST['check_list'] as $ans) {
                    array_push($a,$ans);
                }
                $testtitle=mysqli_real_escape_string($con,$_POST["testtitle"]);
                $time=mysqli_real_escape_string($con,$_POST["testtime"]);
                $duration=mysqli_real_escape_string($con,$_POST["testduration"]);
                $visibility=mysqli_real_escape_string($con,$_POST["visibility"]);
                $testpassword=mysqli_real_escape_string($con,$_POST["testpassword"]);
                if($visibility=="public"){
                    $testpassword="";
                }
                $test_name=time().$username;
                //echo $testname;
                $sql="INSERT INTO `opai_setter_global`(`setter_id`, `test_name`, `education_level`, `education_background`, `subject`, `test_type`, `test_title`, `test_begin_time`, `test_duration`, `test_visibility`, `test_password`) VALUES ('$id','$test_name','$a[0]','$a[1]','$a[2]','$a[3]','$testtitle','$time','$duration','$visibility',
                    '$testpassword')";
                
                $q=mysqli_query($con,$sql);
                $regtable="rg".$test_name;
                $sql1="CREATE TABLE `$test_name`(

                    question_id INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
                    question_title VARCHAR(100) NOT NULL,
                    questionoption JSON DEFAULT NULL,
                    qustionpoint INT NOT NULL
                    );
                ";
                $q1=mysqli_query($con,$sql1);
                $_SESSION["testname"]=$test_name;
                $sql2="CREATE TABLE `$regtable`(
                    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(100) NOT NULL,
                    achieved_point INT NULL
                    );
                ";
                $q2=mysqli_query($con,$sql2);
                $test_name="ans".$test_name; 
                $sql1="CREATE TABLE `$test_name`(
                    id INT UNSIGNED  AUTO_INCREMENT PRIMARY KEY,
                    userid INT NOT NULL,
                    question_ans JSON DEFAULT NULL
                    );
                ";
                $q2=mysqli_query($con,$sql1);
                header('Location:checkup.php');
        }

?>