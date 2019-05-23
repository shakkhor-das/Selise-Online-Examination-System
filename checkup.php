

<?php
/*
    include('connection.php');
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location:login.php');
    }
    else{
        echo $_POST["sf1"];
    }

*/
    if(isset($_POST['submit'])){
        echo $_POST["field"];
    }
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>bootstrap4</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
  </head>
  <body>
    <div class="container" style="height:200px ">
        <form action="" method ="post">
            <label for="">Content</label>
            <textarea name="field" id="summernote" cols="30" rows="10"class="form-control"></textarea>
            <input type="submit" name="submit" class="btn btn-submit" value="submit">
        </form>
    </div>
  </body>
</html>

<script>
  $('#summernote').summernote();
  $('#summernote').summernote({

  height: 100,                 // set editor height
  minHeight: 100,             // set minimum height of editor
  maxHeight: 100,             // set maximum height of editor
  focus: true                  // set focus to editable area after initializing summernote
});
</script>
