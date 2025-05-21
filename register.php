<?php
require_once("settings.php");

// Start form processing logic
if (isset($_POST['register'])) {
  $username = trim($_POST['username']);
  $password = $_POST['password'];
  $errors = [];

  // Validation checks
  if (strlen($username) < 4) {
    $errors[] = "Username must be at least 4 characters.";
  }

  if (strlen($password) < 8 || !preg_match('/\d/', $password)) {
    $errors[] = "Password must be at least 8 characters and contain at least one number.";
  }

  if (empty($errors)) {
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);
    if (!$conn) {
      die("Database connection failed.");
    }

    // Check if username already exists
    $query = "SELECT * FROM managers WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
      $errors[] = "Username already exists.";
    } else {
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $insert = "INSERT INTO managers (username, password_hash) VALUES ('$username', '$hashed')";

      if (mysqli_query($conn, $insert)) {
        echo "<p style='color:green;'>Registration successful. You may now <a href='login.php'>login</a>.</p>";
      } else {
        $errors[] = "Error creating account.";
      }
    }

    mysqli_close($conn);
  }

  // Display errors if any
  foreach ($errors as $error) {
    echo "<p style='color:red;'>$error</p>";
  }
}
?>

<!-- HTML Form (outside PHP tag) -->
<h2>Register Manager Account</h2>
<form method="post" action="register.php" novalidate>
  <label for="username">Username:</label>
  <input type="text" name="username" required>

  <label for="password">Password:</label>
  <input type="password" name="password" required>

  <input type="submit" name="register" value="Register">
</form>
