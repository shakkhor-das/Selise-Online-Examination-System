<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        include('connection.php');
        $username=$_SESSION['username'];
        $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($q);
        $id = $res["userid"];
        $sql1="SELECT * FROM `opai_user_details` WHERE user_id='$id'";
        $q1=mysqli_query($con,$sql1);
        $res1=mysqli_fetch_assoc($q1);

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
								echo '<img class="profile-img" width:"50px" height="50px" alter="Image" src = "'.$directory.$res1["user_image"].'">';
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
                            <a class="dropdown-item" href="usertestfundamentals.php">Take a test</a>
                            <a class="dropdown-item" href="#">My Previous Test</a>
                            <a class="dropdown-item" href="userregisteredtest.php">My Registered Test</a>
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
							<a href="user_profile_edit.php"  aria-exapnded="false" >Edit Profile</a>
						</li>

						<li class="active">
							<a href="usermyblogs.php" aria-exapnded="false" >My Blogs</a>
						</li>

						<li class="active">
							<a href="user_write_a_blog.php" aria-exapnded="false" >Write a blog</a>
						</li>

						<li class="active">
							<a href="user_settings.php" aria-exapnded="false" >Settings</a>
						</li>
				</ul>
			</nav>

      <div class="content">
          <button type="button" class="btn btn-info" id="sidebarCollapse" onclick="togglesidemenu()">
            <i class="fa fa-align-justify"></i>
          </button>
      </div>

      <div class="col-sm-8">
        <div class="jumbotron">
          <?php
            $viewquery = "SELECT * FROM opai_user_blog ORDER BY id desc";
            $execute = mysqli_query($con,$viewquery);
            while($datarows = mysqli_fetch_assoc($execute)){
              $user = $datarows["username"];
              $id = $datarows["id"];
              $datetime = $datarows["datetime"];
              $title = $datarows["title"];
              $post = $datarows["post"];
           ?>

          <div class="blogpost">
           <div class="caption"><h1 style="color:blue"><?php echo htmlentities($title); ?></h1></div>
             <p style="color:red">Published on <?php echo htmlentities($datetime); ?></p>
             <p>By <b style="color:green"><?php echo $user; ?></b></p>
             <p class="post"><?php
             if(strlen($post)>400){$post = substr($post,0,400).'...';}
             echo $post; ?>
             <a href="setter_fullpost.php?id=<?php echo $id; ?>" style="color:blue"><span style="float:right">Read More</span></a>
             </p>

             <div style="height : 8px; background : lavender"></div>
          </div>
          <div style="height : 3px; background : #557788"></div>
         <?php } ?>
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
