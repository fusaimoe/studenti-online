<?php
  $sql = "SELECT id FROM exams WHERE course_id='" . $course_id ."'";
  $result = $mysqli->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $exam_id = $row['id'];
      $insert_query = "INSERT INTO student_exams(exam_id, student_id, record_date, result, honour) VALUES ('" . $exam_id ."', '" . $student_id ."', 'NULL', 'NULL', 'NULL')";
      $mysqli->query($insert_query);
    }
  }
?>
