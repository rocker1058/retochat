<?php

// Start the sessions
session_start();

// Require all the necessary backend files
require('../includes/config.php');
require('includes/database.php');

$id;

if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  exit();
}

if (isset($_GET['id'])) {
  $id = $_GET['id'];
}

if (isset($_POST['submit'])) {
  $id = htmlspecialchars($_POST['id'], ENT_QUOTES);
  $specialist = htmlspecialchars($_POST['specialist'], ENT_QUOTES);
  $schedule_date = htmlspecialchars($_POST['date'], ENT_QUOTES);
  $schedule_time = htmlspecialchars($_POST['time'], ENT_QUOTES);

  $stmt = $db->prepare("UPDATE `appointments` SET `status`=1 WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $stmt = $db->prepare("INSERT INTO `appointments_scheduled` (`appointment_id`, `specialist`, `schedule_date`, `schedule_time`) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isss", $id, $specialist, $schedule_date, $schedule_time);
  $stmt->execute();

  header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>London Cancer Hospital | Admin Login</title>
  <link rel="stylesheet" href="assets/css/dashboard.css" />
  <style>
    select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
    }

    input {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
    }
  </style>
</head>

<body>
  <div class="content-box">
    <div class="header">
      <h1>Agendación</h1>
      <a href="logout.php" class="btn-primary">Logout</a>
    </div>
    <form action="scheduleTask.php" method="POST">
      <div class="table">
        <select name="specialist">
          <option value="0">Por favor elija una especialista</option>
          <option value="Dr. Carlos Matiz">Dr. Carlos Matiz</option>
          <option value="Dr. Rafael Enrique Conde Camacho">Dr. Rafael Enrique Conde Camacho</option>
          <option value="Dr. Juan Pablo Rodríguez Gallego">Dr. Juan Pablo Rodríguez Gallego</option>
        </select>
        <br />
        <br />
        <input type="date" name="date" />
        <br />
        <br />
        <input type="time" name="time" />
        <br />
        <br />
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <button type="submit" name="submit" class="btn-primary">Agendar</button>
      </div>
    </form>
  </div>
</body>

</html>