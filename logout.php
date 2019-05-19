<?php
session_start();
session_destroy();
header('location:/selise_online_exam/login.php'); 
exit();
?>
