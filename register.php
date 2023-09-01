<?php 
 
include 'connect.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: index.php");
}
 
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = 1;
    
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($connection, $sql);
        if (!$result->num_rows > 0) {
            $sqli = "INSERT INTO users(id_user, email, username, password, role) VALUES ('','$email', '$username', '$password', '$role')";
            $insert = mysqli_query($connection, "INSERT INTO users( email, username, password, role) VALUES ('$email', '$username', '$password', '$role')");
            if ($insert) {
                header("Location: index.php");
                echo "<script>alert('Selamat, registrasi berhasil!')</script>";
            } else {
                echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
            }
        } else {
            echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
        }
}
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
 
    <title>Register</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="home.php">Portal Berita</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav w-100 d-flex justify-content-end">
          <a class="nav-link" href="index.php">Login</a>
          <a class="nav-link active" href="register.php">Register</a>
        </div>
      </div>
    </div>
  </nav>
    <div class="container w-100 d-flex justify-content-center">
        <div class="w-50 text-light p-4 rounded bg-dark" style="margin-top: 10%;">
            <form action="" method="POST" class="login-email">
                <h4 class="login-text">Register</h4>
                <label for="username" class="form-label">Username</label>
                <div class="input-group mb-3 text-start">
                    <input type="text" class="form-control" placeholder="Username" name="username"  required>
                </div>
                <label for="email" class="form-label">Email</label>
                <div class="input-group mb-3 text-start">
                    <input type="email" placeholder="Email" class="form-control" name="email" required>
                </div>
                <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3 text-start">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <div class="input-group mb-3 text-start">
                    <button name="submit" type="submit" class="btn btn-primary">Register</button>
                </div>
                <p class="login-register-text">Anda sudah punya akun? <a href="index.php">Login </a></p>
            </form>
        </div>
    </div>
</body>
</html>