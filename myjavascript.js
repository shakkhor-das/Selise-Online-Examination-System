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