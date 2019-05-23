<<<<<<< HEAD


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
        $id=$res["setterid"];
        $sql1="SELECT * FROM `opai_setter_details` WHERE setter_id='$id'";
        $q1=mysqli_query($con,$sql1);
        $res1=mysqli_fetch_assoc($q1);
        if(isset($_POST['submit'])){
            echo $_POST["field"];
        }
    }
    
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>bootstrap4</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/question.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav nav-pills">
            <div class="d-flex flex-grow-1">
                <a class="navbar-brand d-none d-lg-inline-block" href="guesthome.php">
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
                            <?php
                                    $directory="img/";
                                    echo '<img class="profile-img" width:"50px" height="50px" alter="Image" src = "'.$directory.$res1["setter_image"].'">';
                            ?>
                        </li>
                        <li class="nav-item">
                            <a href="setterprofile.php" class="nav-link m-2 menu-item"><?php echo $_SESSION["username"]; ?></a>
                        </li>
                        <li class="nav-item">
                            <a href="guesthome.php" class="nav-link m-2 menu-item nav-active">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link m-2 menu-item nav-active dropdown-toogle" data-toggle="dropdown" data-target="dropdown_target">Test
                            <i class="fas fa-caret-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdown_target">
                                <a class="dropdown-item" href="settertestfundamentals.php">Create Test</a>
                                <a class="dropdown-item" href="#">My Previous Test</a>
                                <a class="dropdown-item" href="#">My upcoming Test</a>
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
							<a href="#" data-toggle="collapse" aria-exapnded="false" >My Blogs</a>
						</li>

						<li class="active">
							<a href="#" data-toggle="collapse" aria-exapnded="false" >Write a blog</a>
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

            
            <div class="container" style="width:500px">
            <form action="" method ="post">
                <label for="">Content:</label>
                <textarea name="field" id="summernote" cols="30" rows="30"class="form-control"></textarea>
                <input type="submit" name="submit" class="btn btn-submit" value="submit">
            </form>
            </div>
            


        </div>
        
  </body>
</html>

<script>
  $('#summernote').summernote();
  $('#summernote').summernote({
  
        height: 300,                 // set editor height
        minHeight: 300,             // set minimum height of editor
        maxHeight: 300,             // set maximum height of editor
        focus: true                  // set focus to editable area after initializing summernote
});
</script>


<script>
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>


=======


<?php
/*
    include('connection.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        echo $_POST["sf1"];
    }

*/
    if(isset($_POST['submit'])){
        echo $_POST["field"];
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>bootstrap4</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
  </head>
  <body>
    <div class="container" style="height:200px ">
        <form action="" method ="post">
            <label for="">Content</label>
            <textarea name="field" id="summernote" cols="30" rows="10"class="form-control"></textarea>
            <input type="submit" name="submit" class="btn btn-submit" value="submit">
        </form>
    </div>
  </body>
</html>

<script>
  $('#summernote').summernote();
  $('#summernote').summernote({

  height: 100,                 // set editor height
  minHeight: 100,             // set minimum height of editor
  maxHeight: 100,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
</script>
>>>>>>> dff8f4d65a96611631953982f982428c584e04f2
