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
        if(isset($_POST['post'])){
          $title = mysqli_real_escape_string($con,$_POST['title']);
          $post = mysqli_real_escape_string($con,$_POST['postt']);
          date_default_timezone_set("Asia/Dhaka");
          $datetime = date("F j, Y, g:i:s a");
          //$datetime = strftime("%B-%d-%Y %H:%M:%S",$currenttime);
          if(empty($title)){
            echo "Title can't be empty";
          }
          else if(empty($post)){
            echo "Post can't be empty";
          }
          else{
            $sql = "INSERT into opai_setter_blog (datetime,title,post) VALUES ('$datetime','$title','$post')";
            $execute = mysqli_query($con,$sql);
            header('Location:setter_myblogs.php');
          }
        }
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
    <link rel="stylesheet" href="css/profilestyle.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
                        <?php
								$directory="img/";
								echo '<img class="profile-img" width:"50px" height="50px" alter="Image" src = "'.$directory.$res1["setter_image"].'">';
						?>
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
							<a href="write_a_blog.php" data-toggle="collapse" aria-exapnded="false" >Write a blog</a>
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

      <?php
        $postidfromurl = $_GET["id"];
        $viewquery = "SELECT * FROM opai_setter_blog WHERE id = '$postidfromurl'";
        $execute = mysqli_query($con,$viewquery);
        while($datarows = mysqli_fetch_assoc($execute)){
          $id = $datarows["id"];
          $title = $datarows["title"];
          $post = $datarows["post"];
       ?>

      <div class="card">
        <!--  <div class="card-body">-->
           <form action="write_a_blog.php" method="post">
              <div class="col" style="margin-top:50px">
                  <h3>Write a Blog</h3>
                  <div class="jumbotron">

                    <div class="form-group">
                      <label for="title"><span class="Fieldinfo">Title:</label></span>
                      <input type="text" class="form-control" name="title">
                    </div>

                    <div class="form-group">
                      <label for="postarea"><span class="Fieldinfo">Post:</span></label>
                      <textarea class="form-control" name="postt" id="description"></textarea>
                    </div>

                    <div class="row">
                      <div class="col-sm-4" style="background-color:lavender;"></div>
                      <div class="col-sm-8" style="background-color:lavender;"><input type="submit" style="margin-top:30px" class="btn btn-success" name="post" value="Add Post">
                      </div>
                    </div>

                </div>
              </div>
            </form>
        </div>
    <!--  </div>-->
 </div>



  </body>
</html>


<script>
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>

  </html>
