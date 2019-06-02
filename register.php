<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <title>Selise Online Exam System </title>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="d-flex flex-grow-1">
              <a class="navbar-brand d-none d-lg-inline-block" href="#">
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


    <div class="container">
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
    </div>
    <script src="myjavascript.js"></script>
  </body>
</html>


<script type="text/javascript">
        var pass=document.getElementById("password");
        pass.addEventListener('keyup',function(){
            checkpassword(pass.value)
        })

        function checkpassword(password){
          var strengthbar=document.getElementById("strength")
          var strength=0
          if(password.length<4){
            return strength.value=0;
          }
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
