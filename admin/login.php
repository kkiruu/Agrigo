<?php
session_start();
if(isset($_SESSION["a_id"])) {
  header("Location: index.php");
  exit();
}

require 'head.php';

if(isset($_POST["btnlogin"])) {
  extract($_POST);
  $q = mysqli_query($con, "SELECT * FROM tbladmin WHERE aemail='$txtemail' AND apass='$txtpass'");
  if(mysqli_num_rows($q) > 0) {
    $_SESSION["a_id"] = $txtemail;
    header("Location: index.php");
    exit();
  } else {
    $error_message = "Invalid username or password";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Admin Login</h2>
    <form method="POST">
      <?php if(isset($error_message)) { ?>
        <div class="error"><?php echo $error_message; ?></div>
      <?php } ?>
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" name="txtemail" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" name="txtpass" required>
      </div>
      <div class="form-group">
        <input type="submit" name="btnlogin" value="Login">
      </div>
    </form>
  </div>
</body>
</html>
