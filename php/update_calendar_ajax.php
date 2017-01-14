<?php

  include 'db_connect.php';
  include 'functions.php';
  sec_session_start();

  if( isset($_POST['categories']) ){

    $categories = $_POST['categories'];

    $in = join("','",$categories);
    /*
    // This part is to avoid injection, it's commented because it requires PHP 5.6 and mysqlnd drivers, uncomment and comment the previous line
    $in = join(',', array_fill(0, count($categories), '?'));
    */

    $sql = "SELECT e.id, e.name, e.start_date, e.end_date, e.URL, e.category_name, c.color FROM calendar_events e, categories c
            WHERE e.category_name=c.name AND e.category_name IN ('$in')
            AND e.student_id='" . $_SESSION['student_id'] . "'";

  } else {

    $sql = "SELECT e.id, e.name, e.start_date, e.end_date, e.URL, e.category_name, c.color FROM calendar_events e, categories c
            WHERE e.category_name=c.name
            AND e.student_id='" . $_SESSION['student_id'] . "'";

  }

  $result = $mysqli->query($sql);
  /*
  // This part is to avoid injection, it's commented because it requires PHP 5.6 and mysqlnd drivers, uncomment and comment the previous line
  $statement = $mysqli->prepare($sql);
  $statement->bind_param(str_repeat('s', count($categories)), ...$categories);
  $statement->execute();
  $result = $statement->get_result();
  */
  $fileName =  $_SESSION['student_id'] . '.xml';
  $xmlUrl = '../xml/' . $fileName ;

  echo 'xml/' . $fileName;

  $xml = new XMLWriter();
  $xml->openURI($xmlUrl);
  $xml->startDocument('1.0');
  $xml->setIndent(true);
  $xml->startElement('monthly');

  if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {

      $startDate = date("Y-m-d", strtotime($row['start_date']));
      $startTime = date("H:i", strtotime($row['start_date']));
      $endDate = date("Y-m-d", strtotime($row['end_date']));
      $endTime = date("H:i", strtotime($row['end_date']));
      $xml->startElement("event");
        $xml->writeElement('id', $row['id']);
        $xml->writeElement('name', $row['name']);
        $xml->writeElement('startdate', $startDate);
        $xml->writeElement('enddate', $endDate);
        $xml->writeElement('starttime', $startTime);
        $xml->writeElement('endtime', $endTime);
        $xml->writeElement('color', $row['color']);
        $xml->writeElement('url', $row['URL']);
      $xml->endElement();

    }
  }

  $xml->endElement();

  file_put_contents("$xmlUrl" . $_SESSION['student_id'] . ".xml", $xml->flush(true));

?>
