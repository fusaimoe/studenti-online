<?php

  $sql = "SELECT name FROM categories";
  $result = $mysqli->query($sql);

  $default_favorite = array("Tasse", "Esami", "Email", "Carriera", "Lezioni", "Contatti");

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
      $name = $row['name'];
      $boolean = (in_array($name, $default_favorite)) ? 1 : 0;

      $insert_query = "INSERT INTO student_categories(category_name, favorite, student_id) VALUES ('" . $name ."', '" . $boolean ."', '" . $student_id ."')";
      $mysqli->query($insert_query);
    }
  }
?>
