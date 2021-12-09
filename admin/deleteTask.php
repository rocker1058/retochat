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

  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $db->prepare("DELETE FROM `appointments` WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    header("Location: index.php");
  }

?>
