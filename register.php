<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Selise Online Exam System </title>
  </head>
  <body>
      <nav class="navbar bg-light navbar-light navbar-expand-md">
        <div class="container">
          <img src="img1/logo1.jpg" class="img-rounded" alt="" class="navbar-brand" style="width:60px;height:60px;">
          <span class="navbar-text">Online Examination System</span>
          <button class="navbar-toggler navbar-toogler-right" type="button" data-toggle="collapse" data-target="#navbarnav"><span class="navbar-toggler-icon"></span></button>
          <div class="collapse navbar-collapse" id="navbarnav">
          <ul class="navbar-nav mx-auto"style="">
            <li class="nav-item">
              <a href="guesthome.php" class="nav-link ">Home</a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">Test</a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">Tutorial</a>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">Login</a>
            </li>

            <li class="nav-item">
              <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
              <a href="register.php" class="nav-link">Register</a>
            </li>

          </ul>

          </div>
        </div>
      </nav>

    <div class="container">
        <form action="" class="form-container justify-content-center">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" placeholder="Firstname" class="form-control form-control-md">

            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" placeholder="Lastname" class="form-control form-control-md">
            </div>

            <div class="form-group">
              <label for="account-type">Select Account Type</label>
              <select name="Profile Type" id="account-type" class="form-control form-control-md">
                <option value="user">User</option>
                <option value="setter">Setter</option>
              </select>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Username" class="form-control form-control-md">
            </div>

            <div class="form-group">
                <label for="firstname">Email</label>
                <input type="text" id="email" placeholder="Email" class="form-control form-control-md">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Password" class="form-control form-control-md">
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Passowrd</label>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" class="form-control form-control-md">
            </div>

            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" id="accept-terms" class="form-check-input">
                <label for="accept-terms" class="form-check-label">Accept Terms & Conditions</label>
              </div>
            </div>

            <button type="submit" class="btn btn-primary btn-block" name="button">Submit</button>

        </form>
    </div>

  </body>
</html>
