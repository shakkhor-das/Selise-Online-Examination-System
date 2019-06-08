<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    $username=$_SESSION['username'];
    $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
    $q=mysqli_query($con,$sql);
    $res=mysqli_fetch_assoc($q);
    $id=$res["userid"];
    $sql1="SELECT * FROM `opai_user_details` WHERE user_id='$id'";
    $q1=mysqli_query($con,$sql1);
    $res1=mysqli_fetch_assoc($q1);
    $testid=$_GET["ID"];
    $sql2="SELECT * FROM `opai_setter_global` WHERE test_id='$testid'";
    $q2=mysqli_query($con,$sql2);
    $ans2=mysqli_fetch_assoc($q2);
    $tbl_name=$ans2["test_name"];
//echo $_SESSION["username"];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
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
                            <a class="dropdown-item" href="usertestfundamentals.php">Take a Test</a>
                            <a class="dropdown-item" href="#">My Previous Tests</a>
                            <a class="dropdown-item" href="userregisteredtest.php">My Registered Tests</a>
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
							<a href="usermyblog.php" aria-exapnded="false" >My Blogs</a>
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

            
            <div class="container">
            <div class="row">
                <div class="col-sm-8" id="col1">
                <div id="colheader"><h1 style=""><i class="fas fa-angle-double-right"></i>Test Fundamentals</h1></div>
                    <div id="colbody">
                    <table class="table table-borderless">
                            <tbody>
                                <tr>
                                <th scope="row">Test Name</th>
                                <td><h5><?php echo $ans2["test_title"];?></h5></td>
                                </tr>
                                <th scope="row">Subject</th>
                                <td><h5><?php echo $ans2["subject"];?></h5></td>
                                </tr>
                                <tr>
                                <th scope="row">Test Type</th>
                                <td><h5><?php echo $ans2["test_type"];?></h5></td>
                                </tr>
                                <tr>
                                <th scope="row">Start Time</th>
                                <td><h5><?php echo $ans2["test_begin_time"];?></h5></td>
                                </tr>
                                <tr>
                                <th scope="row">Duration</th>
                                <td><h5><?php echo $ans2["test_duration"];?></h5></td>
                                </tr>
                                <tr>
                                <th scope="row">Visibility</th>
                                <td><h5><?php echo $ans2["test_visibility"];?></h5></td>
                                </tr>
                            </tbody>
                    </table>
                    </div>
                </div>
                
                <div class="col-sm-4" id="col2">
                        <div class="clock">
                        <table id="clockcontainer">
                            <tr>
                                <td id="day" style="font-size:70px">00:</td>
                                <td id="hour" style="font-size:70px">00:</td>
                                <td id="minute" style="font-size:70px">00:</td>
                                <td id="second" style="font-size:70px">00</td>
                            </tr>
                            <tr>
                                <td style="font-size:20px">Days</td>
                                <td style="font-size:20px">Hours</td>
                                <td style="font-size:20px">Minutes</td>
                                <td style="font-size:20px">Seconds</td>
                            </tr>
                        </table>
                        </div>
                        <button class="btn btn-success" id="mybtn2" style="margin-top:150px;margin-left:50px" style=""><i class="fas fa-lock"> Registered</i></button>
                        <form action="userquestionstart.php" method="post">
                            <input type="hidden" value=<?php echo $testid ?> name="fuck">
                            <input type="submit" name="submit" class="btn btn-success" id="mybtn3" style="margin-top:150px;margin-left:50px" value="Enter" style="display:none">
                        </form>
                </div>

                
            </div>


    </div>



  </body>
</html>


<script>
    countdown();

    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
    function countdown(){
        var time="<?php echo $ans2["test_begin_time"];?>";
        console.log(time);
        var up=new Date(time);
        var now= new Date();
        var currenttime=now.getTime();
        var eventtime=up.getTime();
        var remtime=eventtime-currenttime; //its is is ms
        var s=Math.floor(remtime/1000);
        var m=Math.floor(s/60);
        var h=Math.floor(m/60);
        var d=Math.floor(h/24);
        
        h %= 24;
        m %= 60;
        s %= 60;

        h= h < 10 ? "0"+h : h;
        m= m < 10 ? "0"+m : m;
        s= s < 10 ? "0"+s : s;
        
        var ans=h;
        if(d=="00" && h=="00" && m=="00" && s=="00"){
            $("#mybtn3").show();
            $("#mybtn2").hide();
        }
        if(d>0 || h>0 || m>0 || s>0){
            document.getElementById("day").textContent=d+":";
            document.getElementById("hour").textContent=h+":";
            document.getElementById("minute").textContent=m+":";
            document.getElementById("second").textContent=s;
            setTimeout(countdown,1000);
            $("#mybtn2").show();
            $("#mybtn3").hide();   
        }
        else{
            $("#mybtn2").hide();
            $("#mybtn3").show(); 
        }
    }

    
</script>



<style>

</style>



