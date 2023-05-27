<?php

session_start();

include("connection.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['signupButton'])) {
  // Something posted
  $username = $_POST['username'];
  $password = $_POST['password'];
  $firstName = $_POST['firstName'];
  $lastName = $_POST['lastName'];
  $age = $_POST['age'];
  $birthday = $_POST['birthday'];
  $address = $_POST['address'];
  $admin = 0;

  if (!empty($username) || !empty($password) || !empty($firstName) || !empty($lastName) || !empty($age) || !empty($birthday) || !empty($address)) {
    // Save to database 
    $query = "INSERT INTO accounts (username, password, firstName, lastName, age, birthday, address, admin) VALUES ('$username', '$password', '$firstName', '$lastName', '$age', '$birthday', '$address', $admin)";

    mysqli_query($con, $query); // Assuming $con is the database connection variable

    // Redirect to login
    header("Location: login.php");
    exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Library Hub Login</title>
    
</head>
<body>
    <!-- main container -->
    <section id="loginbg">
      <div class="container-xxl d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-5 p-5 welcome shadow rounded-3">
          <div class="row align-items-center">
            <div class="head-text mb-4 ">
              <h1 class="logo text-center fs-1 fw-bold">LIBRARYHUB</h1>
              <form class="container p-3 bg-white rounded-3 pt-4 mt-5" method="post">
                <h5 class="p-3">Signing Up</h5>
                <div class="mb-2">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control form-control-lg bg-light fs-6" id="username" name="username" required>
                </div>

                <div class="mb-2">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" required>
                </div>

                <div class="mb-2">
                  <label for="firstName" class="form-label">First Name</label>
                  <input type="text" class="form-control form-control-lg bg-light fs-6" id="firstName" name="firstName" required>
                 </div>

                <div class="mb-2">
                  <label for="lastName" class="form-label">Last Name</label>
                  <input type="text" class="form-control form-control-lg bg-light fs-6" id="lastName" name="lastName" required>
                </div>

                <div class="mb-2">
                  <label for="age" class="form-label">Age</label>
                  <input type="text" class="form-control form-control-lg bg-light fs-6" id="age" name="age" required>
                </div>

                <div class="mb-2">
                  <label for="birthday" class="form-label">Birthday</label>
                  <input type="date" class="form-control form-control-lg bg-light fs-6" id="birthday" name="birthday"required>
                </div>

                <div class="mb-2">
                  <label for="address" class="form-label">Address</label>
                  <input type="text" class="form-control form-control-lg bg-light fs-6" id="address" name="address" placeholder="City, Province" required>
                </div>

                <div class="d-grid gap-2">
                    <input class="btn btn-primary p-3 my-3 rounded-5" type="submit" value="Sign up" name="signupButton">
                </div>

                <div class="d-flex justify-content-center align-items-center">
                  <p><a href="login.php"class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Log in</a> now!</p>
                </div>
              </form>                          
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>

<?php
mysqli_close($con);
?>
