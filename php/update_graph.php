<?php

include 'php/db_connect.php';
include 'php/functions.php';
sec_session_start();

//Risultato query di esami_studente
$sql = "SELECT result, record_date
        FROM student_exams
        WHERE result != NULL AND student_id = '" . $student_id ."'";
$result = $mysqli->query($sql);

echo'console.log('.$sql.')';

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
              data: ['

                  while($row = $result->fetch_assoc()) {
                    $result = $row['result'];
                    $record = $row['record_date'];

                    echo' [' . $record_date . ', ' . $result . '],'

                  }

              echo ' ]
          }, {
              name: "Media",
              data: ['
                  $media = 0;
                  $counter = 0;
                  while($row = $result->fetch_assoc()) {
                    $result = $row['result'];
                    $record = $row['record_date'];

                    $media+=$result;
                    $counter++;

                    echo' [' . $record_date . ', ' . $media/$counter .'],'

                  }

              echo ' ]
            }]
      });

      $("#collapse-votes-graph").on("shown.bs.collapse", function () {
        chart.reflow();
      });
  });

'}

 ?>
