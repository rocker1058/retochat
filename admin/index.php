<?php

  // Start the sessions
  session_start();

  // Require all the necessary backend files
  require('../includes/config.php');
  require('includes/database.php');

  if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital de Cancerología London | Admin Login</title>
  <link rel="stylesheet" href="assets/css/dashboard.css" />
</head>

<body>
  <div class="content-box">
    <div class="header">
      <h1>Gestionar citas</h1>
      <a href="logout.php" class="btn-primary">Logout</a>
    </div>
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Identificación</th>
            <th>EPS</th>
            <th>URL</th>
            <th>Estado</th>
            <th>Opciones</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $stmt = $db->prepare("SELECT * FROM `appointments`");
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_row()) {
              echo '<tr>';
              echo '<td>' . $row[1] . '</td>';
              echo '<td>' . $row[2] . '</td>';
              echo '<td>' . $row[3] . '</td>';
              echo '<td>' . $row[4] . '</td>';
              echo '<td>' . $row[5] . '</td>';
              echo '<td>' . $row[6] . '</td>';
              if ($row[8] == 0) {
                echo '<td>En trámite</td>';
                echo '<td><a href="scheduleTask.php?id=' . $row[0] . '" class="btn-secondary">Agendar</a><a href="deleteTask.php?id=' . $row[0] . '" class="btn-secondary" style="margin-left: 0.3vw; background: #d53a3a;">Delete</a></td>';
                echo '</tr>';
              } else if ($row[8] == 1) {
                echo '<td>Programado</td>';
                echo '<td><a href="deleteTask.php?id=' . $row[0] . '" class="btn-secondary" style="background: #d53a3a;">Delete</a></td>';
                echo '</tr>';
              }
            }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>