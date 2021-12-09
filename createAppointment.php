<?php


  require "includes/config.php";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
    $surname = htmlspecialchars($_POST['surname'], ENT_QUOTES);
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES);
    $idno = htmlspecialchars($_POST['idno'], ENT_QUOTES);
    $healthservice = htmlspecialchars($_POST['healthservice'], ENT_QUOTES);
    $url = htmlspecialchars($_POST['url'], ENT_QUOTES);
    $appointment_code = htmlspecialchars($_POST['appointment_code'], ENT_QUOTES);

    $stmt = $db->prepare("INSERT INTO appointments (`name`, `surname`, `email`, `identity_no`, `healthservice`, `url`, `appointment_code`) VALUES (?, ?, ?, ?, ?, ?, ?)");

    $bp = $stmt->bind_param('sssissi', $name, $surname, $email, $idno, $healthservice, $url, $appointment_code);

    $stmt->execute();
  }

?>
