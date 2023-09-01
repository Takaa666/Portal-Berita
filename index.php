<?php 
 
include 'connect.php';
 
error_reporting(0);
 
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: master-berita.php");
}
 
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
 
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($connection, $sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: master-berita.php");
        echo "<script>alert('Selamat Login Berhasil')</script>";
    } else {
        echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
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
 
    <title>Login</title>
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
          <a class="nav-link active" href="index.php">Login</a>
          <a class="nav-link" href="register.php">Register</a>
        </div>
      </div>
    </div>
  </nav>

  <div class="container w-100 d-flex justify-content-center">
        <div class="w-50 text-light p-4 rounded bg-dark" style="margin-top: 10%;">
            <form action="" method="POST" class="login-email">
                <h4 class="login-text">Login</h4>
                <label for="email" class="form-label">Email</label>
                <div class="input-group mb-3 text-start">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <label for="password" class="form-label">Password</label>
                <div class="input-group mb-3 text-start">
                    <input type="password" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
                </div>
                <div class="input-group mb-3 text-start">
                    <button name="submit" type="submit" class="btn btn-primary">Login</button>
                </div>
                <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p>
            </form>
        </div>
    </div>
</body>
</html>