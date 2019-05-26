<?php

include('connection.php');
session_start();
if(isset($_POST["testname"])){
    $testname=$_POST["testname"];
    $sql="SELECT * FROM `$testname`";
    $q=mysqli_query($con,$sql);
    $output='';
    $output .='<table class="table table-borderless"><thead><thead>
    <tr>
    <th scope="col">#</th>
    <th scope="col">Problem Description</th>
    <th scope="col">Marks</th>
    <th scope="col">Comment</th>
    <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>';
    $i=0;
    while($res=mysqli_fetch_assoc($q)){
        $i++;
        $output.='
        <tr>
        <td scope="row">'.$i.'</td>
        <td scope="row">'.$res["question_title"].'</td>
        <td scope="row">'.$res["qustionpoint"].'</td>
        <td scope="row" style="color:green"><a href="#">DETAILS</a></td>
        <td scope="row"><button><i class="fas fa-trash"></i></button></td>
        </tr>
        ';
    }
    $output .='
        </tbody>
        </table>
    ';

    echo $output;

    
}

?>