<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        include('connection.php');
        $username=$_SESSION['username'];
        $sql="SELECT * FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($q);
        $id = $res["setterid"];
        $sql1="SELECT * FROM `opai_setter_details` WHERE setter_id='$id'";
        $q1=mysqli_query($con,$sql1);
        $res1=mysqli_fetch_assoc($q1);
        if(isset($_POST['submit'])){
          $currentpassword = mysqli_real_escape_string($con,$_POST['currentpassword']);
          $currentpassword = md5($currentpassword);
          $serverpassword = $res["setterpassword"];
          $newpassword = mysqli_real_escape_string($con,$_POST['newpassword']);
          $confirmnewpassword = mysqli_real_escape_string($con,$_POST['confirmnewpassword']);
          //$sq="SELECT setterpassword FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
          if($serverpassword == $currentpassword && $newpassword == $confirmnewpassword){
              $newpassword = md5($newpassword);
              $sql = "UPDATE `opai_setter` SET setterpassword = '$newpassword' WHERE setterid = '$id'";
              $q = mysqli_query($con,$sql);
              $message = "Password changed successfully";
              echo "<script type='text/javascript'>alert('$message');</script>";
              header('Location:setterprofile.php');
          }
          else{
                $message = "Something went wrong!!!";
                echo "<script type='text/javascript'>alert('$message');</script>";
          }
        }
    }
//echo $_SESSION["username"];


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
    <link rel="stylesheet" href="css/profilestyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <title>Selise Online Exam System </title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav nav-pills">
          <div class="d-flex flex-grow-1">
              <a class="navbar-brand d-none d-lg-inline-block" href="guesthome.php">
              <img src="img/logo1.png" alt="logo" class="navbar-brand img-rounded" style="height:80px;width:80px">
                  Online Examination System

              </a>
              <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="guesthome.php">
                  <img src="img/logo1.png" alt="logo" class="navbar-brand img-rounded" style="height:80px;width:80px">
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
                        <?php
								$directory="img/";
								echo '<img class="profile-img" width:"50px" height="50px" alter="Image" src = "'.$directory.$res1["setter_image"].'">';
						?>
                    </li>
                    <li class="nav-item">
                        <a href="setterprofile.php" class="nav-link m-2 menu-item"><?php echo $_SESSION["username"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="setterhome.php" class="nav-link m-2 menu-item nav-active">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link m-2 menu-item nav-active dropdown-toogle" data-toggle="dropdown" data-target="dropdown_target">Test
                        <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown_target">
                            <a class="dropdown-item" href="settertestfundamentals.php">Create Test</a>
                            <a class="dropdown-item" href="#">My Previous Test</a>
                            <a class="dropdown-item" href="setterupcoming.php">My upcoming Test</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Tutorial</a>
                    </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link m-2 menu-item">Logout</a>
                    </li>
              </ul>
          </div>
    </nav>



	<div class="wrapper">
			<nav id="sidebar">
				<ul class="list-unstyled components">
						<li class="active">
							<a href="profile_edit.php"  aria-exapnded="false" >Edit Profile</a>
						</li>

						<li class="active">
							<a href="setter_myblogs.php" aria-exapnded="false" >My Blogs</a>
						</li>

						<li class="active">
							<a href="write_a_blog.php" aria-exapnded="false" >Write a blog</a>
						</li>

						<li class="active">
							<a href="settings.php" aria-exapnded="false" >Settings</a>
						</li>
				</ul>
			</nav>

			<div class="content">
					<button type="button" class="btn btn-info" id="sidebarCollapse" onclick="togglesidemenu()">
						<i class="fa fa-align-justify"></i>
          </button>
      </div>
      <div class="card">
          <div class="card-body">
            <form action="" method="post">
              <div class="container" style="margin-top:50px">
                  <h3>Change Settings</h3>
                  <div class="jumbotron">

                    <div class="row">
                      <div class="col-sm-4" style="background-color:lavender;"><label for="current_password">Current Password</label></div>
                      <div class="col-sm-8" style="background-color:lavender;">
                          <input type="password" name="currentpassword">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4" style="background-color:lavender;"><label for="new_password">New Password</label></div>
                      <div class="col-sm-8" style="background-color:lavender;">
                          <input type="password" name="newpassword">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4" style="background-color:lavender;"><label for="confirm_new_password">Confirm New Password</label></div>
                      <div class="col-sm-8" style="background-color:lavender;">
                          <input type="password" name="confirmnewpassword">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-sm-4" style="background-color:lavender;"></div>
                      <div class="col-sm-8" style="background-color:lavender;"><input type="submit" style="margin-top:30px" class="btn btn-success" name="submit" value="Submit">
                      </div>
                    </div>

                  </div>
              </div>
            </form>
          </div>
      </div>
  </div>



  </body>
</html>


<script>
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>
