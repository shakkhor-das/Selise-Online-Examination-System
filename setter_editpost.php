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
        if(isset($_POST['update'])){
          $title = mysqli_real_escape_string($con,$_POST['title']);
          $post = mysqli_real_escape_string($con,$_POST['postt']);
          if(empty($title)){
            echo "Title can't be empty";
          }
          else if(empty($post)){
            echo "Post can't be empty";
          }
          else{
            $postid = $_GET["id"];
            $sql = "UPDATE opai_setter_blog SET title='$title',post='$post' WHERE id = '$postid' ORDER BY id desc";
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

    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    <link rel="stylesheet" href="css/profilestyle.css">-->
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">-->
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
                        <a href="login.php" class="nav-link m-2 menu-item"><?php echo $_SESSION["username"]; ?></a>
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


      <div class="container">
        <div class="jumbotron">

          <?php
            $postidfromurl = $_GET["id"];
            $viewquery = "SELECT * FROM opai_setter_blog WHERE id = '$postidfromurl' ORDER BY id desc";
            $execute = mysqli_query($con,$viewquery);
            while($datarows = mysqli_fetch_assoc($execute)){
              $titleupdate = $datarows["title"];
              $postupdate = $datarows["post"];
           ?>

          <form action="setter_editpost.php?id=<?php echo $postidfromurl; ?>" method ="post">

            <div class="form-group">
              <label for="title"><span class="Fieldinfo">Title:</label></span>
              <input value="<?php echo $titleupdate; ?>" type="text" class="form-control" name="title">
            </div>

            <div class="form-group">
              <label for="">Content:</label>
              <textarea name="postt" id="summernote" cols="30" rows="50"class="form-control"><?php echo $postupdate; ?></textarea>
            </div></br>


              <input type="submit" name="update" class="btn btn-success" value="Update">


          </form>
        <?php } ?>
        </div>
      </div>



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
