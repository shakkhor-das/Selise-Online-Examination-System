<?php
    if(isset($_GET['vk']) and isset($_GET['type'])){
        include('connection.php');
        $verificationkey=$_GET['vk'];
        $type=$_GET['type'];
        if($type==1){
            $sql="SELECT userid,verificationkey ,verificationstatus FROM `opai_user` WHERE verificationkey='$verificationkey' AND verificationstatus IS NULL LIMIT 1";

            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1){
                $sql="UPDATE `opai_user` SET `verificationstatus`= 1 WHERE verificationkey='$verificationkey' LIMIT 1";
                if(mysqli_query($con,$sql)){
                    $res=mysqli_fetch_assoc($result);
                    $id=$res["userid"];
                    $sql1="INSERT INTO `opai_user_details` (`user_id`) VALUES ('$id')";
                    $execute=mysqli_query($con,$sql1);
                    if($execute){
                        echo "yep";
                    }
                    header('Location:login.php');
                }
                else{
                    header('Location:error.php');
                }
            }
            else{
                header('Location:error.php');
            }
        }
        else{
            $sql="SELECT setterid,verificationkey ,verificationstatus FROM `opai_setter` WHERE verificationkey='$verificationkey' AND verificationstatus IS NULL LIMIT 1";

            $result=mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1){
                $sql="UPDATE `opai_setter` SET `verificationstatus`= 1 WHERE verificationkey='$verificationkey' LIMIT 1";
                if(mysqli_query($con,$sql)){
                    $res=mysqli_fetch_assoc($result);
                    $id=$res["setterid"];
                    $sql1="INSERT INTO `opai_setter_details` (`setter_id`) VALUES ('$id')";
                    $execute=mysqli_query($con,$sql1);
                    header('Location:login.php');
                }
                else{
                    header('Location:error.php');
                }
            }
            else{
                header('Location:error.php');
            }
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
    </body>
</html>



