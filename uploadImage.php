<?php
    include('connection.php');
    if (isset($_POST['upload'])){
        $file_name = $_FILES['file']['name'];
        $file_type = $_FILES['file']['type'];
        $file_store = $_FILES['file']['tmp_name'];
        $file_size = $_FILES['file']['size'];
        echo $file_name."<br>";
        echo $file_type."<br>";
        echo $file_store."<br>";
        echo $file_size;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Image Upload</title>
</head>

<body>
    <form action="?" method="post" enctype="multipart/form-data">
        <p> <input type="file" name="file"> </p>
        <p> <input type="submit" name="upload" value="Upload Image"> </p>
    </form>    
</body>
</html>