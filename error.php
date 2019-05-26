<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <style>
  .modal-header, h4, .close {
    background-color: #5cb85c;
    color:white !important;
    text-align: center;
    font-size: 30px;
  }
  .modal-footer {
    background-color: #f9f9f9;
  }
  </style>
</head>
<body>

<div class="container">
  <h2>Modal Login Example</h2>
  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-default btn-lg" id="myBtn">SignUp</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> SignUp</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
        <form action="successRegister.php" class="form-container" method="POST" name="regform" onsubmit="return formvalidation();">
            <div class="form-group" id="error_name">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" placeholder="Firstname" class="form-control form-control-md" id ="firstname" name="firstname" >
                <div id="errorfname"></div>
            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" placeholder="Lastname" class="form-control form-control-md" id="lastname" name="lastname">
                <div id="errorlname"></div>
            </div>

            <div class="form-group">
              <label for="account-type">Select Account Type</label>
              <select id="account-type" name="selectype" class="form-control form-control-md" required="required">
                <option value="">Choose account type</option>
                <option value="user">User</option>
                <option value="setter">Setter</option>
              </select>
              <div id="erroraccountype"></div>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Username" class="form-control form-control-md" name="username">
                <div id="errorusername"></div>
            </div>

            <div class="form-group">
                <label for="firstname">Email</label>
                <input type="text" id="email" placeholder="Email" class="form-control form-control-md" name="email">
                <div id="erroremail"></div>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Password" class="form-control form-control-md" name="password" autocomplete="none">
                <label for="">Password strength</label>
                <progress max="100" value="0" style="width:340px" id="strength"></progress>
                <div id="errorpassword1"></div> 
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Passowrd</label>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" class="form-control form-control-md" name="confirmpassword">
                <div id="errorpassword2"></div> 
            </div>

            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" id="accept-terms" class="form-check-input" name="check" required="required"> 
                <label for="accept-terms" class="form-check-label">Accept Terms & Conditions</label>
              </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block" value="submit" name="submit">
            </div>

        </form>
        <script type="text/javascript">
        var pass=document.getElementById("password");
        pass.addEventListener('keyup',function(){
            checkpassword(pass.value)
        })

        function checkpassword(password){
          var strengthbar=document.getElementById("strength")
          var strength=0
          if(password.match(/[a-zA-Z0-9][a-zA-Z0-9]+/)){
            strength += 1
          }
          if(password.match(/[~<>?]+/)){
            strength += 1
          }
          if(password.match(/[!@$%^&*()]+/)){
            strength += 1
          }
          if(password.length>5){
            strength += 1;
          }
          if(password.length==0){
            strengthbar.value=0;
            return;
          }
          switch(strength){
            case 0:
                strengthbar.value=20;
                break
            case 1:
                strengthbar.value=40;
                break
            case 2:
                strengthbar.value=60;
                break

            case 3:
                strengthbar.value=80;
                break

            case 4:
                strengthbar.value=100;
                break
            
          }
        }

    </script>
    <script>
        //getting values
      var firstname=document.forms['regform']['firstname'];
      var lastname=document.forms['regform']['lastname'];
      var username=document.forms['regform']['username'];
      var email=document.forms['regform']['email'];
      var password=document.forms['regform']['password'];
      var confirmpassword=document.forms['regform']['confirmpassword'];
      var mailformat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      //getting error image

      var errorfname=document.getElementById('errorfname');
      var errorlname=document.getElementById('errorlname');
      var erroraccountype=document.getElementById('erroraccountype');
      var errorusername=document.getElementById('errorusername');
      var erroremail=document.getElementById('erroremail');
      var errorpassword1=document.getElementById('errorpassword1');
      var errorpassword2=document.getElementById('errorpassword2');


      function formvalidation(){
        if(firstname.value==""){
          errorfname.textContent="Firstname is required";
          errorfname.style.color="red";
          firstname.focus();
          return false;
        }
        
        if(lastname.value==""){
          errorlname.textContent="Secondname is required";
          errorlname.style.color="red";
          lastname.focus();
          return false;
        }
        if(username.value==""){
          errorusername.textContent="Username is required";
          errorusername.style.color="red";
          username.focus();
          return false;
        }
        if(email.value==""){
          erroremail.textContent="Email is required";
          erroremail.style.color="red";
          email.focus();
          return false;
        }
        if(password.value==""){
          errorpassword1.textContent="Password is required";
          errorpassword1.style.color="red";
          password.focus();
          return false;
        }
        if(confirmpassword.value==""){
          errorpassword2.textContent="Confirm Password is required";
          errorpassword2.style.color="red";
          confirmpassword.focus();
          return false;
        }

        if( password.value != confirmpassword.value){
          errorpassword2.textContent="Passwords donot match";
          errorpassword2.style.color="red";
          confirmpassword.focus();
          return false;
        }

        if(email.value.match(mailformat)){
          return true;
        }
        else{
          erroremail.textContent="Email is invalid";
          erroremail.style.color="red";
          email.focus();
          return false;
        }

}

</script>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
          <p>Not a member? <a href="#">Sign Up</a></p>
          <p>Forgot <a href="#">Password?</a></p>
        </div>
      </div>
      
    </div>
  </div> 
</div>
 
<script>
$(document).ready(function(){
  $("#myBtn").click(function(){
    $("#myModal").modal();
  });
});
</script>

</body>
</html>
