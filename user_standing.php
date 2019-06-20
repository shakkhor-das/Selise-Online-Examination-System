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
        $id = $_GET["ID"];
        $sql2="SELECT * FROM `opai_setter_global` WHERE test_id='$id'";
        $q2=mysqli_query($con,$sql2);
        $res2=mysqli_fetch_assoc($q2);
        $testname = $res2["test_name"];
        $testansname = "rg".$testname;
        $sql3="SELECT * FROM `$testansname` ORDER BY achieved_point DESC";
        $q3=mysqli_query($con,$sql3);
        $sql4="SELECT * FROM `opai_user_registeredtable` WHERE testid='$id'";
        $q4=mysqli_query($con,$sql4);
        $total = mysqli_num_rows($q4);
        $setterid = $res2["setter_id"];
        $sql5="SELECT * FROM `opai_setter` WHERE setterid = '$setterid'";
        $q5=mysqli_query($con,$sql5);
        $res5=mysqli_fetch_assoc($q5);
        $sql7="SELECT * FROM `opai_user` WHERE userUsername='$username'";
        $q7=mysqli_query($con,$sql7);
        $res7=mysqli_fetch_assoc($q7);
        $id4=$res7["userid"];
        $sql6="SELECT * FROM `opai_user_details` WHERE user_id='$id4'";
        $q6=mysqli_query($con,$sql1);
        $res6=mysqli_fetch_assoc($q1);
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
								echo '<img class="profile-img" width:"50px" height="50px" alter="Image" src = "'.$directory.$res6["user_image"].'">';
						?>
                    </li>
                    <li class="nav-item">
                        <a href="userprofile.php" class="nav-link m-2 menu-item"><?php echo $_SESSION["username"]; ?></a>
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
       <div class="jumbotron" style="width:55%;margin-left:85px">

         <h1 style="margin-left:180px;margin-bottom: 60px;color:green">Standings</h1>

         <table style="margin-left:100px;width:60%">
           <tbody>
             <tr style="text-align:left">
               <td style="text-align: left">Test Title :</td>
               <td style="text-align: left"><?php echo $res2["test_title"]; ?></td>
             </tr>
             <tr style="text-align:left">
               <td style="text-align: left">Setter Name :</td>
               <td style="text-align: left"><?php echo $res5["setterUsername"]; ?></td>
             </tr>
             <tr style="text-align:left">
               <td style="text-align: left">Subject :</td>
               <td style="text-align: left"><?php echo $res2["subject"]; ?></td>
             </tr>
             <tr style="text-align:left">
               <td style="text-align: left">Total Registered Participants :</td>
               <td style="text-align:left;color:red;font-weight:bold"><?php echo $total; ?></td>
             </tr>
           </tbody>
         </table>

       </div>
  <div class="table-responsive">
  <table style="border:1px solid black;width:70%">
    <thead>
      <tr style="border:1px solid black;text-align:center">
        <th style="border:1px solid black;text-align:center;color:blue">Rank</th>
        <th style="border:1px solid black;text-align:center;color:blue">Username</th>
        <th style="border:1px solid black;text-align:center;color:blue">Marks</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $count = 1;
      while($datarows = mysqli_fetch_assoc($q4)){
        $userid = $datarows["userid"];
        $sqlnew="SELECT * FROM `opai_user` WHERE userid='$userid'";
        $querynew=mysqli_query($con,$sqlnew);
        $data=mysqli_fetch_assoc($querynew);
        $username=$data["userUsername"];
        $marks = $datarows["achieved_point"];
      ?>
      <tr style="border:1px solid black;text-align:center">
        <td style="border:1px solid black;text-align:center"><?php echo $count; ?></td>
        <td style="border:1px solid black;text-align:center"><?php echo $username; ?></td>
        <td style="border:1px solid black;text-align:center"><?php echo $marks; ?></td>
      </tr>
    <?php $count++;} ?>
    </tbody>
  </table>
</div>
    </div>



  </body>
</html>


<script>
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
</script>
