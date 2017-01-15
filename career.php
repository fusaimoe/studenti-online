<?php
  include 'php/db_connect.php';
  include 'php/functions.php';
  sec_session_start();

  if(login_check($mysqli) == false) {
    header('Location: login.php');

  } else {

    //Prendo le informazioni sullo studente loggato
    $student_id = $_SESSION['student_id'];
    $sql = "SELECT name, surname, photo, matriculation_year, course_id, active, curriculum
            FROM students
            WHERE (student_id = '" . $student_id ."')";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $student_name = $row['name'];
      $student_surname = $row['surname'];
      $photo = $row['photo'];
      $matriculation_year = $row['matriculation_year'];
      $current_year = date("Y")-$matriculation_year;
      $course_id = $row['course_id'];
      $state = ($row['active']) ? "attivo" : "non attivo";
      $curriculum = ($row['curriculum']==NULL) ? 'Nessun curriculum' : $row['curriculum'];
    }

    //Prendo le informazioni sul corso che frequenta
    $sql = "SELECT name, location, duration, total_credits
            FROM courses
            WHERE id = '" . $course_id ."'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $course_duration = $row['duration'];
      $total_credits = $row['total_credits'];
      $course_name = $row['name'];
      $course_location = $row['location'];
    }

    //Prendo le informazioni sul piano di studi
    $sql = "SELECT plan_modification_type, done
            FROM student_plan_modifications
            WHERE student_id = '" . $student_id ."'";
    $result = $mysqli->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        if($row['plan_modification_type']=="Curriculum"){
          $editable_curriculum=($row['done']) ? 0 : 1;
        }else{
          $editable_plan=($row['done']) ? 0 : 1;
        }
      }
    }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Studenti Online - Carriera</title>

    <meta name="theme-color" content="#9B1C1C">
    <link rel="shotrcut icon" href="img/icon.png">
    <link rel="apple-touch-icon" href="img/icon.png" type="image/png">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel:400,700">
    <link rel="stylesheet" href="fonts/proxima-nova.css">
    <link rel="stylesheet" href="css/monthly.css">
    <link rel="stylesheet" href="css/sol.css">

  </head>

  <body class="preload">

    <?php include 'header.php'; ?>

    <div class="container">

      <div class="row row-offcanvas">

        <?php include 'calendar.php'; ?>

        <?php include 'notifications.php'; ?>

        <div class="col-lg-12 main-offcanvas">

          <?php
          //Check the unread notifications
          $sql = "SELECT subject, description, id
                  FROM notifications
                  WHERE student_id = '" . $_SESSION['student_id'] ."' AND read_flag='0' AND category_name IN ('Carriera','Piano di Studi') ";

          $result = $mysqli->query($sql);

          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                $not_subject = $row['subject'];
                $not_description = $row['description'];
                $not_id = $row['id'];

                echo '
                <div class="alert alert-warning fade in hidden-lg-down" role="alert" data-notification-id="' . $not_id . '">
                  <button type="button" class="icon-control float-xs-right" data-dismiss="alert" aria-label="Close">
                    <span class="icon-close" aria-hidden="true"></span>
                  </button>
                  <strong>' . $not_subject . ' - </strong>' . $not_description .'
                </div>
                ';
            }
          }
          ?>

          <div class="row">
            <div class="col-lg-12">
              <div class="card"><!-- Sistemare card card-block-->
                <div class="card-block">
                  <div class="col-lg-4">
                    <div class="profile-user">
                      <label for="fileToUpload" class="profile-picture">
                        <img src="<?php echo $photo; ?>" alt="Profile Image" class="rounded-circle">
                        <form action="php/upload.php" method="post" enctype="multipart/form-data">
                          <input type="file" name="fileToUpload" id="fileToUpload" onchange="this.form.submit()" style="display:none">
                            <span class="icon-button icon-navbar icon-camera" aria-hidden="true"></span>
                        </form>
                      </label>
                      <h4><?php echo $student_name . ' ' . $student_surname; ?></h4>
                      <h6 class="text-muted">0000<?php echo $student_id; ?></h6>
                      <p><?php echo $course_name; ?></br>
                          Sede di <?php echo $course_location; ?></p>
                    </div>
                  </div>
                  <div class="col-lg-8 padding-0">
                    <ul class="list-group">
                      <li class="list-group-item">
                        Immatricolazione
                        <span class="tag tag-default tag-pill float-xs-right"><?php echo $matriculation_year; ?></span>
                      </li>
                      <li class="list-group-item">
                        Anno di corso
                        <span class="tag tag-default tag-pill float-xs-right"><?php echo $current_year . '/3 - '; echo ($current_year>$course_duration) ? 'Fuori corso' : 'In Corso';?></span>
                      </li>
                      <li class="list-group-item">
                        Stato
                        <span class="tag tag-default tag-pill float-xs-right profile-active"><?php echo $state; ?></span>
                      </li>
                      <li class="list-group-item">
                        Curriculum
                        <?php
                          if($editable_curriculum){
                            echo '
                                  <a  class= "tag tag-default tag-pill float-xs-right" href="curriculum.php" aria-label="Edit">
                                    Modifica<span class="icon-tag icon-pencil" aria-hidden="true"></span>
                                  </a>
                            ';
                          }else{
                            echo '
                                  <span class="tag tag-default tag-pill float-xs-right">'. $curriculum.'</span>
                            ';
                          }
                        ?>
                      </li>
                      <li class="list-group-item">
                        Piano di Studi
                          <?php
                            if($editable_plan){
                              echo '
                                    <a class= "tag tag-default tag-pill float-xs-right" href="plan.php" aria-label="Edit">
                                      Modifica<span class="icon-tag icon-pencil" aria-hidden="true"></span>
                                    </a>
                              ';
                            }else{
                              echo '
                                    <span class="tag tag-default tag-pill float-xs-right">Non modificabile</span>
                              ';
                            }
                          ?>
                      </li>
                      <li class="list-group-item">
                        Media voti
                        <span class="tag tag-default tag-pill float-xs-right"><?php get_avg($mysqli); ?></span>
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
          for($i=1;$i<=$course_duration;$i++){
            echo '

            <div class="col-lg-12 resizable-column">
              <div class="card">
                <div class="card-block">
                  <p class="card-top">'.$i.'° anno</p>
                  <div class="float-xs-right">
                    <button type="button" class="icon-control rotate" data-toggle="collapse" href="#collapse-year'.$i.'" aria-expanded="false" aria-controls="collapse-year'.$i.'">
                      <span class="icon-arrow-up" aria-hidden="true"></span>
                    </button>
                    <button type="button" class="icon-control resize">
                      <span class="icon-size-fullscreen" aria-hidden="true"></span>
                    </button>
                  </div>
                  <div class="collapse in" id="collapse-year'.$i.'">

                  <div class="card-content">
                  <table class="table table-striped">
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

                    //Risultato query di esami_studente
                    $sql = "SELECT e.id, e.subject, e.credits, e.optional, r.result, r.record_date, r.honour
                            FROM exams AS e
                            INNER JOIN student_exams AS r ON r.exam_id = e.id
                            WHERE r.student_id = '" . $student_id ."' AND e.year_of_course='".$i."';
                            ";
                    $result = $mysqli->query($sql);

                    if ($result->num_rows > 0) {

                      while($row = $result->fetch_assoc()) {
                        $exam_id = $row['id'];
                        $exam_subject = $row['subject'];
                        $exam_credits = $row['credits'];
                        $exam_result = ($row['result']==NULL) ? '-' : $row['result'];
                        $honour = $row['honour'];
                        $record_date = ($row['record_date']==NULL) ? '-' : $row['record_date'];

                        echo '
                              <tr>
                                <td class="table-code mobile-view" headers="code">' . $exam_id . '</td>
                                <td class="table-subject" headers="subject">' . $exam_subject . '</td>
                                <td class="table-credits text-muted" headers="credits">'. $exam_credits .'</td>
                                <td class="table-result" headers="result">'. $exam_result;
                        echo ($honour) ? 'L' : '';
                        echo   '</td>
                                <td class="table-record mobile-view" headers="record">'. $record_date .'</td>
                              </tr>
                        ';
                      }
                    }

                    //Footer della tabella
                    echo '
                      </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div><!--/col lg 12-->';
          }

          ?>

          </div><!--/row anni-->

          <div class="row">
            <div class="col-lg-6 col-nopadding-left">
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
            <div class="col-lg-6 col-nopadding-right">
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
                  <span class="tag tag-default tag-pill float-xs-right"><?php get_credits($mysqli); echo ' /  ' . $total_credits; ?></span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
        $result->close();
        $mysqli->close();
      ?>
      
      <hr>

      <?php include 'footer.php'; ?>

    </div><!--/.container-->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script src="js/sidebar.js" type="text/javascript"></script>
    <script src="js/monthly.js" type="text/javascript"></script>
    <script src="js/favorite.js" type="text/javascript"></script>
    <script src="js/calendar.js" type="text/javascript"></script>
    <script src="js/history.js" type="text/javascript"></script>
    <script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script>

    <script src="js/career.js" type="text/javascript"></script>

  </body>
</html>

<?php }


function get_avg($mysqli) {

  $total=0;
  $totalM=0;

  $result = get_exam_info($mysqli);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $examResult = $row['result'];
      $honour = $row['honour'];
      $credits = $row['credits'];

      $totalM+=($credits/3);
      $total+=(($credits/3)*$examResult);

    }
    echo round($total/$totalM,2);
  }else{
    echo '0';
  }

}

function get_credits($mysqli) {

  $totalCredits=0;

  $result = get_exam_info($mysqli);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $credits = $row['credits'];

      $totalCredits+=$credits;
    }
    echo $totalCredits;
  }else{
    echo '0';
  }

}

function get_exam_info($mysqli){
  //Risultato prima query esami sostenuti
  $sql = "SELECT r.result, r.honour, e.credits
          FROM exams e, student_exams r
          WHERE e.id=r.exam_id
          AND r.result IS NOT NULL
          AND r.student_id ='" . $_SESSION['student_id'] ."'";
  return $mysqli->query($sql);

}
?>
