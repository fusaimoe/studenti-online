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

    <title>Studenti Online - Register</title>

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
              <h3 class="login-card-title">Registrazione</h3>
              <h6 class="login-card-subtitle">Inserisci i dati per la registrazione</h6>

              <div class="card centered-card login-card">
                <div class="card-block">
                  <form action="php/process_register.php" method="post" name="register_form">
                    <!-- FIELDS -->
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-user"></i>
                        <input name="name" id="name" class="form-control" placeholder="Nome" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-user"></i>
                        <input name="surname" id="surname" class="form-control" placeholder="Cognome" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-envelope"></i>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-lock"></i>
                        <input type="password" name="p" id="password" class="form-control" placeholder="Password" type="text">
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
    									<input type="submit" name="register-submit" tabindex="4" class="form-control btn-primary btn btn-login" value="Registrati">
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
                  <p class="card-text custom-control-description">Hai giá un account? <a href="login.php">Login</a></p>
                </div>
              </div>

            </div>
          </div>

        </div><!-- Col-lg-12 -->
      </div> <!-- Row -->
    </div><!-- Cointainer -->
    <?php
      if(isset($_GET['error'])) {
         echo 'Error Registering In!';
      }
    ?>
    <script type="text/javascript" src="sha512.js"></script>
    <script type="text/javascript" src="forms.js"></script>
  </body>
</html>
