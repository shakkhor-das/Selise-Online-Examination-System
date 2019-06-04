<?php

        
        include('connection.php');

        $firstname=$_POST['firstname'];
        $lastname=$_POST['lastname'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $confirmpassword=$_POST['confirmpassword'];
        $type=$_POST['selectype'];

        require 'PHPMailer/class.phpmailer.php';
        $mail = new PHPMailer;
        $mail->isSMTP();                                   // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                            // Enable SMTP authentication
        $mail->Username = 'anikfayed@gmail.com';          // SMTP username
        $mail->Password = '2879AniK'; // SMTP password
        $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;  
        
        $mail->setFrom('anikfayed@gmail.com', 'TestMakerBd');
        $mail->addReplyTo('anikfayed@gmail.com', 'TestMakerBd');
        $mail->addAddress($email); 
        $mail->isHTML(true);

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
                                $bodyContent = "Hi $firstname $lastname,<br><br>
                                Greetings from TestMakerBd. It's our pleasure that you have registered in this site. You are highly welcome!<br>
                                Click the link below to complete your registration.<br>
                                <a href='testmakerbd.selisestaging.com/verify.php?vk=$virtualkey&type=$t'>Click to verify.</a>
                                <br><br>
                                Thank You
                                <br>
                                Regards by Testmakerbd Team
                                ";

                                $mail->Subject = 'Email Verification';
                                $mail->Body    = $bodyContent;
                                if(!$mail->send()) {
                                        header('Location:error.php');
                                }

                                header('Location:thankyou.php');
                                
                        }
                        else{
                                header('Location:error.php');
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
                                        $bodyContent = "Hi $firstname $lastname,<br><br>
                                        Greetings from TestMakerBd. It's our pleasure that you have registered in this site. You are highly welcome!<br>
                                        Click the link below to complete your registration.<br>
                                        <a href='testmakerbd.selisestaging.com/verify.php?vk=$virtualkey&type=$t'>Click to verify.</a>
                                        <br><br>
                                        Thank You
                                        <br>
                                        Regards by Testmakerbd Team
                                        ";

                                        $mail->Subject = 'Email Verification';
                                        $mail->Body    = $bodyContent;
                                        if(!$mail->send()) {
                                                header('Location:error.php');
                                        }

                                        header('Location:thankyou.php');
                                        }
                                else{
                                        header('Location:error.php');
                                }
                        }
                }
        }
        
        
?>
