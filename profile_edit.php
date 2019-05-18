<?php session_start();
  $_SESSION['username']="fayedanik";
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Selise Online Exam System </title>
  </head>
  <body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="d-flex flex-grow-1">
              <a class="navbar-brand d-none d-lg-inline-block" href="#">
                  <img src="img/logo1.jpg" alt="logo" class="navbar-brand img-rounded" style="height:60px;width:60px">
                  Online Examination System

              </a>
              <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
                  <img src="img/logo1.jpg" alt="logo" class="navbar-brand img-rounded" style="height:60px;width:60px">
              </a>
              <div class="w-100 text-right">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                      <span class="navbar-toggler-icon"></span>
                  </button>
              </div>
          </div>
          <div class="collapse navbar-collapse flex-grow-1" id="myNavbar">
              <ul class="navbar-nav ml-auto flex-nowrap">
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item nav-active">Home</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item">Test</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item">Tutorial</a>
                  </li>
                  <li class="nav-item">
                      <a href="register.php" class="nav-link m-2 menu-item">Register</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item">Login</a>
                  </li>
              </ul>
          </div>
      </nav>
	  <div class="container" style="background-color:lavender;">
		<h1 style="text-align:center; margin-top:01px">My Profile</h1>
	  </div>

    <?php
      $u=$_SESSION['username'];
      $con = mysqli_connect("localhost","root","","selise_online_exam");
      $sql= "SELECT image FROM userprofile WHERE username='$u' LIMIT 1";
      $q = mysqli_query($con,$sql);
      if(mysqli_num_rows($q)==1){
        while($ans=mysqli_fetch_assoc($q)){
          $directory="img/";
          echo '<img class="mx-auto d-block" width="200" height="200" src = "'.$directory.$ans["image"].'">';
        }
      }
    ?>

    <form method="post" enctype="multipart/form-data" action="profile_edit_php.php">
      <input type="file" name="file" style="margin-left:36%">
      <input type="submit" name="submit" value="upload">
    </form>

    <form method="post" action="profile_edit_php.php">
	  <div class="container">
		<h3>Edit Information</h3>
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Mobile No.</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" type="text" placeholder="Enter Mobile No." name="mobile" method="post" style="width:50%">
        </div>
			</div>
      <div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Full Name</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" type="text" placeholder="Enter fullname" name="fullname" style="width:50%">
        </div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Date of Birth</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" type="text" placeholder="Enter Date of birth" name="birthdate" style="width:50%">
        </div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Current Location</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" type="text" placeholder="Enter location" name="location" style="width:50%">
        </div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Institution</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" type="text" placeholder="Enter Institution" name="institution" style="width:50%">
        </div>
			</div>
      <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">Gender</div>
        <div class="col-sm-8" style="background-color:lavender;">
        <select name="gender">
        <option>Male</option>
        <option>Female</option>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">Website URL</div>
        <div class="col-sm-8" style="background-color:lavender;">
        <select name="website">
        <option>Facebook</option>
        <option>Linkedin</option>
        <option>Twitter</option>
        </select>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">Link</div>
        <div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" type="text" placeholder="Your Link" name="link" style="width:100%">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4" style="background-color:lavender;">About Me</div>
        <div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" type="text" placeholder="Write about yourself" name="aboutme" style="width:100%">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4" style="background-color:lavender;"></div>
        <div class="col-sm-8" style="background-color:lavender;">
          <div class="input-group">
              <button type="submit" name="sub" class="btn" style="background-color:green">Save</button>
          </div>
        </div>

      </div>
		</div>
	  </div>
  </form>



  </body>
</html>
