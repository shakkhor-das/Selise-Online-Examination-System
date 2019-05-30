<?php
    include('connection.php');
    
    if(isset($_POST['submit']) and isset($_GET['username'])){
        $username=$_GET['username'];
        $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($q);
        $id=$res["userid"];
        $serverpassword = $res["userpassword"];
        $newpassword = mysqli_real_escape_string($con,$_POST['newpassword']);
        $confirmnewpassword = mysqli_real_escape_string($con,$_POST['confirmnewpassword']);
        $recoverycode=mysqli_real_escape_string($con,$_POST['recoverycode']);
          //$sq="SELECT setterpassword FROM `opai_setter` WHERE setterUsername='$username' LIMIT 1";
        if($recoverycode == $res["forgotkey"] and $newpassword == $confirmnewpassword){
              $newpassword = md5($newpassword);
              $sql = "UPDATE `opai_user` SET userpassword = '$newpassword' WHERE userid = '$id'";
              $q = mysqli_query($con,$sql);
              header('Location:login.php');
        }
        else{
              echo '<script type="javascript">';
              echo 'alert("Something went wrong")';
              echo  '</script>';
        }
    }


?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
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
                      <a href="guesthome.html" class="nav-link m-2 menu-item nav-active">Home</a>
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
                      <a href="login.php" class="nav-link m-2 menu-item">Login</a>
                  </li>
              </ul>
          </div>
      </nav>
      <div class="card">
          <div class="card-body">
            <form action="" method="post">
              <div class="container" style="margin-top:50px">
                  <h3>Recover Password</h3>
                  <div class="jumbotron">

                    <div class="row">
                      <div class="col-sm-4" style="background-color:lavender;"><label for="current_password">Recovery Code</label></div>
                      <div class="col-sm-8" style="background-color:lavender;">
                          <input type="password" name="recoverycode">
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
    </body>
</html>