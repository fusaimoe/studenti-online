<?php

  include 'db_connect.php';
  include 'functions.php';
  sec_session_start();

  if(isset($_POST['exam'])) {

    $var = $_POST['exam'];

    $array = explode(',', $var);

    $modification_type='Piano di Studi';

    //Inserisco gli esami nella tabella esame_studente
    foreach ($array as &$value) {
      $null_var;
      $boolean=0;
      if ($insert_stmt = $mysqli->prepare("INSERT INTO student_exams (exam_id, student_id, record_date, result, honour) VALUES (?, ?, ?, ?, ?)")) {
         $insert_stmt->bind_param('iisii', $value, $_SESSION['student_id'], $null_var, $null_var, $boolean);
         $insert_stmt->execute();
      }
    }

  } else if(isset($_POST['curriculum'])) {

    $var = $_POST['curriculum'];
    $modification_type='Curriculum';

    //Inserisco il curriculum nella tabella studente
    if ($insert_stmt = $mysqli->prepare("UPDATE students SET curriculum=? WHERE student_id=?")) {
      $insert_stmt->bind_param('si', $var, $_SESSION['student_id']);
      $insert_stmt->execute();
    }

  }

  if($modification_type!=NULL){
    //Aggiorno la tabella student_plan_modifications per non permettere un secondo inserimento
    if ($insert_stmt = $mysqli->prepare("UPDATE student_plan_modifications SET done=? WHERE student_id=? AND plan_modification_type=?")) {
      $done=1;
      $insert_stmt->bind_param('iis', $done, $_SESSION['student_id'], $modification_type);
      $insert_stmt->execute();
    }
  }

?>
