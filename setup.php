<?php
  $hostname = "intern-sls.cdts6wfxxv6z.eu-central-1.rds.amazonaws.com";
  $id = "slsadmin";
  $pass = "EMSAFNgw04ljnyKN4";
  $db="opai";
  
  // Database creation
  /*
    $sql="create database opai";
    if(mysqli_query($con,$sql)){
      echo "Database created";
    }
    else{
      echo "failed";
    }
  
  
  */

  // database created

  // setter table creation

  $con=mysqli_connect($hostname,$id,$pass,$db);

  $sql="
  
        CREATE TABLE opai_setter(

          setterid int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          setterfirstname VARCHAR(30) NOT NULL,
          setterlastname VARCHAR(30) NOT NULL,
          setteremail VARCHAR(50) NOT NULL,
          setterpassword VARCHAR(40) NOT NULL

        );
  
      ";

      if(mysqli_query($con,$sql)){
        echo "Setter Table created".'\n';
      }
      else{
        echo "failed";
      }

      //setter table created


      // user table creation
      $sql="
      
        CREATE TABLE opai_user(

          userid int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          userfirstname VARCHAR(30) NOT NULL,
          userlastname VARCHAR(30) NOT NULL,
          useremail VARCHAR(50) NOT NULL,
          userpassword VARCHAR(40) NOT NULL

        );
      
      ";

        if(mysqli_query($con,$sql)){
          echo "user table created";
        }
        else{
          echo "failed";
        }
  
?>
