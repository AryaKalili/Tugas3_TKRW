<?php
include('config.php');

if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $password1 = $_POST['password1'];
  $status = "offline";
  if ($password == $password1) {
    $result = mysqli_query($mysqli, "INSERT INTO user (username,pass,stats) VALUES ('$username', '$password', '$status')");
    echo "Akun Berhasil Dibuat.<a href='login.php'>Login</a>";
    exit;
  }
  header("location:register.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <form action="method.php" method="POST">
    <label for="username">username</label>
    <br>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="password">password</label>
    <br>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="password">confirm password</label>
    <br>
    <input type="password" name="password1" id="password" required>
    <br>
    <button type="submit" name="register">Sign Up</button>
  </form>
</body>

</html>