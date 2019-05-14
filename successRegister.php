<?php
        include('connection.php');

        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];

        $sql="INSERT INTO `opai_setter`(`setterfirstname`, `setterlastname`, `setteremail`, `setterUsername`, `setterpassword`) VALUES ('$firstname','$lastname','$email','$username','$password')";

        if(mysqli_query($con,$sql)){
            echo "Inserted";
        }
        else{
            echo "failed";
        }
        

?>