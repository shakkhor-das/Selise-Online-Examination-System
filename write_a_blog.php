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
            if(empty($title)){
              echo "Title can't be empty";
            }
            else if(empty($post)){
              echo "Post can't be empty";
            }
            else{
              $sql = "INSERT into opai_setter_blog (username,datetime,title,post) VALUES ('$username','$datetime','$title','$post')";
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

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


      <div class="container">
      
        <div class="jumbotron">
          <form action="write_a_blog.php" method ="post">

            <div class="form-group">
              <label for="title"><span class="Fieldinfo">Title:</label></span>
              <input type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
              <label for="">Content:</label>
              <textarea name="postt" id="summernote" cols="30" rows="30"class="form-control"></textarea>
            </div><br>


              <input type="submit" name="post" class="btn btn-success" value="Add Post">


          </form>
        </div>
      </div>

    <!--  </div>
 </div>-->



  </body>
</html>


<script>
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>

<script>
      $('#summernote').summernote();
      $('#summernote').summernote({
      height: 400,                 // set editor height
      minHeight: 400,             // set minimum height of editor
      maxHeight: 400,             // set maximum height of editor
      focus: true                  // set focus to editable area after initializing summernote
    });
</script>
