<?php

include 'db_connect.php';
include 'functions.php';
sec_session_start();

//Risultato query di esami_studente
$sql = "SELECT result, record_date
        FROM student_exams
        WHERE result IS NOT NULL AND student_id = '" . $_SESSION['student_id'] ."' ORDER BY record_date";
$result = $mysqli->query($sql);
$result2 = $mysqli->query($sql);

//echo'console.log('.$sql.');';

if ($result->num_rows > 0) {

echo'

  $(function () {
      var chart = Highcharts.chart("graph-average", {
          chart: {
              type: "areaspline"
          },
          title: {
              text: null
          },
          xAxis: {
              type: "datetime"
          },
          yAxis: {
              title: {
                  text: null
              },

          },
          tooltip: {
              crosshairs: true,
              shared: true
              /*formatter: function() {
                 return "Extra data: <b>"+ this.point.myData +"</b>";
       				}*/
          },
          plotOptions: {
              areaspline: {
                  fillOpacity: 0.5
              }
          },
          credits: {
              enabled: false
          },
          series: [{
              name: "Voto",
              data: [

                ';

                  while($row = $result->fetch_assoc()) {
                    $vote = $row['result'];
                    $record = $row['record_date'];

                    $timestamp = strtotime($record);

                    echo' [' . $timestamp . '000, ' . $vote . '],';

                  }

              echo ' ]
          }, {
              name: "Media",
              data: [';


                  $avr = 0;
                  $counter = 0;

                  while($row = $result2->fetch_assoc()) {
                    $vote = $row['result'];
                    $record = $row['record_date'];

                    $avr+=$vote;
                    $counter++;

                    $timestamp = strtotime($record);

                    echo' [' . $timestamp . '000, ' . $avr/$counter .'],';

                  }

              echo ' ]
            }]
      });

      $("#collapse-votes-graph").on("shown.bs.collapse", function () {
        chart.reflow();
      });
  });

';

}

 ?>
