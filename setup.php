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
    }*/




  // database created

  // setter table creation
  /*
  $hostname="localhost";
  $id="root";
  $pass="";
  $db="opai";

  $con=mysqli_connect($hostname,$id,$pass,$db);
  */
  $con=mysqli_connect($hostname,$id,$pass,$db);


  $sql="

        CREATE TABLE opai_setter(

          setterid int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
          setterfirstname VARCHAR(30) NOT NULL,
          setterlastname VARCHAR(30) NOT NULL,
          setterUsername VARCHAR(30) NOT NULL,
          setteremail VARCHAR(50) NOT NULL,
          setterpassword VARCHAR(40) NOT NULL,
          verificationkey VARCHAR(50) NOT NULL,
          verificationstatus TINYINT(1) NULL,
          forgotkey VARCHAR(30) NOT NULL,
          uniquedate TIMESTAMP(6) NOT NULL

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
          userUsername VARCHAR(30) NOT NULL,
          useremail VARCHAR(50) NOT NULL,
          userpassword VARCHAR(40) NOT NULL,
          verificationstatus TINYINT(1) NULL,
          forgotkey VARCHAR(30) NOT NULL,
          uniquedate TIMESTAMP(6) NOT NULL

        );

      ";

        if(mysqli_query($con,$sql)){
          echo "user table created";
        }
        else{
          echo "failed";
        }

        $sql= "

            CREATE TABLE opai_setter_details(
              setter_id INT PRIMARY KEY,
              setter_mobile_no VARCHAR(11),
              setter_full_name VARCHAR(30),
              setter_date_of_birth VARCHAR(30),
              setter_current_location VARCHAR(30),
              setter_institution VARCHAR(30),
              setter_gender VARCHAR (10),
              setter_facebook_url VARCHAR (30),
              setter_linkedin_url VARCHAR (30),
              setter_github_url VARCHAR (30),
              setter_bio TEXT(100),
              setter_image TEXT(30)

            );
        ";

        if(mysqli_query($con,$sql)){
          echo "opai_setter_details created";
        }
        else{
          echo "failed";
        }


        $sql= "

            CREATE TABLE opai_user_details(
              user_id INT PRIMARY KEY,
              user_mobile_no VARCHAR(11),
              user_full_name VARCHAR(30),
              user_date_of_birth VARCHAR(30),
              user_current_location VARCHAR(30),
              user_institution VARCHAR(30),
              user_gender VARCHAR (10),
              user_facebook_url VARCHAR (30),
              user_linkedin_url VARCHAR (30),
              user_github_url VARCHAR (30),
              user_bio TEXT(100),
              user_image TEXT(30)
            );
        ";

        if(mysqli_query($con,$sql)){
          echo "opai_user_details created";
        }
        else{
          echo "failed";
        }

        $sql= "

            CREATE TABLE opai_setter_global(
              test_id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              setter_id INT ,
              test_name VARCHAR(50),
              education_level VARCHAR(30),
              education_background VARCHAR(30),
              subject VARCHAR(50),
              test_type VARCHAR(30),
              test_title VARCHAR (100),
              test_begin_time timestamp(6),
              test_duration time(6),
              test_visibility VARCHAR (20),
              test_password VARCHAR(30)
            );
        ";

        if(mysqli_query($con,$sql)){
          echo "opai_setter_global created";
        }
        else{
          echo "failed";
        }


        $sql="

          CREATE TABLE opai_setter_blog(

            id int(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30) NOT NULL,
            datetime VARCHAR(30) NOT NULL,
            title VARCHAR(250) NOT NULL,
            post MEDIUMTEXT NOT NULL
          );

        ";

        if(mysqli_query($con,$sql)){
          echo "opai_setter_blog created";
        }
        else{
          echo "failed";
        }

        $sql= "

            CREATE TABLE opai_setter_previoustest(
              test_id  INT,
              setter_id INT ,
              test_name VARCHAR(50),
              education_level VARCHAR(30),
              education_background VARCHAR(30),
              subject VARCHAR(50),
              test_type VARCHAR(30),
              test_title VARCHAR (100),
              test_begin_time timestamp(6),
              test_duration time(6),
              test_visibility VARCHAR (20),
              test_password VARCHAR(30)
            );
        ";

        if(mysqli_query($con,$sql)){
          echo "opai_setter_previoustest created";
        }
        else{
          echo "failed";
        }

?>
