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
	  <img src="img/prpic.png" class="mx-auto d-block" style="width:150px;height:150px;">
    <form method="post" enctype="multipart/form-data">
      <input type="file" name="file" style="margin-left:36%">
      <input type="submit" name="upload" value="upload" align="center">

	  <div class="container">
		<h3>Contact Information</h3>
		<div class="jumbotron">
			<!--<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Email</div>
				<div class="col-sm-8" style="background-color:lavender;">imran1510043@gmail.com</div>
			</div>-->
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Mobile No.</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control"  placeholder="Enter Mobile No." name="email" style="width:50%">
        </div>
			</div>
		</div>
	  </div>

	  <div class="container style="padding:20px">
		<h3>General Information</h3>
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Full Name</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" placeholder="Enter fullname" name="fullname" style="width:50%">
        </div>
			</div>
			<!--<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">User Name</div>
				<div class="col-sm-8" style="background-color:lavender;">imran7908</div>
			</div>-->
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Date of Birth</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" placeholder="Enter Date of birth" name="birthdate" style="width:50%">
        </div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Current Location</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" placeholder="Enter location" name="location" style="width:50%">
        </div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Institution</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" placeholder="Enter Institution" name="Institution" style="width:50%">
        </div>
			</div>
		</div>
	  </div>

	  <div class="container">
		<h3>Additional Information</h3>
		<div class="jumbotron">
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Gender</div>
				<div class="col-sm-8" style="background-color:lavender;">
				<select>
				<option>Male</option>
				<option>Female</option>
				</select>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Website URL</div>
				<div class="col-sm-8" style="background-color:lavender;">
				<select>
				<option>Facebook</option>
				<option>Linkedin</option>
				<option>Twitter</option>
				</select>
				</div>
			</div>
      <div class="row">
				<div class="col-sm-4" style="background-color:lavender;">Link</div>
				<div class="col-sm-8" style="background-color:lavender;">
          <input class="form-control" placeholder="Your Link" name="link" style="width:100%">
        </div>
			</div>
			<div class="row">
				<div class="col-sm-4" style="background-color:lavender;">About Me</div>
				<div class="col-sm-8" style="background-color:lavender;">
					<form action="/action_page.php">
						<div class="form-group">
						<textarea class="form-control" rows="5" name="text"></textarea><br>
						<button style="background-color:lightblue">Save</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	  </div>



  </body>
</html>
