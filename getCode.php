<?php


  require "includes/config.php";

  if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $appointment_code = $_GET["appointment_code"];

    $stmt = $db->prepare("SELECT * FROM `appointments` WHERE `identity_no`=?");
    $stmt->bind_param("i", $appointment_code);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_row()) {
      $appointment_id = $row[0];
      $stmt2 = $db->prepare("SELECT * FROM `appointments_scheduled` WHERE `appointment_id`=?");
      $stmt2->bind_param("i", $appointment_id);
      $stmt2->execute();
      $result2 = $stmt2->get_result();

      while ($row2 = $result2->fetch_row()) {
        echo json_encode($row2);
      }
    }
  }

?>
