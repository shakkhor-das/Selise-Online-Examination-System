<?php
    session_start();
    if(isset($_POST['submit'])){
        $link='login.php';
        include('connection.php');
        $email=$_POST['email'];
        $email=mysqli_real_escape_string($con,$email);
        $type=$_POST['selectype'];
        $password=$_POST['password'];
        $password=mysqli_real_escape_string($con,$password);
        $password=md5($password);
        $error="";
        if($type=="setter"){
            $sql="SELECT  `setterUsername`,`setterpassword`,`verificationstatus` FROM `opai_setter` WHERE setteremail='$email' LIMIT 1";
            $res=mysqli_query($con,$sql);
            if(mysqli_num_rows($res)==1){
                $tmp=mysqli_fetch_assoc($res);
                if($tmp["verificationstatus"]==NULL){
                    echo '<script language="javascript">';
                    echo 'alert("Please Verify your account first")';
                    echo '</script>';
                }

                else if($tmp["setterpassword"]!=$password){
                    echo '<script language="javascript">';
                    echo 'alert("Password incorrect")';
                    echo '</script>';
                }
                else{
                    $_SESSION['username']=$tmp["setterUsername"];
                    header('Location:setterprofile.php');
                }
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Invalid Email")';
                echo '</script>';
            }
        }
        else{
            $sql="SELECT  `userUsername`,`userpassword`,`verificationstatus` FROM `opai_user` WHERE useremail='$email' LIMIT 1";
            $res=mysqli_query($con,$sql);
            if(mysqli_num_rows($res)==1){
                $tmp=mysqli_fetch_assoc($res);
                if($tmp["verificationstatus"]==NULL){
                    echo '<script language="javascript">';
                    echo 'alert("Please Verify your account first")';
                    echo '</script>';
                }
                else if($tmp["userpassword"]!=$password){
                    echo '<script language="javascript">';
                    echo 'alert("Password incorrect")';
                    echo '</script>';
                }
                else{
                    $_SESSION['username']=$tmp["userUsername"];
                    header('Location:userProfile.php');
                }
            }
            else{
                echo '<script language="javascript">';
                echo 'alert("Invalid Email")';
                echo '</script>';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Selise Online Exam System </title>
  </head>
  <body>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="d-flex flex-grow-1">
              <a class="navbar-brand d-none d-lg-inline-block" href="guesthome.php">
              <img src="img/logo1.png" alt="logo" class="navbar-brand img-rounded" style="height:80px;width:80px">
                  Online Examination System

              </a>
              <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="guesthome.php">
                  <img src="img1/logo1.png" alt="logo" class="navbar-brand img-rounded" style="height:80px;width:80px">
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
                        <a href="guesthome.php" class="nav-link m-2 menu-item nav-active">Home</a>
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

                        <a href="login.php" class="nav-link m-2 menu-item" >Login</a>
                  </li>
              </ul>
          </div>
      </nav>

    <div class="container">

        <form  action="" class="form-container justify-content-center" style="height:400px" method="POST" name="loginform" onSubmit="return formvalidation()">
            <div class="form-group">
              <label for="username">Email</label>
              <input type="text" id="username" placeholder="Email" class="form-control form-control-md" name="email">
              <div id="erroremail">
              </div>
            </div>


            <div class="form-group">
              <label for="account-type">Select Account Type</label>
              <select id="account-type" name="selectype" class="form-control form-control-md" required="required">
                <option value="">Choose account type</option>
                <option value="user">User</option>
                <option value="setter">Setter</option>
              </select>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Password" class="form-control form-control-md" name="password" required>
                <div id="errorpassword"></div>
            </div>
            <div class="form-group">

                <input type="submit" class="btn btn-lg btn-primary btn-block btn-sign in" name="submit" value="LOGIN">

            </div>
            <a href="forgotpassword.php" style="float:right;margin-top:13px;">forgot password?</a>

        </form>
    </div>



  </body>
</html>

<script>
    function formvalidation(){
        var email = document.forms['loginform']['email'];
        var password=document.forms['loginform']['password'];
        var mailformat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var erroremail=document.getElementById('erroremail');
        var errorpassword=document.getElementById('errorpassword');
        //var erroremail=document.getElementById('erroremail');
        if(email.value==""){
            erroremail.textContent="Email is required";
            erroremail.style.color="red";
            email.focus();
            return false;
        }
        if(!email.value.match(mailformat)){
            erroremail.textContent="Email is invalid";
            erroremail.style.color="red";
            email.focus();
            return false;
        }
    }
</script>
