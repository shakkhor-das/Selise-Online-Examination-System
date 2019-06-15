<?php $htmlString= 'testing'; ?>

<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        include('connection.php');
        $username=$_SESSION['username'];
        $sql="SELECT * FROM `opai_user` WHERE userUsername='$username' LIMIT 1";
        $q=mysqli_query($con,$sql);
        $res=mysqli_fetch_assoc($q);
        $id=$res["userid"];
        $sql1="SELECT * FROM `opai_user_details` WHERE user_id='$id'";
        $q1=mysqli_query($con,$sql1);
        $res1=mysqli_fetch_assoc($q1);
        
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
                            <a class="dropdown-item" href="usertestfundatmentals.php">Take a test</a>
                            <a class="dropdown-item" href="#">My Previous Test</a>
                            <a class="dropdown-item" href="userregisteredtest.php">My Registered Test</a>
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
							<a href="usermyblog" data-toggle="collapse" aria-exapnded="false" >My Blogs</a>
						</li>

						<li class="active">
							<a href="user_write_a_blog" data-toggle="collapse" aria-exapnded="false" >Write a blog</a>
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
                <form action="userlistofupcomingtest.php" name="fundamental" method="post" >
                    <div id="sf1">
                            <h1>Select level of education</h1>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist1" id="checkbox1" value="Ssc">SSC equivalent</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist1" id="checkbox2" value="Hsc">HSC equivalent</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist1" id="checkbox3" value="University/College">University/College</label>
                            </div>
                            <div class="form-group"  style="margin-left:100px">
                                <button type="button" name="button1" class="btn btn-primary" id="btn-1" onclick="check()">Proceed</button>
                            </div>
                    </div>
                    <div id="sf2" style="display:none">
                        <h1>Select your field</h1>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist2" id="checkbox4" value="Science">Science</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist2" id="checkbox5" value="Business Studies">Business Studies</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist2" id="checkbox6" value="Humanities">Humanities</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist2" id="checkbox7" value="General Subjects">General Subjects</label>
                            </div>
                            <div class="form-group"  style="margin-left:100px">
                                <button type="button" name="button2" class="btn btn-primary" id="btn-2" onclick="check1()">Proceed</button>
                            </div>
                    </div>
                    <div id="sf3" style="display:none">
                        <h1>Select your subject</h1>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist3" id="checkbox8" value="Physics">Physics</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist3" id="checkbox9" value="Chemistry">Chemistry</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist3" id="checkbox10" value="Biology">Biology</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist3" id="checkbox11" value="Higher Math">Higher Math</label>
                            </div>
                            <div class="form-group"  style="margin-left:100px">
                            <button type="button" class="btn btn-primary" id="btn-3" onclick="check2()">Proceed</button>
                            </div>
                    </div>
                    <div id="sf4" style="display:none">
                        <h1>Select your subject</h1>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist4" id="checkbox12" value="Accounting">Accounting</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist4" id="checkbox13" value="Management">Management</label>
                            </div>
                            <div class="form-group"  style="margin-left:100px">
                            <button type="button" class="btn btn-primary" id="btn-4" onclick="check3()">Proceed</button>
                            </div>
                    </div>
                    <div id="sf5" style="display:none">
                        <h1>Select your subject</h1>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist5" id="checkbox14" value="Economics">Economics</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist5" id="checkbox15" value="Islamic Studies">Islamic Studies</label>
                            </div>
                            <div class="form-group"  style="margin-left:100px">
                            <button type="button" class="btn btn-primary" id="btn-5" onclick="check4()">Proceed</button>
                            </div>
                    </div>
                    <div id="sf6" style="display:none">
                        <h1>Select your subject</h1>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist6" id="checkbox16" value="Bangla">Bangla</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist6" id="checkbox17" value="English">English</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist6" id="checkbox18" value="ICT">ICT</label>
                            </div>
                            <div class="form-group"  style="margin-left:100px">
                            <button type="button" class="btn btn-primary" id="btn-6" onclick="check5()">Proceed</button>
                            </div>
                    </div>
                    <div id="sf7" style="display:none">
                        <h1>Select Test type</h1>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist7" id="checkbox19" value="M.C.Q">M.C.Q</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist7" id="checkbox20" value="True/False">True/False</label>
                            </div>
                            <div class="checkbox">
                                <label for=""><input type="checkbox" name="check_list[]" class="checklist7" id="checkbox21" value="Essay">Essay</label>
                            </div>
                            <div class="form-group"  style="margin-left:100px">
                            <input type="submit" class="btn btn-success" id="btn-7" name="submit" onclick="check6()" value="Submit">
                            </div>
                    </div>

                    
                </form>
            </div>


    </div>



  </body>
</html>


<script>
    
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
    function check(){
        var op1=document.getElementById("checkbox1");
        var op2=document.getElementById("checkbox2");
        var op3=document.getElementById("checkbox3");
        if(op1.checked==true){
            $(document).ready(function(){

                $("#sf1").hide();
                $("#sf2").show();
            });
        }
        else if(op2.checked==true){
            $(document).ready(function(){
                $("#sf1").hide();
                $("#sf2").show();
            });
        }
        else if(op3.checked==true){
            alert("We will do it later");
        }
        else{
            alert("Please choose one option");

        }
    }

    function check1(){
        var op4=document.getElementById("checkbox4");
        var op5=document.getElementById("checkbox5");
        var op6=document.getElementById("checkbox6");
        var op7=document.getElementById("checkbox7");
        if(op4.checked==true){
            $(document).ready(function(){
                
                //console.log(x);
                $("#sf2").hide();
                $("#sf3").show();
            });
        }
        else if(op5.checked==true){
            $(document).ready(function(){
                $("#sf2").hide();
                $("#sf4").show();
            });
        }
        else if(op6.checked==true){
            $(document).ready(function(){
                $("#sf2").hide();
                $("#sf5").show();
            });
        }
        else if(op7.checked==true){
            $(document).ready(function(){
                $("#sf2").hide();
                $("#sf6").show();
            });
        }
        else{
            alert("Please select one option");
        }
    }

    function check2(){
        var op8=document.getElementById("checkbox8");
        var op9=document.getElementById("checkbox9");
        var op10=document.getElementById("checkbox10");
        var op11=document.getElementById("checkbox11");
        if(op8.checked==true){
            $(document).ready(function(){
                $("#sf3").hide();
                $("#sf7").show();
            });
        }
        else if(op9.checked==true){
            $(document).ready(function(){
                $("#sf3").hide();
                $("#sf7").show();
            });
        }
        else if(op10.checked==true){
            $(document).ready(function(){
                $("#sf3").hide();
                $("#sf7").show();
            });
        }
        else if(op11.checked==true){
            $(document).ready(function(){
                $("#sf3").hide();
                $("#sf7").show();
            });
        }
        else{
            alert("Please select one option");
        }
    }
    function check3(){
        var op12=document.getElementById("checkbox12");
        var op13=document.getElementById("checkbox13");
        if(op12.checked==true){
            $(document).ready(function(){
                $("#sf4").hide();
                $("#sf7").show();
            });
        }
        else if(op13.checked==true){
            $(document).ready(function(){
                $("#sf4").hide();
                $("#sf7").show();
            });
        }
        else{
            alert("Please select one option");
        }
    }
    function check4(){
        var op14=document.getElementById("checkbox14");
        var op15=document.getElementById("checkbox15");
        if(op14.checked==true){
            $(document).ready(function(){
                $("#sf5").hide();
                $("#sf7").show();
            });
        }
        else if(op15.checked==true){
            $(document).ready(function(){
                $("#sf5").hide();
                $("#sf7").show();
            });
        }
        else{
            alert("Please select one option");
        }
    }
    function check5(){
        var op16=document.getElementById("checkbox16");
        var op17=document.getElementById("checkbox17");
        var op18=document.getElementById("checkbox18");
        if(op16.checked==true){
            $(document).ready(function(){
                $("#sf6").hide();
                $("#sf7").show();
            });
        }
        else if(op17.checked==true){
            $(document).ready(function(){
                $("#sf6").hide();
                $("#sf7").show();
            });
        }
        else if(op18.checked==true){
            $(document).ready(function(){
                $("#sf6").hide();
                $("#sf7").show();
            });
        }
        else{
            alert("Please select one option");
        }
    }

    function check6(){
        var op19=document.getElementById("checkbox19");
        var op20=document.getElementById("checkbox20");
        var op21=document.getElementById("checkbox21");
        if(op19.checked==true || op20.checked==true || op21.checked==true){

        }
        else{
            alert("Please select one");
        }
    }

    
    

</script>



<script type="text/javascript">
    $('.checklist1').on('change', function() {
        $('.checklist1').not(this).prop('checked', false);
    });

    $('.checklist2').on('change', function() {
        $('.checklist2').not(this).prop('checked', false);
    });
    $('.checklist3').on('change', function() {
        $('.checklist3').not(this).prop('checked', false);
    });
    $('.checklist4').on('change', function() {
        $('.checklist4').not(this).prop('checked', false);  
    });
    $('.checklist5').on('change', function() {
        $('.checklist5').not(this).prop('checked', false);  
    });
    $('.checklist6').on('change', function() {
        $('.checklist6').not(this).prop('checked', false);  
    });
    $('.checklist7').on('change', function() {
        $('.checklist7').not(this).prop('checked', false);  
    });
</script>

