<?php

include 'php/db_connect.php';
include 'php/functions.php';
sec_session_start();

if(login_check($mysqli) == false) {
  header('Location: access_denied.htm');
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

    <nav class="navbar navbar-fixed-top navbar-dark bg-colored">
      <div class="container text-xs-center">
        <button type="button" class="icon-button float-xs-left h-100" aria-label="Calendar" autocomplete = "off" id="sidebar-left-button">
  			  <span class="icon-navbar icon-calendar" aria-hidden="true"></span>
        </button>
        <a class="navbar-brand" href="index.php">Alma Mater Studiorum<br/>Università di Bologna</a>
        <button type="button" class="icon-button float-xs-right" aria-label="History" autocomplete = "off" id="sidebar-right-button">
          <span class="icon-navbar icon-bell" aria-hidden="true"></span>
        </button>
        <!--<button type="button" class="icon-button float-xs-right">
          <svg viewBox="0 0 99 99" class="icon-navbar" xmlns="http://www.w3.org/2000/svg" >
            <use xlink:href="fonts/icons.svg#bell"></use>
          </svg>
        </button>-->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas">

        <div class="col-lg-8 sidebar-offcanvas sidebar-left">
          <h5 class="section-title hidden-lg-down">Calendario</h5>
          <div class="card card-block">
            <div class="monthly" id="mycalendar"></div>
          </div>
        </div><!--/span-->
        <div class="col-lg-4 sidebar-offcanvas col-nopadding-side sidebar-left">
          <h5 class="section-title hidden-lg-down">Legenda</h5>
          <div class="card card-block">
            <ul class="list-group">
              <li class="list-group-item">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator color-1-indicator"></span>
                  <span class="custom-control-description">Esami</span>
                </label>
              </li>
              <li class="list-group-item">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator color-2-indicator"></span>
                  <span class="custom-control-description">Lezioni</span>
                </label>
              </li>
              <li class="list-group-item">
                <label class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input">
                  <span class="custom-control-indicator color-3-indicator"></span>
                  <span class="custom-control-description">Eventi</span>
                </label>
              </li>
            </ul>
          </div>
        </div><!--/span-->

        <div class="col-lg-12 sidebar-offcanvas sidebar-right">
          <h5 class="section-title hidden-lg-down">Notifiche</h5>
          <div class="card card-block">
            <ul class="list-group history">
              <li class="list-group-item unread">
                <div class="align-tag">
                  <span class="tag tag-primary tag-pill custom-tag"><span class="icon-badge" aria-hidden="true"></span></span>
                </div>
                <span>
                  <strong>Tecnlogie Web</strong> - Scadenza prenotazione del 16/01/2017</br>
                  <span class="text-muted">2m ago · Prenotazione Esami</span>
                </span>
              </li>
              <li class="list-group-item">
                <div class="align-tag">
                  <span class="tag tag-danger tag-pill custom-tag"><span class="icon-wallet" aria-hidden="true"></span></span>
                </div>
                <span>
                  <strong>Scadenza Pagamento</strong> - Scadenza pagamento tasse del 15/01/2017</br>
                  <span class="text-muted">Yesterday 10:00 · Tasse</span>
                </span>
              </li>
              <li class="list-group-item">
                <div class="align-tag">
                  <span class="tag tag-warning tag-pill custom-tag">
                    <span class="icon-plane" aria-hidden="true"></span>
                  </span>
                </div>
                <span>
                  <strong>Erasmus 2017/2018</strong> - Usciti bandi erasmus 2017/2018</br>
                  <span class="text-muted">A week ago · Erasmus</span>
                </span>
              </li>
            </ul>
          </div>
        </div><!--/span-->

        <div class="col-lg-8 main-offcanvas">
          <h5 class="section-title section-title hidden-lg-down">Preferiti</h5>

          <div class="row">

            <div class="col-lg-4 col-xs-4 col-nopadding-home">
              <a href="#" data-toggle="popover" data-placement="top" data-content="Service not available at the moment">
                <div class="card card-block">
                  <button type="button" class="icon-button w-100">
                    <span class="icon-homepage icon-envelope" aria-hidden="true"></span>
                  </button>
                  <h5 class="card-title">Email</h5>
                  <p class="card-text text-muted hidden-xs-down">Some quick example text to build on the card title.</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-4 col-nopadding-home">
              <a href="#" data-toggle="popover" data-placement="top" data-content="Service not available at the moment">
                <div class="card card-block">
                  <button type="button" class="icon-button w-100">
            			  <span class="icon-homepage icon-badge" aria-hidden="true"></span>
                  </button>
                  <h5 class="card-title">Esami</h5>
                  <p class="card-text text-muted hidden-xs-down">Some quick example text to build on the card title.</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-4 col-nopadding-home">
              <a href="career.php" aria-label="Career">
                <div class="card card-block">
                    <button type="button" class="icon-button w-100">
                			  <span class="icon-homepage icon-graduation" aria-hidden="true"></span>
                    </button>
                    <h5 class="card-title">Carriera</h5>
                    <p class="card-text text-muted hidden-xs-down">Some quick example text to build on the card title.</p>
                </div>
              </a>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-4 col-xs-4 col-nopadding-home">
              <a href="#" data-toggle="popover" data-placement="top" data-content="Service not available at the moment">
                <div class="card card-block">
                  <button type="button" class="icon-button w-100">
                    <span class="icon-homepage icon-wallet" aria-hidden="true"></span>
                  </button>
                  <h5 class="card-title">Tasse</h5>
                  <p class="card-text text-muted hidden-xs-down">Some quick example text to build on the card title.</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-4 col-nopadding-home">
              <a href="#" data-toggle="popover" data-placement="top" data-content="Service not available at the moment">
                <div class="card card-block">
                  <button type="button" class="icon-button w-100">
            			  <span class="icon-homepage icon-clock" aria-hidden="true"></span>
                  </button>
                  <h5 class="card-title">Lezioni</h5>
                  <p class="card-text text-muted hidden-xs-down">Some quick example text to build on the card title.</p>
                </div>
              </a>
            </div>
            <div class="col-lg-4 col-xs-4 col-nopadding-home">
              <a href="#" data-toggle="popover" data-placement="top" data-content="Service not available at the moment">
                <div class="card card-block">
                    <button type="button" class="icon-button w-100">
                			  <span class="icon-homepage icon-book-open" aria-hidden="true"></span>
                    </button>
                    <h5 class="card-title">Materiale</h5>
                    <p class="card-text text-muted hidden-xs-down">Some quick example text to build on the card title.</p>
                </div>
              </a>
            </div>
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

              <h5 class="section-title">Info e Carriera</h5>

              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-people" aria-hidden="true"></span>
                    <span>Contatti</span>
                </div>
              </a>
              <a href="plan.php" aria-label="Plan">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-notebook" aria-hidden="true"></span>
                    <span>Piano di Studi</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-briefcase" aria-hidden="true"></span>
                    <span>Tirocinio</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-handbag" aria-hidden="true"></span>
                    <span>Borsa di Studio</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-eyeglass" aria-hidden="true"></span>
                    <span>Laurea</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-fire" aria-hidden="true"></span>
                    <span>Rinuncia agli studi</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-directions" aria-hidden="true"></span>
                    <span>Trasferimento</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-cup" aria-hidden="true"></span>
                    <span>Sospensione</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-plane" aria-hidden="true"></span>
                    <span>Erasmus</span>
                </div>
              </a>

              <hr class="hidden-lg-up">

              <h5 class="section-title">Servizi e Mobilità</h5>

              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-location-pin" aria-hidden="true"></span>
                    <span>Trasporti</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-credit-card" aria-hidden="true"></span>
                    <span>Servizi Convenzionati</span>
                </div>
              </a>
              <a href="#" data-toggle="popover" data-placement="left" data-content="Service not available at the moment">
                <div class="card card-block card-side">
            			  <span class="icon-side icon-pin" aria-hidden="true"></span>
                    <span>Bacheca</span>
                </div>
              </a>

            </div>
          </div>
        </div>
      </div>

      <hr>

      <footer class="text-xs-center">
        <button type="button" class="icon-button float-xs-left">
          <a href="search.php" aria-label="Search">
    			  <span class="icon-footer icon-magnifier" aria-hidden="true"></span>
          </a>
        </button>
        <button onclick="window.location='php/process_logout.php'" type="button" class="icon-button">
          <a aria-label="Logout">
            <span class="icon-footer icon-logout" aria-hidden="true"></span>
          </a>
        </button>
        <button type="button" class="icon-button float-xs-right">
          <a href="settings.php" aria-label="Settings">
            <span class="icon-footer icon-settings" aria-hidden="true"></span>
          </a>
        </button>
      </footer>

    </div><!--/.container-->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <script src="js/sidebar.js" type="text/javascript"></script>
    <script src="js/monthly.js" type="text/javascript"></script>
    <script src="js/jquery.touchSwipe.min.js" type="text/javascript"></script>

    <script type="text/javascript">
      $( ".unread" ).click(function() {
        $(this).removeClass("unread");
      });
    </script>

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
