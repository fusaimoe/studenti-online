<?php

  include 'db_connect.php';
  include 'functions.php';
  sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura

  // Recupero la password criptata dal form di inserimento.
  $password = $_POST['password'];
  // Crea una chiave casuale
  $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
  // Crea una password usando la chiave appena creata.
  $password = hash('sha512', $password.$random_salt);
  // Crea una password usando la chiave appena creata.

  $student_id = $_POST['student_id'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];
  $matriculation_year = $_POST['matriculation_year'];
  $course_id = intval($_POST['course_id']);
  $email = $_POST['email'];

  if($stmt = $mysqli->prepare("SELECT name FROM students WHERE email = '$email'")){
    $stmt->execute(); //Execute the prepared query.
    $stmt->store_result();
    $stmt->fetch();
    $row = $stmt->num_rows;

    if($stmt->num_rows <= 0){
      if ($insert_stmt = $mysqli->prepare("INSERT INTO students (student_id, name, surname, matriculation_year, course_id, email, password, salt) VALUES (?, ?, ?, ?, ?, ?, ?, ?)")) {
         $insert_stmt->bind_param('issiisss', $student_id, $name, $surname, $matriculation_year, $course_id, $email, $password, $random_salt);
         // Esegui la query ottenuta.
         $insert_stmt->execute();
      }
      $insert_stmt->close();
     }

    include 'student_categories.php';
    include 'student_initializer.php';

    $result->close();
    $stmt->close();
    $mysqli->close();

    header('Location: ../login.php');
  }

?>
