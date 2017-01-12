<?php
  $sql = "SELECT id FROM exams WHERE course_id='" . $course_id ."'";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $exam_id = $row['id'];
      $boolean = 0;
      $insert_query = "INSERT INTO student_exams(exam_id, student_id, record_date, result, honour) VALUES ('" . $exam_id ."', '" . $student_id ."', NULL, NULL, '" . $boolean ."')";
      $mysqli->query($insert_query);
    }
  }

  $sql = "SELECT type FROM plan_modifications";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $type = $row['type'];
      $boolean = 0;
      $insert_query = "INSERT INTO student_plan_modifications(plan_modification_type, student_id, done) VALUES ('" . $type ."', '" . $student_id ."','" . $boolean ."')";
      $mysqli->query($insert_query);
    }
  }
?>
