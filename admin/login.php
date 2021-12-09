<?php

  // Start the session
  session_start();

  // Require all the necessary backend files
  require('../includes/config.php');
  require('includes/database.php');


  if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit();
  }

  if (isset($_POST['submit'])) {
    $username = htmlspecialchars($_POST['username'], ENT_QUOTES);
    $password = htmlspecialchars($_POST['password'], ENT_QUOTES);

    $stmt = $db->prepare("SELECT * FROM `staff`");
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_row()) {
      $username_db = $row[1];
      $password_db = $row[2];
      if ($username_db == $username && password_verify($password, $password_db)) {
        $_SESSION['user'] = $username;
        header("Location: index.php");
      } else {
        echo "<script>alert('Incorrect username or password!');</script>";
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>London Cancer Hospital | Admin Login</title>
  <link rel="stylesheet" href="assets/css/login.css" />
</head>

<body>
  <div class="login-box">
    <h3>Admin Login</h3>
    <br />
    <br />
    <br />
    <br />
    <br />
    <form action="login.php" method="POST">
      <input type="text" name="username" placeholder="Username" />
      <br />
      <br />
      <input type="password" name="password" placeholder="Password" />
      <br />
      <br />
      <button name="submit">Login</button>
    </form>
  </div>
</body>

</html>