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
        $testid=$_GET["testid"];
        $sql2="SELECT * FROM `opai_setter_global` WHERE setter_id='$id' and test_id='$testid'";
        $res2=mysqli_query($con,$sql2);
        $ans2=mysqli_fetch_assoc($res2);
        $sql3="SELECT * FROM `opai_user_registeredtable` WHERE testid='$testid'";
        $q3=mysqli_query($con,$sql3);
        $res3=mysqli_num_rows($q3);
    }
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
    <link rel="stylesheet" href="css/testdetails.css">
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
								echo '<img class="profile-img" width:"50px" height="50px" alter="Image" src = "'.$directory.$res1["setter_image"].'">';
						?>
                    </li>
                    <li class="nav-item">
                        <a href="setterprofile.php" class="nav-link m-2 menu-item"><?php echo $_SESSION["username"]; ?></a>
                    </li>
                    <li class="nav-item">
                        <a href="guesthome.php" class="nav-link m-2 menu-item nav-active">Home</a>
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

	<div class="wrapper">
			<nav id="sidebar">
				<ul class="list-unstyled components">
						<li class="active">
							<a href="profile_edit.php"  aria-exapnded="false" >Edit Profile</a>
						</li>

						<li class="active">
							<a href="setter_myblogs.php" aria-exapnded="false" >My Blogs</a>
						</li>

						<li class="active">
							<a href="write_a_blog.php" aria-exapnded="false" >Write a blog</a>
						</li>

						<li class="active">
							<a href="settings.php" aria-exapnded="false" >Settings</a>
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
                <div id="colheader"><h1 style="text-align:center">Test Fundamentals</h1></div>
                    <div id="colbody">
                    <table class="table table-borderless">
                            <tbody>
                                <tr>
                                <th scope="row">Test Name</th>
                                <td><h5><?php echo $ans2["test_title"];?></h5></td>
                                </tr>
                                <tr>
                                <th scope="row">Edu-Level</th>
                                <td><h5><?php echo $ans2["education_level"];?></h5></td>
                                </tr>
                                <tr>
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
                                <th scope="row">Visibility</th>
                                <td><h5><?php echo $ans2["test_visibility"];?></h5></td>
                                </tr>
                                <th scope="row">Password</th>
                                <td><h5><?php echo $ans2["test_password"];?></h5></td>
                                </tr>
                                <th scope="row">Total Registered</th>
                                <td><h5 style="color:red;font-weight:bold"><?php echo $res3;?></h5></td>
                                </tr>
                            </tbody>
                    </table>
                    </div>
                </div>
                
                <div class="col-sm-4" id="col2">
                        <div class="clock">
                        <table id="clockcontainer">
                            <tr>
                                <td id="day" style="font-size:70px">120</td>
                                <td id="hour" style="font-size:70px">130</td>
                                <td id="minute" style="font-size:70px">10</td>
                                <td id="second" style="font-size:70px">10</td>
                            </tr>
                            <tr>
                                <td style="font-size:20px">Days</td>
                                <td style="font-size:20px">Hours</td>
                                <td style="font-size:20px">Minutes</td>
                                <td style="font-size:20px">Seconds</td>
                            </tr>
                        </table>
                        </div>
                    
                </div>
        
                <div class="question">
                    <h1 style="text-align:center;width:1000px;background:rgb(155, 143, 143);color:white">Question Details</h1>
                    <table class="table table-dark">
                        <thead>
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Question Title</th>
                            <th scope="col">Options</th>
                            <th scope="col">Right Answers</th>
                            <th scope="col">Point</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                                $tablename=$ans2["test_name"];
                                $sql3="SELECT * FROM  $tablename";     
                                $q3=mysqli_query($con,$sql3);
                                while($ans3=mysqli_fetch_assoc($q3)){
                                    $id=$ans3["question_id"];
                                    $title=$ans3["question_title"];
                                    $option=$ans3["questionoption"];
                                    $mark=$ans3["qustionpoint"];
                                    $json=json_decode($option,true);
                                    $numofoption=count($json);
                                    $arr= array();
                                    $right=array();
                                    for($i=0;$i<$numofoption;$i++){
                                        $var=$json[$i];
                                        $var1=$json[$i];
                                        $var=substr($var,0,strlen($var)-1);
                                        $var1=substr($var1,strlen($var1)-1,strlen($var1));
                                        array_push($arr,$var);
                                        array_push($right,$var1);
                                    }
                                    ?>
                                    <tr>
                                    <th scope="row"><?php echo $id; ?></th>
                                    <td><?php echo $title; ?></td>
                                    <?php
                                        ?>
                                        <td>
                                        <?php
                                        for($i=0;$i<count($arr);$i++){
                                            $t=$i+1;
                                            echo $t.".";
                                            echo $arr[$i].'<br>';
                                        }
                                        ?>
                                        </td>
                                    <?php
                                    ?>
                                    <td>
                                    <?php
                                        for($i=0;$i<count($right);$i++){
                                            $t=$i+1;
                                            if($right[$i]==1){
                                                echo $t.'<br>';
                                            }
                                        }

                                    ?>
                                    </td>
                                    <?php
                                    ?>
                                    <td><?php echo $mark; ?></td>

                                    <?php

                                    ?>
                                    <td><a href="#" style="color:hsl(123, 87%, 49%)"><i class="fas fa-edit"></i>Edit</a></td>
                                    <?php
                                }
                                
                                

                            ?>
                            
                        </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary" style="float:right" data-toggle="modal" data-target=".bd-example-modal-lg"><i class="fas fa-plus"></i>Add More questions</button>
                </div>
            </div>
            </div>   



    </div>
                
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="" method="" name="question" id="question" style="padding:30px;">
                    <input type="hidden" value="<?php echo $testid;?>" name="testid">
                    <b><label for="">Problem Description:</label></b>
                    <textarea name="title" id="summernote" cols="30" rows="10"class="form-control" class="title"></textarea>
                    <br><br><br><br>
                    <b><label for="">Answer?</label></b>
                    <br>
                    <div class="optiondiv" id="optiondiv">
                        
                    </div>
                    
                    <div style="margin-top:30px;margin-bottom:50px">
                        <button type="button" class="btn btn-lg" id="add" style="cursor:pointer"><i class="fas fa-plus-circle"></i>Add More  Optios</button>
                    </div>
                    <div id="demo"></div>
                    <label for=""><b>Points Available</b></label>
                    <i class="far fa-question-circle"></i>
                    <input type="number" name="point" id="point" class="" placeholder="1" required>
                    <br><br>
                    <input type="submit" name="enter" id="enter" class="btn btn-success" value="Save" style="cursor:pointer">
                    

                </form>
                <script>
    
                    var i=0;
                    $(document).ready(function(){
                        $("#add").click(function(){
                            i++;
                            $("#optiondiv").before('<div id="row'+i+'" class="row" style="width:500px;margin-left:0px;background:#f7f7f7;margin-top:20px"><div id="checkandspan" style="margin-up:20px"><input type="checkbox" name="checklist" value="'+i+'"><label>Check if this option is correct</label><button type="button" class="btn btn-danger btn_remove" id="'+i+'"name="remove" style="margin-left:240px"><i class="fas fa-trash"></i></button><textarea name="field[]" cols="20" rows="5" id="option'+i+'" class="form-control message"></textarea></div><br><br></div>');
                        });

                        $(document).on('click','.btn_remove',function(){
                            var button_id=$(this).attr("id");
                            $('#row'+button_id).remove();
                        });
                        
                        $("#enter").click(function(){
                            var title=$("#summernote").val();
                            var tablename = "<?php echo $tablename; ?>";
                            if(title==""){
                                alert("Question is empty");
                            }
                            if(i==0){
                                alert("Please add atleast one option");
                            }
                            var str="";
                            $(':checkbox').each(function(){
                                str += this.checked ? "1" : "0";
                            });
                            var option=[];
                            $("textarea.message").each(function(index){
                                //console.log(index+":"+$(this).val());
                                option.push($(this).val());
                            });
                            var optionwithans=[];
                            for(var i=0;i<option.length;i++){
                                optionwithans.push(option[i]+str[i]);
                            }
                            var point=$("#point").val();
                            var myjson=JSON.stringify(optionwithans);
                            var testid="<?php echo $testid; ?>"; 
                            console.log(point);
                            console.log(myjson);
                            console.log(testid);
                            $.ajax({
                                url:"questionupdate.php",
                                method:"POST",
                                async:"true",
                                cache:"false",
                                data:{testid:testid,title:title,tablename:tablename,point:point,myjson:myjson},
                                success:function(data){
                                    
                                }
                            });
                        });
                        
                        
                    });    
                    
                </script>
            </div>
        </div>
    </div>

  </body>
</html>


<script>
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
        document.getElementById("day").textContent=d+":";
        document.getElementById("hour").textContent=h+":";
        document.getElementById("minute").textContent=m+":";
        document.getElementById("second").textContent=s;
        if(d>0 ||h>0||m>0||s>0){
            setTimeout(countdown,1000);
        }
        else{
            document.getElementById("day").textContent="0:";
            document.getElementById("hour").textContent="00:";
            document.getElementById("minute").textContent="00:";
            document.getElementById("second").textContent="00";

            var testid="<?php echo $ans2["test_id"];?>";
            var testname="<?php echo $ans2["test_name"];?>";
            var username="<?php echo $username;?>";
            var userid="<?php echo $id;?>";

            console.log(testid);
            console.log(testname);
            console.log(username);
            console.log(userid);

            $.ajax({
                url:"movetest.php",
                method:"POST",
                async:"false",
                data:{testid:testid,testname:testname,username:username,userid:userid},
                success:function(data){
                    //alert("Success");
                }

            });
        }
    }

    countdown();
</script>



<style>

#id{
    float:right;
}
</style>
