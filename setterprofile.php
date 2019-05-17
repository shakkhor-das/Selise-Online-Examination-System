<?php
session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
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
    <title>Selise Online Exam System </title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav nav-pills">
          <div class="d-flex flex-grow-1">
              <a class="navbar-brand d-none d-lg-inline-block" href="guesthome.php">
              <img src="img/logo1.jpg" alt="logo" class="navbar-brand img-rounded" style="height:60px;width:60px">
                  Online Examination System

              </a>
              <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="guesthome.php">
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
                        <img src="img/rdj.jpg" alt="small pro pic" style=" border-radius: 50%; height:50px;width:50px">
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link m-2 menu-item"><?php echo $_SESSION["username"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="guesthome.php" class="nav-link m-2 menu-item nav-active">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Test</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Tutorial</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#" class="nav-link m-2 menu-item">Logout</a>  
                    </li>
              </ul>
          </div>
    </nav>

    <div id="sidebar">
        <div class="list">
            <div class="item">Edit Profile</div>
            <div class="item">My Blog</div>
            <div class="item">Message</div>
            <div class="item">Settings</div>
        </div>
    </div>

	
    <div class="card" style="">
        <div class="card-header">
            <img src="img/rdj.jpg" alt="Profile Image" class="profile-img">
        </div>
        <div class="card-body">
        
	  

            <div class="container" style="margin-top:50px">
                    <h3>Contact Information</h3>
                            <div class="jumbotron">
                                    <div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="email">Email</label></div>
                                        <div class="col-sm-8" style="background-color:lavender;">imran1510043@gmail.com</div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="email">Mobile No.</label></div>
                                        <div class="col-sm-8" style="background-color:lavender;">+800123456789</div>
                                    </div>
                            </div>
            </div>


            <div class="container style="padding:20px">
                    <h3>General Information</h3>
                        <div class="jumbotron">
                                <div class="row">
                                        <div class="col-sm-4" style="background-color:lavender;"><label for="email">Full Name</label></div>
                                        <div class="col-sm-8" style="background-color:lavender;">Md. Rashidul Islam Imran</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4" style="background-color:lavender;"><label for="email">Username</label></div>
                                    <div class="col-sm-8" style="background-color:lavender;"><?php echo $_SESSION['username']?></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4" style="background-color:lavender;"><label for="email">Date of Birth</label></div>
                                    <div class="col-sm-8" style="background-color:lavender;">22/09/1996</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4" style="background-color:lavender;"><label for="email">Current Location</label></div>
                                    <div class="col-sm-8" style="background-color:lavender;">Bangladesh</div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4" style="background-color:lavender;"><label for="email">Institution</label></div>
                                    <div class="col-sm-8" style="background-color:lavender;">RUET</div>
                                </div>
                        </div>
	        </div>

            <div class="container">
                    <h3>Additional Information</h3>
                        <div class="jumbotron">
                            <div class="row">
                                <div class="col-sm-4" style="background-color:lavender;"><label for="email">Gender</label></div>
                                <div class="col-sm-8" style="background-color:lavender;">Male</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4" style="background-color:lavender;"><label for="email">Website Url</label></div>
                                <div class="col-sm-8" style="background-color:lavender;">Facebook</div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4" style="background-color:lavender;"><label for="email">Bio</label></div>
                                <div class="col-sm-8" style="background-color:lavender;">
                                    hjwvvvvvvvvvvv wvvvvvvvvvvvvvvvvvvvhvwjvhv
                                </div>
                            </div>
                        </div>
            </div>

        </div>
    </div>
    
    
       

  </body>
</html>
