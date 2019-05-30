

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
        $sql2="SELECT * FROM `opai_setter_global` WHERE setter_id='$id'";
        $res2=mysqli_query($con,$sql2);
        $testname=$_SESSION["testname"];
        $sql3="SELECT * FROM opai_setter_global where setter_id='$id' AND test_name='$testname'";
        $q3=mysqli_query($con,$sql3);
        $res3=mysqli_fetch_assoc($q3);
    }

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Online exam system</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
    
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/question.css">
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
							<a href="#" data-toggle="collapse" aria-exapnded="false" >My Blogs</a>
						</li>

						<li class="active">
							<a href="#" data-toggle="collapse" aria-exapnded="false" >Write a blog</a>
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

            
            <div class="container" style="width:800px;margin-left:40px">
            <div id="got" style="font-weight:bold;font-size:30px">
                <script>
                    var testname = "<?php  echo $testname; ?>";
                    $.ajax({
                        url:"fetch.php",
                        method:"POST",
                        async:"false",
                        data:{testname:testname},
                        success:function(data){
                            document.getElementById("got").innerHTML="Question Added: "+data;
                        }
                    });
                </script>
            </div>
            <br>
            <hr>
            <form action="" method="" name="question" id="question">
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
                <input type="submit" name="enter" class="btn btn-warning" id="preview_button" data-toggle="modal" data-target="#preview" value="Preview" style="cursor:pointer;margin-left:619px">
                <input type="submit" name="enter" id="enter" class="btn btn-success" value="Save" style="cursor:pointer">
                

            </form>
            <hr>
            </div>



        </div>


        

        <div class="modal fade modal-lg" id="preview" role="dialog" style="width:80%">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content" style="">
                <div class="modal-header">
                <h4 class="modal-title" style="margin-left:20%"><?php echo $res3["test_title"]."(Problem Lists)";?></h4>  
                </div>
                <div class="modal-body question_details">
                    <script>
                        var testname = "<?php  echo $testname; ?>";
                        $.ajax({
                            url:"getdata.php",
                            method:"POST",
                            async:"false",
                            data:{testname:testname},
                            success:function(data){
                                $(".question_details").html(data);
                            }
                         });
                    </script>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
            
            </div>
        </div>
        
        </div>


  </body>
</html>

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
            var table_name = "<?php echo $_SESSION["testname"]; ?>";
            //console.log(table_name);
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
            $.post('insert.php',{questiontitle:title,questionpoint:point,option:myjson,tablename:table_name},function(response){
                alert(response);
                $("#question")[0].reset();
            }); 
        });
        
        
    });    
    
</script>


<script>
    function togglesidemenu(){
        document.getElementById("sidebar").classList.toggle("active");
    }
    
</script>


<?php
    
?>


<script>
    
</script>

<style>
    .modal-lg {
        max-width: 80% !important;
    }
</style>