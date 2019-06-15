<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    if(isset($_POST["submit"])){
        $id1=$_POST["fuck"];
        $username=$_SESSION['username'];
        $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($q);
        $id=$res["userid"];
        $sql1="SELECT * FROM `opai_user_details` WHERE `user_id`='$id'";
        $q1=mysqli_query($con,$sql1);
        $res1=mysqli_fetch_assoc($q1);
        $sql2="SELECT * FROM `opai_setter_global` WHERE `test_id`='$id1'";
        $q2=mysqli_query($con,$sql2);
        $res2=mysqli_fetch_assoc($q2);
        $id3 = $res2["setter_id"];
        $sql3="SELECT * FROM `opai_setter` WHERE `setterid`='$id3'";
        $q3=mysqli_query($con,$sql3);
        $res3=mysqli_fetch_assoc($q3);
        $tablename = $res2["test_name"];
        $sql4 = "SELECT * FROM $tablename";
        $q4 = mysqli_query($con,$sql4);
        $tot_point=0;
        while($res4=mysqli_fetch_assoc($q4)){
            $tot_point += $res4["qustionpoint"];
        }
    }



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
    <link rel="stylesheet" href="css/questionstyle.css">
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
                <div class="row">
                    <div class="col-sm-6" id="left">
                        <div id="questionheader" style="text-align: center">
                            <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>Test Name</td>
                                    <td><h5><?php echo $res2["test_title"]; ?></h5></td>
                                </tr>
                                <tr>
                                    <td>Setter</td>
                                    <td><h5><?php echo $res3["setterUsername"]; ?></h5></td>   
                                </tr>
                                <tr>
                                    <td>Subject</td>
                                    <td><h5><?php echo $res2["subject"]; ?></h5></td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td><h5><?php echo $res2["test_duration"]; ?></h5></td>
                                </tr>
                                <tr>
                                    <td>Total Marks</td>
                                    <td><h5><?php echo $tot_point; ?></h5></td>
                                </tr>
                                </tbody>
                            </table>
                            
                        </div>

                        <div id="questiontable" style="test-align:left;margin-left:91px;padding:20px;font-weight:bold;border: 1px solid gainsboro;weight:380px">
                            <form action="useranswersubmit.php" method="post">
                                <input type="hidden" name="tablename" value="<?php echo $tablename;?>">
                                <input type="hidden" name="userid" value="<?php echo $id;?>">
                                <input type="hidden" name="setterid" value="<?php echo $id3;?>">
                               <?php
                                    $sql5="SELECT * FROM $tablename";
                                    $q5=mysqli_query($con,$sql5);
                                    $question_no=1;
                                    $val=1;
                                    while($res5=mysqli_fetch_assoc($q5)){
                                        echo $question_no.". ";
                                        echo $res5["question_title"].'---------'.$res5["qustionpoint"].'<br>';
                                        $option=$res5["questionoption"];
                                        $json=json_decode($option,true);
                                        $numofoption=count($json);
                                        $arr= array();
                                        for($i=0;$i<$numofoption;$i++){
                                            $var=$json[$i];
                                            $var=substr($var,0,strlen($var)-1);
                                            array_push($arr,$var);
                                        }
                                        ?>
                                        <div id="option" style="margin-left:20px;padding:30px">
                                            <?php
                                                for($i=0;$i<count($arr);$i++){
                                                    ?>
                                                    <input type="checkbox" name="check_list[]" value="<?php echo $val;?>">
                                                    <?php
                                                    $val++;
                                                    echo $arr[$i].'<br>';
                                                }

                                            ?>
                                        </div>
                                        <?php
                                        $question_no++;
                                    }
                               

                               ?>
                               <input type="submit" class="btn btn-success" value="FINISH TEST" name="submit" style="margin-left:80px;padding:10px" id="mybtn">
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-6" id="right">
                    <div class="clock">
                        <h1>TIME LEFT</h1>
                        <table id="clockcontainer">
                            <tr>
                                <td id="day" style="font-size:50px">00:</td>
                                <td id="hour" style="font-size:50px">00:</td>
                                <td id="minute" style="font-size:50px">00:</td>
                                <td id="second" style="font-size:50px">00</td>
                            </tr>
                            <tr>
                                <td style="font-size:px">Days</td>
                                <td style="font-size:20px">Hours</td>
                                <td style="font-size:20px">Minutes</td>
                                <td style="font-size:20px">Seconds</td>
                            </tr>
                        </table>
                        </div>
                    </div>
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
        var starttime="<?php echo $res2["test_begin_time"];?>";
        var time1="<?php echo $res2["test_duration"];?>";
        var now=new Date();
        var up=new Date(starttime);
        var hour=(time1[0]-'0')*10+(time1[1]-'0');
        var min=(time1[3]-'0')*10+(time1[4]-'0');
        var sec=(time1[6]-'0')*10+(time1[7]-'0');
        up.setHours(up.getHours()+hour);
        up.setMinutes(up.getMinutes()+min);
        up.setSeconds(up.getSeconds()+sec);
        var tmp=now.getTime();
        var tmp1=up.getTime();
        var remtime=tmp1-tmp; 
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

        document.getElementById("day").textContent=d+":";
        document.getElementById("hour").textContent=h+":";
        document.getElementById("minute").textContent=m+":";
        document.getElementById("second").textContent=s;
        
        
        if(d>0 || h>0 || m>0 || s>0){
            setTimeout(countdown,1000);
            $("#mybtn").show(); 
        }
        else{
            document.getElementById("day").textContent="0:";
            document.getElementById("hour").textContent="00:";
            document.getElementById("minute").textContent="00:";
            document.getElementById("second").textContent="00";
            $("#mybtn").hide();
        }
    }

    $(document).ready(function(){
        $("#mybtn").click(function(){
            $("#mybtn").hide();
        });
    });
</script>

<style>
.clock{
    position:fixed;
    color:red;
    margin-left:100px;
}
h1{
    letter-spacing:15px;
    color: green;
}
</style>