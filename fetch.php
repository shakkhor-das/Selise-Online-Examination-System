<?php
    include('connection.php');
    session_start();
    $username = $_SESSION['userUsername'];
    if (isset($_SESSION['userUsername'])){
        echo "connected ";
        echo $username;
    }
    else{
        echo "failed";
    }
?>