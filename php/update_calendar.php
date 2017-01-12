<?php

  $sql = "SELECT e.id, e.name, e.start_date, e.end_date, e.URL, e.category_name, c.color FROM calendar_events e, categories c
          WHERE e.category_name=c.name
          AND e.student_id='" . $_SESSION['student_id'] ."'";
  $result = $mysqli->query($sql);

  $xml = new XMLWriter();

  $xml->openURI("events.xml");
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
  $xml->flush();

?>
