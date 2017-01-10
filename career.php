<?php
  include 'php/db_connect.php';
  include 'php/functions.php';
  sec_session_start();
  if(login_check($mysqli) == false) {
    header('Location: login.php');
  } else {
  $sql = "SELECT name, surname FROM members WHERE (id = '" . $_SESSION['user_id'] ."')";
  $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $name = $row['name'];
      $surname = $row['surname'];
    }
  $sql = "SELECT c.name AS name, c.location AS location, c.id AS id, c.duration AS duration, m.matriculationYear, m.matriculationCode, m.active, m.currentYear FROM courses c, matriculations m WHERE c.id = m.course_id & m.student_id = '" . $_SESSION['user_id'] ."'";
  $result = $mysqli->query($sql);
    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $courseId = $row['id'];
      $courseDuration = $row['duration'];
      $courseName = $row['name'];
      $courseLocation = $row['location'];
      $matriculationCode = $row['matriculationCode'];
      $matriculationYear = $row['matriculationYear'];
      $currentYear = $row['currentYear'];
      $state = ($row['active']) ? "attivo" : "non attivo";
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>Studenti Online - Libretto Online</title>

    <meta name="theme-color" content="#9B1C1C">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="fonts/proxima-nova.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link href="css/sol.css" rel="stylesheet">
    <link rel="stylesheet" href="css/monthly.css">
  </head>

  <body class="preload">

    <?php include 'header.php'; ?>

    <div class="container">

      <div class="row row-offcanvas">

        <?php include 'calendar.php'; ?>

        <?php include 'notifications.php'; ?>

        <div class="col-lg-12 main-offcanvas">

          <div class="alert alert-warning fade in" role="alert">
            <button type="button" class="icon-control float-xs-right" data-dismiss="alert" aria-label="Close">
              <span class="icon-close" aria-hidden="true"></span>
            </button>
            <strong>Hey!</strong> Devi effettuare la scelta del piano di studi entro il <strong>11/01/2017</strong>.
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card"><!-- Sistemare card card-block-->
                <div class="card-block">
                  <div class="col-lg-4">
                    <div class="profile-user">
                      <img src="img/user.jpg" alt="Profile Image" class="rounded-circle profile-picture">
                      <h4><?php echo $name . ' '. $surname; ?></h4>
                      <h6 class="text-muted"><?php echo $matriculationCode; ?></h6>
                      <p><?php echo $courseName; ?></br>
                          Sede di <?php echo $courseLocation; ?></p>
                    </div>
                  </div>
                  <div class="col-lg-8 padding-0">
                    <ul class="list-group">
                      <li class="list-group-item">
                        Immatricolazione
                        <span class="tag tag-default tag-pill float-xs-right"><?php echo $matriculationYear; ?></span>
                      </li>
                      <li class="list-group-item">
                        Anno di corso
                        <span class="tag tag-default tag-pill float-xs-right"><?php echo $currentYear; ?> - In corso</span>
                      </li>
                      <li class="list-group-item">
                        Stato
                        <span class="tag tag-default tag-pill float-xs-right profile-active"><?php echo $state; ?></span>
                      </li>
                      <li class="list-group-item">
                        Curriculum
                        <span class="tag tag-default tag-pill float-xs-right">Ingegneria Informatica</span>
                      </li>
                      <li class="list-group-item">
                        Piano di Studi
                          <a  class= "tag tag-default tag-pill float-xs-right" href="plan.php" aria-label="Edit">
                            Modifica<span class="icon-tag icon-pencil" aria-hidden="true"></span>
                          </a>
                      </li>
                      <li class="list-group-item">
                        Media voti
                        <span class="tag tag-default tag-pill float-xs-right">27.5</span>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div><!--/row anni-->

          <hr>

          <h5 class="section-title">Dettaglio Carriera</h5>
          <div class="row">

          <?php
          for($i=1;$i<=$courseDuration;$i++){
            echo '

            <div class="col-lg-12 resizable-column">
              <div class="card">
                <div class="card-block">
                  <p class="card-top">'.$i.' anno</p>
                  <div class="float-xs-right">
                    <button type="button" class="icon-control rotate" data-toggle="collapse" href="#collapse-year'.$i.'" aria-expanded="false" aria-controls="collapse-year'.$i.'">
                      <span class="icon-arrow-up" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="icon-control resize">
                      <span class="icon-size-fullscreen" aria-hidden="true"></span>
                    </button>
                  </div>
                  <div class="collapse in" id="collapse-year'.$i.'">


                  <table class="table table-striped card-content">
                      <thead>
                        <tr>
                          <th class="table-code mobile-view" id="code">Cod.</th>
                          <th class="table-subject" id="subject">Materia</th>
                          <th class="table-credits" id="credits">Crediti</th>
                          <th class="table-result" id="result">Esito</th>
                          <th class="table-record mobile-view" id="record">Data verb.</th>
                        </tr>
                      </thead>
                      <tbody>
                    ';

                    //Risultato prima query esami sostenuti
                    $sql = "SELECT e.id, e.subject, e.credits, r.result, r.record_date
                            FROM exams AS e
                            INNER JOIN recorded_exams AS r ON r.exam_id = e.id
                            WHERE r.student_id = '" . $_SESSION['user_id'] ."' & e.course_id = '". $courseId . "' & e.year_of_course='".$i."';
                            ";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {
                        $examId = $row['id'];
                        $examSubject = $row['subject'];
                        $examCredits = $row['credits'];
                        $examResult = $row['result'];
                        $recordDate = $row['record_date'];

                        echo '
                              <tr>
                                <td class="table-code mobile-view" headers="code">' . $examId . '</td>
                                <td class="table-subject" headers="subject">' . $examSubject . '</td>
                                <td class="table-credits text-muted" headers="credits">'. $examCredits .'</td>
                                <td class="table-result" headers="result">'. $examResult . '</td>
                                <td class="table-record mobile-view" headers="record">'. $recordDate .'</td>
                              </tr>
                        ';
                      }
                    }

                    //Risultato seconda query esami restanti
                    $sql = "SELECT p.id, p.subject, p.credits
                            FROM exams p
                            WHERE p.course_id = '". $courseId . "' AND p.year_of_course = '".$i."' AND p.id NOT IN (
                            SELECT e.id
                            FROM exams AS e
                            INNER JOIN recorded_exams AS r ON r.exam_id = e.id
                            )";

                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {
                      while($row = $result->fetch_assoc()) {
                        $examId = $row['id'];
                        $examSubject = $row['subject'];
                        $examCredits = $row['credits'];

                        echo '
                              <tr>
                                <td class="table-code mobile-view" headers="code">' . $examId . '</td>
                                <td class="table-subject" headers="subject">' . $examSubject . '</td>
                                <td class="table-credits text-muted" headers="credits">'. $examCredits .'</td>
                                <td class="table-result" headers="result">-</td>
                                <td class="table-record mobile-view" headers="record">-</td>
                              </tr>';
                      }
                    }

                    //Footer della tabella
                    echo '
                      </tbody>
                      </table>
                  </div>
                </div>
              </div>
            </div><!--/col lg 12-->';
          }
          ?>

          </div><!--/row anni-->

          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="card-block">
                  <p class="card-top">Grafico Voti</p>
                  <button type="button" class="icon-control float-xs-right rotate" data-toggle="collapse" href="#collapse-votes-graph" aria-expanded="false" aria-controls="collapse-votes-graph">
                    <span class="icon-arrow-down" aria-hidden="true"></span>
                  </button>
                  <div class="collapse" id="collapse-votes-graph">
                    <div class="card-content" id="graph-average" style="width: 100%; height:300px"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="card-block">
                  <p class="card-top">Grafico Media Ponderata</p>
                  <button type="button" class="icon-control float-xs-right rotate" data-toggle="collapse" href="#collapse-graph" aria-expanded="false" aria-controls="collapse-graph">
                    <span class="icon-arrow-down" aria-hidden="true"></span>
                  </button>
                  <div class="collapse" id="collapse-graph">
                    <div class="card-content">ciao</div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-block">
                  Crediti sostenuti
                  <span class="tag tag-default tag-pill float-xs-right">54 / 180</span>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

      <hr>

      <?php include 'footer.php'; ?>

    </div><!--/.container-->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


    <script src="js/offcanvas.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="js/average.js"></script>
    <script src="js/sidebar.js" type="text/javascript"></script>
    <script src="js/monthly.js" type="text/javascript"></script>
    <script src="js/career.js" type="text/javascript"></script>
    <script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script>

    <script type="text/javascript">
        $(window).load( function() {
            $("body").removeClass("preload");
            $('#mycalendar').monthly();
        });
    </script>

  </body>
</html>

<?php } ?>
