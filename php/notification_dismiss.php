<?php

  include 'db_connect.php';
  include 'functions.php';
  sec_session_start();

  $stmt = $mysqli->prepare("UPDATE notifications SET read_flag = '1' WHERE id = ?");

  $stmt->bind_param('i', $_POST['dismiss']);

  $stmt->execute();
  $stmt->close();


?>
