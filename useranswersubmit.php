<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    if(isset($_POST['submit'])){
        $username=$_SESSION["username"];
        $setterid=$_POST["setterid"];
        $id=$_POST["userid"];
        $testname=$_POST["tablename"];
        $testansname="ans".$testname;
        $userrgtable="rg".$testname;
        $newsql="SELECT * FROM `$testansname` WHERE userid='$id'";
        $newq=mysqli_query($con,$newsql);
        if(mysqli_num_rows($newq)>=1){
            echo "Found";
            $message = "U have already submitted once";
            echo "<script type='text/javascript'>alert('$message');</script>";
            header('Location:userregisteredtest.php');
        }
        $sql1="SELECT * FROM `opai_user_details` WHERE `user_id`='$id'";
        $q1=mysqli_query($con,$sql1);
        $res1=mysqli_fetch_assoc($q1);
        $sql2="SELECT * FROM `opai_setter_global` WHERE `test_name`='$testname'";
        $q2=mysqli_query($con,$sql2);
        $res2=mysqli_fetch_assoc($q2);
        $arr=array();
        foreach($_POST['check_list'] as $ans){
            array_push($arr,$ans);
        }
        $json=json_encode($arr);
        $sql="INSERT INTO  `$testansname` (`userid`,`question_ans`) VALUES ('$id','$json')";
        $q=mysqli_query($con,$sql);
        $sql1="SELECT * FROM `$testname`";
        $q1=mysqli_query($con,$sql1);
        $obtain_point=0;
        $prev=1;
        while($res1=mysqli_fetch_assoc($q1)){
            $tmp=array();
            $option=$res1["questionoption"];
            $json=json_decode($option,true);
            for($i=0;$i<count($json);$i++){
                $var=$json[$i];
                $var1=substr($var,strlen($var)-1,strlen($var));
                array_push($tmp,$var1);
            }

            $check=1;
            $left=$prev;
            $right=$left+count($tmp)-1;
            $cnt=0;
            $tot_ans=0;
            for($k=0;$k<count($tmp);$k++){
                if($tmp[$k]==1){
                    $tot_ans++;
                }
            }
            //echo $left.' '.$right.'<br>';
            for($i=0;$i<count($arr);$i++){
                $val=$arr[$i];
                $tot=count($tmp);
                if($val>=$left && $val<=$right){
                    $cnt++;
                    $ind=$val-$left;
                    if($tmp[$ind]!=1){
                        $check=0;
                    }
                }

                if($check==0){
                    break;
                }
            }
            //echo $cnt.'<br>';
            if($check==1 and $tot_ans==$cnt){
                $obtain_point += $res1["qustionpoint"];
            }
            $prev=$right+1;
        }
        $sql2="INSERT INTO `$userrgtable` (`username`,`achieved_point`) VALUES ('$username','$obtain_point')";
        $q2=mysqli_query($con,$sql2);
        $sql3="SELECT * FROM `opai_setter_details` WHERE `setter_id`='$setterid'";
        $q3=mysqli_query($con,$sql3);
        $res3=mysqli_fetch_assoc($q3);
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
                    <div class="col-sm-6" id="left" style="">
                    <?php
                                    $sql5="SELECT * FROM $testname";
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
                                            //$var=substr($var,0,strlen($var)-1);
                                            array_push($arr,$var);
                                        }
                                        ?>
                                        <div id="option" style="margin-left:20px;padding:30px">
                                            <?php
                                                $val=1;
                                                for($i=0;$i<count($arr);$i++){
                                                    echo $val.'. ';
                                                    $val++;
                                                    $string=substr($arr[$i],0,strlen($arr[$i])-1);
                                                    echo $string;
                                                    $len=strlen($arr[$i]);
                                                    if($arr[$i][$len-1]=='1'){
                                                        ?>
                                                        <i class="fas fa-check-circle"></i>
                                                        <?php
                                                    }
                                                    echo '<br>';
                                                }

                                            ?>
                                        </div>
                                        <?php
                                        $question_no++;
                                    }
                               

                               ?>
                    
                    </div>
                    <div class="col-sm-6" id="right">
                    <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="img/download.jpg" alt="Card image cap">
                    <div class="card-body">
                        <p class="card-text">
                        <table class="">
                            <tbody>
                                <tr>
                                    <td>Test Name</td>
                                    <td><span><?php echo $res2["test_title"]; ?></span></td>
                                </tr>
                                <tr>
                                    <td>Setter</td>
                                    <td><span><?php echo $res3["setter_full_name"];?></span></td> 
                                </tr>
                                <tr>
                                    <td>Subject</td>
                                    <td><span><?php echo $res2["subject"]; ?></span></td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td><span><?php echo $res2["test_duration"]; ?></span></td>
                                </tr>
                                <tr>
                                    <td>Obtained Marks</td>
                                    <td><span><?php echo $obtain_point; ?></span></td>
                                </tr>
                                </tbody>
                            </table>
                        </p>
                        <a href="user_standing.php?ID=<?php echo $res2['test_id'];?>" style="color:red;font-weight:bold;cursor:pointer">SEE STANDINGS</a>
                    </div>
                    </div>
                    </div>
                </div>
            </div>


    </div>



  </body>
</html>


<script>
    
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
    
</script>

<style>

    h1{
        letter-spacing:18px;
        color: green;
    }
    span{
        color:green;
    }
</style>