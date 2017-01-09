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

        <?php include 'home.php'; ?>

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
      $(window).on('load', function() {

          $("body").removeClass("preload");

          $('#mycalendar').monthly({
            weekStart: 'Mon',
            mode: 'event',
            xmlUrl: 'events.xml'
          });

          $('[data-toggle="popover"]').popover({
            trigger: 'focus'
          });
      });
    </script>


  </body>
</html>

<?php } ?>
