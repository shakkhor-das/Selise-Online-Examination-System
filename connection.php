
<?php
  
  $hostname = "intern-sls.cdts6wfxxv6z.eu-central-1.rds.amazonaws.com";
  $id = "slsadmin";
  $pass = "EMSAFNgw04ljnyKN4";
  $db="opai";

  $con=mysqli_connect($hostname,$id,$pass,$db);
  /*
  if($con){
    echo "connected";
  }
  
  /*
  $hostname="localhost";
  $id="root";
  $pass="";
  $db="opai";
  $con=mysqli_connect($hostname,$id,$pass,$db);
  if($con){
      echo "connected";
  }
  else{
      echo "failed";
  }
 
  */
?>


