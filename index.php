<?php

include 'php/db_connect.php';
include 'php/functions.php';
sec_session_start();

if(login_check($mysqli) == false) {
  header('Location: login.php');
} else {
  //Prendo le informazioni sullo studente loggato
  $student_id = $_SESSION['student_id'];

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Studenti Online - Home</title>

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

        <div class="col-lg-8 main-offcanvas">
          <h5 class="section-title section-title hidden-md-down">Preferiti</h5>

          <div class="row">

            <?php
            //Favorites
            $sql = "SELECT c.name, c.URL, c.icon, c.description, sc.favorite
                    FROM categories c, student_categories sc
                    WHERE (sc.student_id = '" . $student_id ."') AND sc.favorite = '1' AND c.name = sc.category_name";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {

              $i = 0;

              while($row = $result->fetch_assoc()) {
                $name = $row['name'];
                $url = $row['URL'];
                $icon = $row['icon'];
                $description = $row['description'];

                switch ($i) {
                  case 0:
                    echo '<div class="col-lg-4 col-xs-4 col-nopadding-home-left">';
                    break;
                  case 1:
                    echo '<div class="col-lg-4 col-xs-4 col-nopadding-home">';
                    break;
                  case 2:
                    echo '<div class="col-lg-4 col-xs-4 col-nopadding-home-right">';
                    break;
                }
                echo ($url!=null) ? '<a href="' . $url . '">' : '<a href="#" data-toggle="popover" data-placement="top" data-content="Service not available at the moment">';
                echo '
                    <div class="card card-block">
                      <button type="button" class="icon-button w-100">
                        <span class="icon-homepage icon-'. $icon .'" aria-hidden="true"></span>
                      </button>
                      <h5 class="card-title">'. $name .'</h5>
                      <p class="card-text text-muted hidden-xs-down">'. $description .'</p>
                    </div>
                  </a>
                </div>
                ';

                $i++;
                if($i>=3){
                  echo '</div>
                  <div class="row">';
                  $i=0;
                }
              }
            }
            ?>

          </div>

          <div class="alert alert-warning fade in hidden-lg-down" role="alert">
            <button type="button" class="icon-control float-xs-right" data-dismiss="alert" aria-label="Close">
              <span class="icon-close" aria-hidden="true"></span>
            </button>
            You can <strong>drag & drop</strong> elements on the side <strong>here</strong>
          </div>

          <hr class="hidden-lg-up">

        </div>

        <div class="col-lg-4 col-nopadding-side main-offcanvas">
          <div class="row">
            <div class="col-lg-12">

              <?php
              //Section title
              $sectionsql = "SELECT DISTINCT c.section_name
                      FROM categories c, student_categories sc
                      WHERE (sc.student_id = '" . $student_id ."') AND c.name = sc.category_name
                      ORDER BY c.section_name";
              $sectionresult = $mysqli->query($sectionsql);

              if ($sectionresult->num_rows > 0) {

                while($sectionrow = $sectionresult->fetch_assoc()) {

                  $section = $sectionrow['section_name'];

                  echo '<h5 class="section-title">' . $section . '</h5>';

                  //All the cards

                  $sql = "SELECT c.name, c.URL, c.icon, c.section_name, sc.favorite
                          FROM categories c, student_categories sc
                          WHERE (sc.student_id = '" . $student_id ."') AND sc.favorite = '0' AND c.name = sc.category_name AND c.section_name='" . $section ."'";
                  $result = $mysqli->query($sql);

                  if ($result->num_rows > 0) {

                    while($row = $result->fetch_assoc()) {
                      $name = $row['name'];
                      $url = $row['URL'];
                      $icon = $row['icon'];

                      echo ($url!=null) ? '<a href="' . $url . '">' : '<a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">';

                      echo '
                        <div class="card card-block card-side">
                            <span class="icon-side icon-'. $icon .'" aria-hidden="true"></span>
                            <span>'. $name .'</span>
                        </div>
                      </a>
                      ';
                    }
                  }
                }
              }
              ?>

            </div>
          </div>
        </div>
      </div>

      <hr>

      <?php include 'footer.php'; ?>

    </div><!--/.container-->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <script src="js/sidebar.js" type="text/javascript"></script>
    <script src="js/monthly.js" type="text/javascript"></script>
    <script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script>

    <script type="text/javascript">

      $('[data-toggle="popover"]').popover({
        trigger: 'focus'
      });

    </script>


  </body>
</html>

<?php } ?>
