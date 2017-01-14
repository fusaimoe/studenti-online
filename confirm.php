<?php
  include 'php/db_connect.php';
  include 'php/functions.php';
  sec_session_start();

  if(login_check($mysqli) == false) {
    header('Location: login.php');

  } else {

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

    <title>Studenti Online - Confirmation</title>

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

          <nav class="breadcrumb">
              <a class="breadcrumb-item" href="index.php">Libretto Online</a>
              <span class="breadcrumb-item active">Piano di Studi</span>
          </nav>

          <hr>

          <h5 class="section-title">Conferma la tua scelta</h5>
          <div class="row">
            <div class="col-lg-12 resizable-column">
              <div class="card">
                <div class="card-block">
                  <div>
                      <?php
                        echo '<ul class="list-group">';
                        if(isset($_POST['exam'])){
                          $confirmation_type='exam';

                          $checked=$_POST['exam'];
                          for($i=0;$i<count($checked);$i++){

                            $sql="SELECT id, subject, credits
                                  FROM exams
                                  WHERE id='" . $checked[$i] ."'";

                            $result = $mysqli->query($sql);

                            if ($result->num_rows == 1) {
                              $row = $result->fetch_assoc();

                              $exam_id =  $row['id'];
                              $subject =  $row['subject'];
                              $credits =  $row['credits'];

                              echo '
                                  <li class="list-group-item list-group-no-border"><strong>
                                    '. $subject .'</strong> ( #'. $exam_id .' ) - '. $credits .' crediti
                                  </li>';
                            }
                          }
                        }else if(isset($_POST['curriculum'])){
                          $confirmation_type='curriculum';

                          $checked=$_POST['curriculum'];
                          $sql="SELECT cur.name AS curriculum, c.id, c.name AS course, cur.description AS description
                                FROM curriculum cur, courses c
                                WHERE cur.name='" . $checked[0] ."'
                                AND c.id=cur.course_id";

                          $result = $mysqli->query($sql);
                          if($result->num_rows == 1){
                            $row = $result->fetch_assoc();

                            $curriculum =  $row['curriculum'];
                            $course =  $row['course'];
                            $description =  $row['description'];

                            echo '
                                <span>
                                  Curriculum:</br>
                                </span>
                                <span>
                                  <strong>'. $curriculum .'</strong>
                                </span>
                                <hr>
                                <span>
                                  Corso:</br>
                                </span>
                                <span class="text-muted">
                                  '. $course .'
                                </span>
                                <hr>
                                <span>
                                  Descrizione:</br>
                                </span>
                                <span class="text-muted">
                                  '. $description .'
                                </span>';
                          }
                        }
                        echo '</ul>';

                      ?>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-12 resizable-column">
                    <div class="float-xs-right">
                      <button type="submit" class="btn btn-primary" onclick="sendPost()">Conferma</button>
                    </div>
                  </div>
                </div>
              </div><!--/col lg 12-->
            </div><!--/row-->
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
    <script>
      function sendPost() {
        var array=<?php echo json_encode($checked); ?>;
        $.ajax({
          type: "POST",
          url: "php/update_plan.php",
          data: { <?php echo $confirmation_type; ?>: array },
          success: function(response){ alert("success" + response); }
        });
      }
    </script>

  </body>
</html>

<?php }?>
