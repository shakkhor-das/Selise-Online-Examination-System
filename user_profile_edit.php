<?php
	include('connection.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        $username=$_SESSION["username"];
		$sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
		$res=mysqli_fetch_assoc($q);
		$id=$res["userid"];
		$sql="SELECT * FROM `opai_user_details` WHERE user_id='$id'";
		$q=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($q);
		$mobileno = $res["user_mobile_no"];
		$fullname = $res["user_full_name"];
		$birthdate = $res["user_date_of_birth"];
		$location = $res["user_current_location"];
		$institution = $res["user_institution"];
		$facebook = $res["user_facebook_url"];
		$linkedin = $res["user_linkedin_url"];
		$github = $res["user_github_url"];
		$bio = $res["user_bio"];
    }

		
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
    <link rel="stylesheet" href="css/profileedit.css">
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
              <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
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
								echo '<img class="profile-img" width:"50px" height="50px" alter="Image" src = "'.$directory.$res["user_image"].'">';
						?>
                    </li>
                    <li class="nav-item">
                        <a href="userProfile.php" class="nav-link m-2 menu-item"><?php echo $_SESSION["username"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="userHome.php" class="nav-link m-2 menu-item nav-active">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link m-2 menu-item nav-active dropdown-toogle" data-toggle="dropdown" data-target="dropdown_target">Test
                        <i class="fas fa-caret-down"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown_target">
                            <a class="dropdown-item" href="usertestfundamentals.php">Take a Test</a>
                            <a class="dropdown-item" href="#">My Previous Tests</a>
                            <a class="dropdown-item" href="userregisteredtest.php">My Registered Tests</a>
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
							<a href="userProfile.php"  aria-exapnded="false" >My Profile</a>
						</li>

						<li class="active">
							<a href="usermyblog.php" aria-exapnded="false" >My Blogs</a>
						</li>

						<li class="active">
							<a href="user_write_a_blog.php" aria-exapnded="false" >Write a blog</a>
						</li>

						<li class="active">
							<a href="user_settings.php"  aria-exapnded="false" >Settings</a>
						</li>
				</ul>
			</nav>

			<div class="content">
				<button type="button" class="btn btn-info" id="sidebarCollapse" onclick="togglesidemenu()">
					<i class="fa fa-align-justify"></i>
                     </button>

	        </div>

            <div class="card" style="">
                <div class="card-header">
					<img src="img/rdj.jpg" alt="Profile Image" class="profile-img">
						<?php
										$directory="img/";
										echo '<img class="profile-img" src = "'.$directory.$res["user_image"].'">';
										?>
							</div>
								<div id="imageupload">
									<form action="userprofilesubmit.php" method="post" enctype="multipart/form-data">
											<input type="file" name="file" value="image">
											<input type="submit" name="submit" value="Upload">
									</form>
								</div>
                <div class="card-body">



				<form action="userprofilesubmit.php" method="post">
                    <div class="container" style="margin-top:50px">
                            <h3>Contact Information</h3>
                                <div class="jumbotron">

                                        <div class="row">
                                             <div class="col-sm-4" style="background-color:lavender;"><label for="mobile">Mobile No.</label></div>
															<div class="col-sm-8" style="background-color:lavender;">
																	<input type="text" name="mobile" value="<?php echo $mobileno; ?>">
																				</div>
                                        </div>
                                </div>
                    </div>


                    <div class="container style="padding:20px">
                            <h3>General Information</h3>
                                <div class="jumbotron">
                                        <div class="row">
                                                <div class="col-sm-4" style="background-color:lavender;"><label for="fullname">Full Name</label></div>
																						<div class="col-sm-8" style="background-color:lavender;">
																						<input type="text" name="fullname" value="<?php echo $fullname; ?>">
																					</div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4" style="background-color:lavender;"><label for="dateofbirth">Date of Birth</label></div>
																						<div class="col-sm-8" style="background-color:lavender;">
																						<input type="date" name="dateofbirth" value="<?php echo $birthdate; ?>" style="width:200px">
																						</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="background-color:lavender;"><label for="currentlocaton">Current Location</label></div>
																						<div class="col-sm-8" style="background-color:lavender;">
																						<input type="text" name="currentlocation" value="<?php echo $location; ?>">
																						</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4" style="background-color:lavender;"><label for="institution">Institution</label></div>
																						<div class="col-sm-8" style="background-color:lavender;">
																						<input type="text" name="institution" value="<?php echo $institution; ?>">
																						</div>
                                        </div>
                                </div>
                    </div>

                    <div class="container">
                            <h3>Additional Information</h3>
                                <div class="jumbotron">
                                    <div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="gender">Gender</label></div>
                                            <div class="col-sm-8" style="background-color:lavender;">
                                                <select name="gender" id="">
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="facebook">Facebook Url</label></div>
                                                <div class="col-sm-8" style="background-color:lavender;">
                                                    <input type="url" name="facebookurl" value="<?php echo $facebook; ?>">
                                                </div>
                                        </div>
																		<div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="facebook">LinkedIn Url</label></div>
																				<div class="col-sm-8" style="background-color:lavender;">
																				<input type="url" name="linkedin" value="<?php echo $linkedin; ?>">
																				</div>
																		</div>
																		<div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="facebook">GitHub Url</label></div>
																				<div class="col-sm-8" style="background-color:lavender;">
																				<input type="url" name="GitHub" value="<?php echo $github; ?>">
																			</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="Bio">Bio</label></div>
                                        <div class="col-sm-8" style="background-color:lavender;">
                                            <textarea name="bio" id="" cols="30" rows="4"> <?php echo $bio; ?></textarea>
                                        </div>
                                    </div>
                                </div>
										</div>

										<input type="submit" class="btn btn-success" name="update" value="Save Changes">
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



<?php
		//include('connection.php');



?>
