<?php
include('config.php');
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $result = mysqli_query($mysqli, "SELECT * FROM user where username='$username'");
  session_start();
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($password == $row['pass']) {
      header('location:index.php');
      $_SESSION["data"] = $username;
      exit;
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
</head>

<body>
  <?php if (isset($error)) : ?>
    <p>Password Salah</p>
  <?php endif; ?>
  <form action="" method="POST">
    <label for="username">username</label>
    <br>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">password</label>
    <br>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit" name="login">Login</button>
  </form>
  <a href="register.php">Sign Up</a>
</body>

</html>