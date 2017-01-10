<?php
include 'db_connect.php';
updateCalendar($mysqli);
?>

<div class="col-lg-8 sidebar-offcanvas sidebar-left">
  <h5 class="section-title hidden-lg-down">Calendario</h5>
  <div class="card card-block">
    <div class="monthly" id="mycalendar"></div>
  </div>
</div><!--/span-->
<div class="col-lg-4 sidebar-offcanvas col-nopadding-side sidebar-left">
  <h5 class="section-title hidden-lg-down">Legenda</h5>
  <div class="card card-block">
      <?php
        $sql = "SELECT DISTINCT c.name, c.color from categories c, calendar_events e where c.name=e.category_name";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
          echo '<ul class="list-group">';
          while($row = $result->fetch_assoc()) {
            $name = $row['name'];
            $color = $row['color'];
            echo '
                <li class="list-group-item">
                  <label class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator">
                      <style type="text/css" scoped>
                        .custom-control-input:checked {
                          background-color: '. $color .';
                        }
                      </style>
                    </span>
                    <span class="custom-control-description">'. $name .'</span>
                  </label>
                </li>
            ';
          }
          echo '</ul>';
        }
      ?>
  </div>
</div><!--/span-->

<?php

function updateCalendar($mysqli){
  $sql = "SELECT e.id, e.name, e.start_date, e.end_date, e.URL, e.category_name, c.color FROM calendar_events e, categories c
          WHERE e.category_name=c.name";
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
}

?>
