<?php
    include('connection.php');
    require 'PHPMailer/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'anikfayed@gmail.com';          // SMTP username
    $mail->Password = '2879AniK'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;  
    
    $mail->setFrom('anikfayed@gmail.com', 'TestMakerBd');
    $mail->addReplyTo('anikfayed@gmail.com', 'TestMakerBd'); 
    $mail->isHTML(true);
    if(isset($_POST['submit'])){
        $email=$_POST['email'];
        $email=mysqli_real_escape_string($con,$email);
        $type=$_POST['selectype'];
        if($type=="user"){
            $sql="SELECT * FROM `opai_user` WHERE useremail='$email' LIMIT 1";
            $res=mysqli_query($con,$sql);
            if($res){
                if(mysqli_num_rows($res)==1){
                    $ans=mysqli_fetch_assoc($res);
                    $username=$ans["userUsername"];
                    $firstname=$ans["userfirstname"];
                    $lastname=$ans["userlastname"];
                    $forgotkey=rand();
                    $id=$ans["userid"];
                    $sql="UPDATE `opai_user` SET `forgotkey`='$forgotkey' WHERE userid='$id'";
                    $q=mysqli_query($con,$sql);
                    $to=$ans["useremail"];
                    $mail->addAddress($to);
                    $mail->Subject = 'Password Recovery';
                    $bodyContent = "Hi $firstname $lastname,<br><br>
                                Greetings from TestMakerBd. We received password recovery for your account!<br>
                                Please enter the code  $forgotkey
                                <br><br>
                                Thank You
                                <br>
                                Regards by Testmakerbd Team
                                ";
                    $mail->Body    = $bodyContent;
                    if(!$mail->send()) {
                        header('Location:error.php');
                    }

                    header('Location:recovery.php');

                    
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Email not found")';
                    echo '</script>';
                }
            }
        }
        else{
            $sql="SELECT * FROM `opai_setter` WHERE setteremail='$email' LIMIT 1";
            $res=mysqli_query($con,$sql);
            if($res){
                if(mysqli_num_rows($res)==1){
                    $ans=mysqli_fetch_assoc($res);
                    $username=$ans["setterUsername"];
                    $firstname=$ans["setterfirstname"];
                    $lastname=$ans["setterlastname"];
                    $forgotkey=rand();
                    $id=$ans["setterid"];
                    $sql="UPDATE `opai_setter` SET `forgotkey`='$forgotkey' WHERE setterid='$id'";
                    $q=mysqli_query($con,$sql);
                    $to=$ans["setteremail"];
                    $mail->addAddress($to);
                    $mail->Subject = 'Password Recovery';
                    $bodyContent = "Hi $firstname $lastname,<br><br>
                                Greetings from TestMakerBd. We received password recovery for your account!<br>
                                Please enter the code  $forgotkey
                                <br><br>
                                Thank You
                                <br>
                                Regards by Testmakerbd Team
                                ";

                    $mail->Body    = $bodyContent;
                    if(!$mail->send()) {
                        header('Location:error.php');
                    }

                    header('Location:recovery.php');
                    
                }
                else{
                    echo '<script language="javascript">';
                    echo 'alert("Email not found")';
                    echo '</script>';
                }
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
                      <a href="login.php" class="nav-link m-2 menu-item">Login</a>
                  </li>
              </ul>
          </div>
      </nav>

    <div class="container" style="height:400px;padding:30px">

        <form  action="" class="form-container justify-content-center" style="height:257px" method="POST" name="forgotform">
            <div class="form-group">
              <label for="username">Email</label>
              <input type="text" id="username" placeholder="Please enter your email" class="form-control form-control-md" name="email">
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
                <input type="submit" class="btn btn-primary btn-block" name="submit" value="SEND">
            </div>

        </form>
    </div>

  </body>
</html>
