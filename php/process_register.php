<?php

  include 'db_connect.php';
  include 'functions.php';
  sec_session_start(); // usiamo la nostra funzione per avviare una sessione php sicura

  // Recupero la password criptata dal form di inserimento.
  $password = $_POST['p'];
  // Crea una chiave casuale
  $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
  // Crea una password usando la chiave appena creata.
  $password = hash('sha512', $password.$random_salt);
  // Crea una password usando la chiave appena creata.

  $email = $_POST['email'];
  $name = $_POST['name'];
  $surname = $_POST['surname'];

  if($stmt = $mysqli->prepare("SELECT name FROM members WHERE email = '$email'")){
    $stmt->execute(); //Execute the prepared query.
    $stmt->store_result();
    $stmt->fetch();
    $row = $stmt->num_rows;

    if($stmt->num_rows <= 0){
      if ($insert_stmt = $mysqli->prepare("INSERT INTO members (email, password, salt, name, surname) VALUES (?, ?, ?, ?, ?)")) {
         $insert_stmt->bind_param('sssss', $email, $password, $random_salt, $name, $surname);
         // Esegui la query ottenuta.
         $insert_stmt->execute();
      }

      header('Location: ../login.php');
     }
  }

?>
