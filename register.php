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
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="d-flex flex-grow-1">
              <a class="navbar-brand d-none d-lg-inline-block" href="#">
                  <img src="img/logo1.jpg" alt="logo" class="navbar-brand img-rounded" style="height:60px;width:60px">
                  Online Examination System

              </a>
              <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
                  <img src="img/logo1.jpg" alt="logo" class="navbar-brand img-rounded" style="height:60px;width:60px">
              </a>
              <div class="w-100 text-right">
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                      <span class="navbar-toggler-icon"></span>
                  </button>
              </div>
          </div>
          <div class="collapse navbar-collapse flex-grow-1" id="myNavbar">
              <ul class="navbar-nav ml-auto flex-nowrap">
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item nav-active">Home</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item">Test</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item">Tutorial</a>
                  </li>
                  <li class="nav-item">
                      <a href="register.php" class="nav-link m-2 menu-item">Register</a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link m-2 menu-item">Login</a>
                  </li>
              </ul>
          </div>
      </nav>

    <div class="container">
        <form action="successRegister.php" class="form-container" method="POST">
            <div class="form-group">
                <label for="firstname">First Name</label>
                <input type="text" id="firstname" placeholder="Firstname" class="form-control form-control-md" name="firstname">

            </div>

            <div class="form-group">
                <label for="lastname">Last Name</label>
                <input type="text" id="lastname" placeholder="Lastname" class="form-control form-control-md" name="lastname">
            </div>

            <div class="form-group">
              <label for="account-type">Select Account Type</label>
              <select name="Profile Type" id="account-type" class="form-control form-control-md" name="type">
                <option value="user">User</option>
                <option value="setter">Setter</option>
              </select>
            </div>

            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Username" class="form-control form-control-md" name="username">
            </div>

            <div class="form-group">
                <label for="firstname">Email</label>
                <input type="text" id="email" placeholder="Email" class="form-control form-control-md" name="email">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Password" class="form-control form-control-md" name="password">
            </div>

            <div class="form-group">
                <label for="confirmPassword">Confirm Passowrd</label>
                <input type="password" id="confirmPassword" placeholder="Confirm Password" class="form-control form-control-md" name="confirmpassword">
            </div>

            <div class="form-group">
              <div class="form-check">
                <input type="checkbox" id="accept-terms" class="form-check-input" name="check">
                <label for="accept-terms" class="form-check-label">Accept Terms & Conditions</label>
              </div>
            </div>

            <div class="form-group">
                <input type="submit" class="btn btn-primary btn-block">
            </div>

        </form>
    </div>

  </body>
</html>
