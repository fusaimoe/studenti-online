<?php
  include 'php/db_connect.php';
  include 'php/functions.php';
  sec_session_start();

  if(login_check($mysqli) == false) {
    header('Location: login.php');

  } else {

    $sql="SELECT done FROM student_plan_modifications WHERE student_id='" . $_SESSION['student_id'] ."' AND plan_modification_type='Curriculum'";
    $result = $mysqli->query($sql);

    if ($result->num_rows == 1) {
      $row = $result->fetch_assoc();
      $done = $row['done'];
    }

    if($done){
        header('Location: plan_error.php');
    } else{

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Studenti Online - Curriculum</title>

    <meta name="theme-color" content="#9B1C1C">
    <link rel="shortcut icon" href="img/icon.png">
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

          <nav class="breadcrumb">
              <a class="breadcrumb-item" href="career.php">Carriera</a>
              <span class="breadcrumb-item active">Curriculum</span>
          </nav>

          <hr>

          <h5 class="section-title">Seleziona Curriculum</h5>
          <div class="row">
            <div class="col-lg-12 resizable-column">
              <form id="exams" method="post" action="confirm.php">
                <div class="form-group">
                  <div class="card">
                    <div class="card-block">
                      <p class="card-top">Seleziona un curriculum</p>
                      <div class="float-xs-right">
                        <button type="button" class="icon-control rotate " data-toggle="collapse" href="#collapse-first" aria-expanded="false" aria-controls="collapse-first">
                          <span class="icon-arrow-up" aria-hidden="true"></span>
                        </button>
                      </div>
                      <div class="collapse in" id="collapse-first">
                          <table class="table table-striped card-content group1">
                            <thead>
                              <tr>
                                <th class="table-check" id="check"></th>
                                <th class="table-code" id="curriculum">Curriculum</th>
                                <th class="table-subject" id="course">Corso</th>
                                <th class="table-subject hidden-md-down" id="description">Esami</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                                //Risultato query di esami_studente
                                $sql = "SELECT c.name AS course_name, cur.name AS curriculum, cur.description AS description
                                        FROM curriculum cur, courses c, students s
                                        WHERE s.student_id='" . $_SESSION['student_id'] ."'
                                        AND c.id=s.course_id
                                        AND cur.course_id=c.id
                                        AND s.curriculum IS NULL";

                                $result = $mysqli->query($sql);

                                if ($result->num_rows > 0) {

                                  while($row = $result->fetch_assoc()) {
                                    $course_name = $row['course_name'];
                                    $curriculum = $row['curriculum'];
                                    $description = $row['description'];

                                    echo '
                                        <tr>
                                          <td class="table-check" headers="check">
                                            <label class="custom-control custom-radio">
                                              <input type="radio" name="curriculum[]" value="'. $curriculum .'" class="custom-control-input"/>
                                              <span class="custom-control-indicator"></span>
                                              <span class="custom-control-description"></p></span>
                                            </label>
                                          </td>
                                          <td class="table-code" headers="curriculum">' . $curriculum . '</td>
                                          <td class="table-subject" headers="course">' . $course_name . '</td>
                                          <td class="table-subjecth hidden-md-down" headers="description">' . $description . '</td>
                                        </tr>';
                                  }
                                }
                              ?>
                            </tbody>
                          </table>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-12 resizable-column">
                      <div class="float-xs-right">
                        <input id="submit" type="submit" class="btn btn-primary" value="Avanti"></input>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
            </div><!--/col lg 12-->
          </div><!--/row-->
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

    <script src="js/sidebar.js" type="text/javascript"></script>
    <script src="js/monthly.js" type="text/javascript"></script>
    <script src="js/favorite.js" type="text/javascript"></script>
    <script src="js/calendar.js" type="text/javascript"></script>
    <script src="js/history.js" type="text/javascript"></script>
    <script src="js/curriculum.js" type="text/javascript"></script>
    <script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script>

    <script type="text/javascript">

    </script>
  </body>
</html>

<?php }
}?>
