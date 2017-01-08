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
  </head>

  <body>
    <nav class="navbar navbar-fixed-top navbar-dark bg-colored">
      <div class="container text-xs-center">
        <button type="button" class="icon-button float-xs-left h-100">
          <a href="calendar.php" aria-label="Calendar">
    			  <span class="icon-navbar icon-calendar" aria-hidden="true"></span>
          </a>
        </button>
        <a class="navbar-brand" href="index.htm">Alma Mater Studiorum<br/>Università di Bologna</a>
        <button type="button" class="icon-button float-xs-right">
          <a href="notifications.php" aria-label="Notifications History">
            <span class="icon-navbar icon-bell" aria-hidden="true"></span>
          </a>
        </button>
        <!--<button type="button" class="icon-button float-xs-right">
          <svg viewBox="0 0 99 99" class="icon-navbar" xmlns="http://www.w3.org/2000/svg" >
            <use xlink:href="fonts/icons.svg#bell"></use>
          </svg>
        </button>-->
      </div><!-- /.container -->
    </nav><!-- /.navbar -->

    <div class="container">

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
                  <h4>Margherita Gialli</h4>
                  <h6 class="text-muted">0000821564</h6>
                  <p>Ingegneria e Scienze Informatiche<br/>
                  Sede di Cesena</p>
                </div>
              </div>
              <div class="col-lg-8 padding-0">
                <ul class="list-group">
                  <li class="list-group-item">
                    Immatricolazione
                    <span class="tag tag-default tag-pill float-xs-right">2015</span>
                  </li>
                  <li class="list-group-item">
                    Anno di corso
                    <span class="tag tag-default tag-pill float-xs-right">2 / 3 - In corso</span>
                  </li>
                  <li class="list-group-item">
                    Stato
                    <span class="tag tag-default tag-pill float-xs-right profile-active">Attiva</span>
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

        <div class="col-lg-12 resizable-column">
          <div class="card">
            <div class="card-block">
              <p class="card-top">Primo anno</p>
              <div class="float-xs-right">
                <button type="button" class="icon-control rotate" data-toggle="collapse" href="#collapse-year1" aria-expanded="false" aria-controls="collapse-year1">
                  <span class="icon-arrow-up" aria-hidden="true"></span>
                </button>
                <button type="button" class="icon-control resize">
                  <span class="icon-size-fullscreen" aria-hidden="true"></span>
                </button>
              </div>
              <div class="collapse in" id="collapse-year1">
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
                    <tr>
                      <td class="table-code mobile-view" headers="code">69731</td>
                      <td class="table-subject" headers="subject">Architetture degli elaboratori</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">27</td>
                      <td class="table-record mobile-view" headers="record">28/08/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">00013</td>
                      <td class="table-subject" headers="subject">Analisi matematica</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">28</td>
                      <td class="table-record mobile-view" headers="record">10/02/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">11929</td>
                      <td class="table-subject" headers="subject">Algoritmi e strutture dati</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">28</td>
                      <td class="table-record mobile-view" headers="record">15/07/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">58414</td>
                      <td class="table-subject" headers="subject">Algebra e geometria</td>
                      <td class="table-credits text-muted" headers="credits">6</td>
                      <td class="table-result" headers="result">-</td>
                      <td class="table-record mobile-view" headers="record">-</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">26338</td>
                      <td class="table-subject" headers="subject">Idoneità lingua inglese B1</td>
                      <td class="table-credits text-muted" headers="credits">6</td>
                      <td class="table-result" headers="result">✓</td>
                      <td class="table-record mobile-view" headers="record">15/01/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">00819</td>
                      <td class="table-subject" headers="subject">Programmazione</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">27</td>
                      <td class="table-record mobile-view" headers="record">18/06/2016</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!--/col lg 4-->

        <div class="col-lg-12 resizable-column">
          <div class="card">
            <div class="card-block">
              <p class="card-top">Secondo anno</p>
              <div class="float-xs-right">
                <button type="button" class="icon-control rotate" data-toggle="collapse" href="#collapse-year2" aria-expanded="false" aria-controls="collapse-year2">
                  <span class="icon-arrow-down" aria-hidden="true"></span>
                </button>
                <button type="button" class="icon-control resize">
                  <span class="icon-size-fullscreen" aria-hidden="true"></span>
                </button>
              </div>
              <div class="collapse" id="collapse-year2">
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
                    <tr>
                      <td class="table-code mobile-view" headers="code">69731</td>
                      <td class="table-subject" headers="subject">Architetture degli elaboratori</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">27</td>
                      <td class="table-record mobile-view" headers="record">28/08/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">00013</td>
                      <td class="table-subject" headers="subject">Analisi matematica</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">28</td>
                      <td class="table-record mobile-view" headers="record">10/02/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">11929</td>
                      <td class="table-subject" headers="subject">Algoritmi e strutture dati</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">28</td>
                      <td class="table-record mobile-view" headers="record">15/07/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">58414</td>
                      <td class="table-subject" headers="subject">Algebra e geometria</td>
                      <td class="table-credits text-muted" headers="credits">6</td>
                      <td class="table-result" headers="result">-</td>
                      <td class="table-record mobile-view" headers="record">-</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">26338</td>
                      <td class="table-subject" headers="subject">Idoneità lingua inglese B1</td>
                      <td class="table-credits text-muted" headers="credits">6</td>
                      <td class="table-result" headers="result">✓</td>
                      <td class="table-record mobile-view" headers="record">15/01/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">00819</td>
                      <td class="table-subject" headers="subject">Programmazione</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">27</td>
                      <td class="table-record mobile-view" headers="record">18/06/2016</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!--/col lg 4-->

        <div class="col-lg-12 resizable-column">
          <div class="card">
            <div class="card-block">
              <p class="card-top">Terzo anno</p>
              <div class="float-xs-right">
                <button type="button" class="icon-control rotate" data-toggle="collapse" href="#collapse-year3" aria-expanded="false" aria-controls="collapse-year3">
                  <span class="icon-arrow-down" aria-hidden="true"></span>
                </button>
                <button type="button" class="icon-control resize">
                  <span class="icon-size-fullscreen" aria-hidden="true"></span>
                </button>
              </div>
              <div class="collapse" id="collapse-year3">
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
                    <tr>
                      <td class="table-code mobile-view" headers="code">69731</td>
                      <td class="table-subject" headers="subject">Architetture degli elaboratori</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">27</td>
                      <td class="table-record mobile-view" headers="record">28/08/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">00013</td>
                      <td class="table-subject" headers="subject">Analisi matematica</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">28</td>
                      <td class="table-record mobile-view" headers="record">10/02/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">11929</td>
                      <td class="table-subject" headers="subject">Algoritmi e strutture dati</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">28</td>
                      <td class="table-record mobile-view" headers="record">15/07/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">58414</td>
                      <td class="table-subject" headers="subject">Algebra e geometria</td>
                      <td class="table-credits text-muted" headers="credits">6</td>
                      <td class="table-result" headers="result">-</td>
                      <td class="table-record mobile-view" headers="record">-</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">26338</td>
                      <td class="table-subject" headers="subject">Idoneità lingua inglese B1</td>
                      <td class="table-credits text-muted" headers="credits">6</td>
                      <td class="table-result" headers="result">✓</td>
                      <td class="table-record mobile-view" headers="record">15/01/2016</td>
                    </tr>
                    <tr>
                      <td class="table-code mobile-view" headers="code">00819</td>
                      <td class="table-subject" headers="subject">Programmazione</td>
                      <td class="table-credits text-muted" headers="credits">12</td>
                      <td class="table-result" headers="result">27</td>
                      <td class="table-record mobile-view" headers="record">18/06/2016</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div><!--/col lg 4-->

      </div><!--/row anni-->

      <div class="row">
        <div class="col-lg-6 col-nopadding">
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
        <div class="col-lg-6 col-nopadding">
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

      <hr>

      <footer class="text-xs-center">
        <button type="button" class="icon-button float-xs-left">
          <a href="search.php" aria-label="Search">
    			  <span class="icon-footer icon-magnifier" aria-hidden="true"></span>
          </a>
        </button>
        <button type="button" class="icon-button">
          <a href="logout.php" aria-label="Logout">
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

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="js/monthly.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="js/average.js"></script>

    <script type="text/javascript">
        $(window).load( function() {
            $("body").removeClass("preload");
            $('#mycalendar').monthly();
        });
    </script>

  </body>
</html>