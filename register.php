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

  <title>Studenti Online - Signup</title>

  <meta name="theme-color" content="#9B1C1C">
  <link rel="shotrcut icon" href="img/icon.png">
  <link rel="apple-touch-icon" href="img/icon.png" type="image/png">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cinzel:400,700">
  <link rel="stylesheet" href="fonts/proxima-nova.css">
  <link rel="stylesheet" href="css/sol.css">

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
                        <input name="name" aria-label="Name" id="name" class="form-control" placeholder="Nome" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-user"></i>
                        <input name="surname" aria-label="Surname" id="surname" class="form-control" placeholder="Cognome" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-envelope"></i>
                        <input type="email" name="email" aria-label="Email" id="email" class="form-control" placeholder="Email" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <select type="select" name="course_id" aria-label="Course" id="course" class="form-control" placeholder="Corso" type="text">
                        <?php
                          $sql = "SELECT name, id FROM courses";
                          $result = $mysqli->query($sql);
                          if ($result->num_rows > 0) {

                            while($row = $result->fetch_assoc()) {
                              $name = $row['name'];
                              $id = $row['id'];
                              echo '<option value="'. $id .'">'. $name .'</option>';
                            }
                          }
                        ?>
                      <select>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-lock"></i>
                        <input type="number" name="student_id" aria-label="StudentID" id="student_id" class="form-control" placeholder="Matricola" type="text">
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-lock"></i>
                        <input type="number" name="matriculation_year" aria-label="Matriculation Year" id="matriculation_year" class="form-control" placeholder="Anno di immatricolazione" min="2000" max=<?php echo date("Y"); ?>>
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="left-inner-addon">
                        <i class="icon-lock"></i>
                        <input type="password" name="password" aria-label="Password" id="password" class="form-control" placeholder="Password" type="text">
                      </div>
                    </div>

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
      $result->close();
      $mysqli->close();
    ?>
  </body>
</html>
