<?php
    session_start();
    include('connection.php');
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    if(isset($_POST['submit'])){
        $id=$_POST["userid"];
        $testname=$_POST["tablename"];
        $testansname="ans".$testname;
        $arr=array();
        foreach($_POST['check_list'] as $ans){
            array_push($arr,$ans);
        }
        $json=json_encode($arr);
        //$sql="INSERT INTO  `$testansname` (`userid`,`question_ans`) VALUES ('$id','$json')";
        //$q=mysqli_query($con,$sql);
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
            if($check==1 and $tot_ans==$cnt){
                $obtain_point += $res1["qustionpoint"];
            }
            $left=$right+1;
        }

        echo $obtain_point;
    }


?>