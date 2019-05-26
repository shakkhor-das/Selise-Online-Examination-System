<?php

if (isset($_POST)['submit'])){
    $name = $_POST['name'];
    $mailfrom = $_POST['email'];
    $message = $_POST['message'];


    $mailto = "auishikpyne@gmail.com";
    $headers = "From: ".$mailfrom;
    $txt = "You have recieved an e-mail from ".$name.".\n\n".$message;

    mail($mailto,$txt,$headers);
    header("Loacation:guesthome.html?mailsend");



}