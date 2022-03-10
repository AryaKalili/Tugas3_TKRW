<?php
include("config.php");
session_start();
if (isset($_POST['change'])) {
  $username = $_SESSION['data'];
  $opassword = $_POST['opassword'];
  $password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
  $result = mysqli_query($mysqli, "SELECT * FROM user where username='$username'");
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if ($opassword == $row['pass']) {
      if ($cpassword == $password) {
        mysqli_query($mysqli, "UPDATE user SET pass='$password'");
        header('location:index.php');
        exit;
      }
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
  <title>Document</title>
</head>

<body>
  <?php if (isset($error)) : ?>
    <p>Lastest Password/New Password Is not Confirm</p>
  <?php endif; ?>
  <form action="" method="POST">
    <label for="password">Lastest password</label>
    <br>
    <input type="password" name="opassword" id="password" required>
    <br>
    <label for="password">password</label>
    <br>
    <input type="password" name="password" id="password" required>
    <br>
    <label for="password">confirm password</label>
    <br>
    <input type="password" name="cpassword" id="password" required>
    <br>
    <button type="submit" name="change">Change</button>
  </form>
</body>

</html>