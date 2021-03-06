<?php

  function sec_session_start() {
    $session_name = 'sec_session_id'; // Imposta un nome di sessione
    $secure = false; // Imposta il parametro a true se vuoi usare il protocollo 'https'.
    $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
    ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
    $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
    session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], $secure, $httponly);
    session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
    session_start(); // Avvia la sessione php.
    session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
  }

  function login($email,$password,$mysqli){

    if($stmt = $mysqli->prepare("SELECT student_id, name, surname, matriculation_year, course_id, email, password, salt FROM students WHERE email = ? LIMIT 1")){
    	$stmt->bind_param('s', $email);
    	$stmt->execute();
    	$stmt->store_result();
    	$stmt->bind_result($student_id, $name, $surname, $matriculation_year, $course_id, $email, $db_password, $salt);
    	$stmt->fetch();

    	$password = hash('sha512',$password.$salt);

    	if($stmt->num_rows == 1){
    		if($db_password == $password){
    			$ip_adress = $_SERVER['REMOTE_ADDR'];
    			$user_browser = $_SERVER['HTTP_USER_AGENT'];
    			$student_id = preg_replace("/[^0-9]+/", "", $student_id);
    			$_SESSION['student_id'] = $student_id;
    			$_SESSION['login_string'] = hash('sha512', $password.$ip_adress.$user_browser);

          $stmt->close();
          $mysqli->close();
    			return true;
    		}else{
    			//Password not corretta
    			return false;
    		}
    	}else{
    		return false;
    	}
    }
  }

 function login_check($mysqli) {

   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if(isset($_SESSION['student_id'], $_SESSION['login_string'])) {
     $student_id = $_SESSION['student_id'];
     $login_string = $_SESSION['login_string'];
     $ip_adress = $_SERVER['REMOTE_ADDR'];
     $user_browser = $_SERVER['HTTP_USER_AGENT'];

     if ($stmt = $mysqli->prepare("SELECT password FROM students WHERE student_id = ? LIMIT 1")) {
        $stmt->bind_param('i', $student_id);
        $stmt->execute();
        $stmt->store_result();

        if($stmt->num_rows == 1) { // se l'utente esiste
           $stmt->bind_result($password);
           $stmt->fetch();
           $login_check = hash('sha512', $password.$ip_adress.$user_browser);
           if($login_check == $login_string) {
              return true;
           } else {
              return false;
           }
        } else {
            return false;
        }
     } else {
        return false;
     }
   } else {
     return false;
   }
}

?>
