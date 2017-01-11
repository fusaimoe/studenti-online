<?php

  include 'php/db_connect.php';
  include 'php/functions.php';

  sec_session_start();

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

    <title>Studenti Online - Login</title>

    <meta name="theme-color" content="#9B1C1C">

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="fonts/proxima-nova.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cinzel:400,700" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css" rel="stylesheet">
    <link href="css/sol.css" rel="stylesheet">
  </head>
  <body class="login-body">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">

          <div class="row">
            <div class="col-xs-12">
              <h3 class="login-card-title">Welcome</h3>
              <?php

                if(isset($_POST['email'], $_POST['password'])) {
                   $email = $_POST['email'];
                   $password = $_POST['password']; // Recupero la password non criptata.

                   if(login($email, $password, $mysqli) == true) {
                      // Login eseguito
                      header('Location: index.php');
                   } else {
                      // Login fallito
                      echo '<h6 class="login-card-subtitle">Credenziali non corrette</h6>';
                   }
                } else {
                   // Le variabili corrette non sono state inviate a questa pagina dal metodo POST.
                   echo '<h6 class="login-card-subtitle">Inserisci le tue credenziali</h6>';
                }

              ?>

              <div class="card centered-card login-card">
                <div class="card-block">
                  <form action="login.php" method="post" name="login_form">
                    <!-- FIELDS -->
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-envelope"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-lock"></i>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" type="text">
                      </div>
                    </div>

                    <!-- CHECKBOX -->
                    <label class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input">
                      <span class="custom-control-indicator"></span>
                      <span class="custom-control-description text-muted">Ricordami</span>
                    </label>

                    <!-- BUTTON -->
                    <div class="form-group no-padding">
    									<input type="submit" name="register-submit" tabindex="4" class="form-control btn-primary btn btn-login" value="Accedi">
    								</div>
                  </form>

                </div> <!--Card Block -->
              </div> <!--Card -->
            </div>
          </div>

          <div class="row">
            <div class="col-xs-12">

              <div class="card centered-card grey-card">
                <div class="card-block">
                  <p class="card-text custom-control-description">Non hai un account? <a href="register.php">Registrati</a></p>
                </div>
              </div>

            </div>
          </div>

        </div><!-- Col-lg-12 -->
      </div> <!-- Row -->
    </div><!-- Cointainer -->

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js" integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK" crossorigin="anonymous"></script>

    <script type="text/javascript" src="sha512.js"></script>
    <script type="text/javascript" src="forms.js"></script>
  </body>
</html>
