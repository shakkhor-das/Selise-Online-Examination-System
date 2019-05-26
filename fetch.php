<?php
    include('connection.php');
    session_start();
    if(isset($_POST["testname"])){
        $testname=$_POST["testname"];
        $sql="SELECT * FROM `$testname`";
        $q=mysqli_query($con,$sql);
        $ans=mysqli_num_rows($q);
        echo $ans;
    }

?>