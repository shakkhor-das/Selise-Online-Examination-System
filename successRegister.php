<?php
        include('connection.php');

        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $type=$_POST['selectype'];
        
        if(isset($_POST['submit'])){
             if($type=="setter"){
                $firstname=mysqli_real_escape_string($con,$firstname);
                $lastname=mysqli_real_escape_string($con,$lastname);
                $username=mysqli_real_escape_string($con,$username);
                $email=mysqli_real_escape_string($con,$email);
                $password=mysqli_real_escape_string($con,$password);
                $confirmpassword=mysqli_real_escape_string($con,$confirmpassword);

                $sql="SELECT * FROM `opai_setter` WHERE setterusername='$username'";
                $result=mysqli_query($con,$sql);
                $sql1="SELECT * FROM `opai_setter` WHERE setteremail='$email'";
                $result1=mysqli_query($con,$sql1);
                if(mysqli_num_rows($result)>0){
                        header('Location:error.php');    
                }
                
                else if(mysqli_num_rows($result1)>0){
                        header('Location:error.php');
                }
                
                else{
                        $virtualkey=md5(time().$username);
                        $password=md5($password);
                          
                        $sql="INSERT INTO `opai_setter`(`setterfirstname`, `setterlastname`, `setteremail`, `setterUsername`, `setterpassword`, `verificationkey`) VALUES ('$firstname','$lastname','$email','$username','$password','$virtualkey')";
                        $t=2;
                

                        if(mysqli_query($con,$sql)){
                                $to=$email;
                                $subject="Email Verification";
                                //$message= "<a href='http://localhost/successregistration/verify.php?vk=$virtualkey&type=$t'>Click here to verify</a>";
                                $message=" hi $firstname $lastname,"."\n 

                                Greetings from Online examination. It's our pleasure that you have registered in this site. You are highly welcome!\n

                                                        Click the link below to complete your registration.\n

                                                http://localhost/projectselise1/verify.php?vk=$virtualkey&type=$t

                                ";
                                $headers = 'From: fayedbinshowkatanik@gmail.com' . "\r\n" .
                                'Reply-To: webmaster@example.com' . "\r\n" .
                                'X-Mailer: PHP/' . phpversion();
                                if(mail($to,$subject,$message,$headers)){
                                        header('location:thankyou.php');
                                }
                                else{
                                        header('location:error.php');
                                }
                                
                        }
                        else{
                                echo "failed";
                        }
                }
             } 
             
             else{
                        $firstname=mysqli_real_escape_string($con,$firstname);
                        $lastname=mysqli_real_escape_string($con,$lastname);
                        $username=mysqli_real_escape_string($con,$username);
                        $email=mysqli_real_escape_string($con,$email);
                        $password=mysqli_real_escape_string($con,$password);
                        $confirmpassword=mysqli_real_escape_string($con,$confirmpassword);

                        $sql="SELECT * FROM `opai_user` WHERE userUsername='$username'";
                        $result=mysqli_query($con,$sql);
                        $sql1="SELECT * FROM `opai_user` WHERE useremail='$email'";
                        $result1=mysqli_query($con,$sql1);
                        if(mysqli_num_rows($result)>0){
                                header('Location:error.php');    
                        }
                        
                        else if(mysqli_num_rows($result1)>0){
                                header('Location:error.php');
                        }
                        
                        else{
                                $virtualkey=md5(time().$username);
                                $password=md5($password);
                                
                                $sql="INSERT INTO `opai_user`(`userfirstname`, `userlastname`, `useremail`, `userUsername`, `userpassword`, `verificationkey`) VALUES ('$firstname','$lastname','$email','$username','$password','$virtualkey')";
                                $t=1;
                        

                                if(mysqli_query($con,$sql)){
                                        $to=$email;
                                        $subject="Email Verification";
                                        //$message= "<a href='http://localhost/successregistration/verify.php?vk=$virtualkey&type=$t'>Click here to verify</a>";
                                        $message=" hi $firstname $lastname,"."\n 

                                        Greetings from Online examination. It's our pleasure that you have registered in this site. You are highly welcome!\n

                                                                Click the link below to complete your registration.\n

                                                        http://localhost/projectselise1/verify.php?vk=$virtualkey&type=$t

                                        ";
                                        $headers = "fayedbinshowkatanik@gmail.com \r\n";
                                        $headers .= "MIME-Version: 1.0\r\n";
                                        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
                                        mail($to,$subject,$message,$headers);
                                        header('location:thankyou.php');
                                }
                                else{
                                        echo "failed";
                                }
                        }
                }
        }
        
        
?>
