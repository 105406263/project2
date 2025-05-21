<?php
session_start();
require_once("settings.php");

if (!isset($_SESSION['login_attempts'])) {
  $_SESSION['login_attempts'] = 0;
}

if (isset($_POST['login'])) {
  if ($_SESSION['login_attempts'] >= 3) {
    echo "Too many failed attempts. Please wait.";
    exit();
  }

  $username = trim($_POST['username']);
  $password = $_POST['password'];

  $conn = mysqli_connect($host, $user, $pwd, $sql_db);
  $query = "SELECT * FROM managers WHERE username = '$username'";
  $result = mysqli_query($conn, $query);

  if ($row = mysqli_fetch_assoc($result)) {
    if (password_verify($password, $row['password_hash'])) {
      $_SESSION['username'] = $username;
      $_SESSION['login_attempts'] = 0;
      header("Location: manage.php");
      exit();
    }
  }

  $_SESSION['login_attempts'] += 1;
  echo "Invalid credentials. Attempts: " . $_SESSION['login_attempts'];
}
?>

<form method="post" action="login.php">
  <label for="username">Username:</label>
  <input type="text" name="username" required>

  <label for="password">Password:</label>
  <input type="password" name="password" required>

  <input type="submit" name="login" value="Login">
</form>
