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


	if($stmt = $mysqli->prepare("SELECT id, email, password, salt, name, surname FROM members WHERE email = ? LIMIT 1")){
		$stmt->bind_param('s', $email);
		$stmt->execute();
		$stmt->store_result();
		$stmt->bind_result($user_id, $email, $db_password, $salt, $name, $surname);
		$stmt->fetch();

		$password = hash('sha512',$password.$salt);

		if($stmt->num_rows == 1){

			if(checkbrute($user_id, $mysqli) == true){
				//Account Bloccato
				return false;
			}else{
				if($db_password == $password){
					$ip_adress = $_SERVER['REMOTE_ADDR'];
					$user_browser = $_SERVER['HTTP_USER_AGENT'];
					$user_id = preg_replace("/[^0-9]+/", "", $user_id);
					$_SESSION['user_id'] = $user_id;
					$_SESSION['login_string'] = hash('sha512', $password.$ip_adress.$user_browser);
					return true;
				}else{
					//Password not corretta, aggiungo un tentativo al database
					$now = time();
					$mysqli->query("INSERT INTO login_attempts (user_id, time) VALUES ('$user_id', '$now')");
					return false;
				}
			}
		}else{
			return false;
		}
	 }
 }

 function checkbrute($user_id, $mysqli) {

   $now = time();
   // Vengono analizzati tutti i tentativi di login a partire dalle ultime due ore.
   $valid_attempts = $now - (2 * 60 * 60);
   if ($stmt = $mysqli->prepare("SELECT time FROM login_attempts WHERE user_id = ? AND time > '$valid_attempts'")) {
      $stmt->bind_param('i', $user_id);
      $stmt->execute();
      $stmt->store_result();
      if($stmt->num_rows > 5) {
         return true;
      } else {
         return false;
      }
   }
 }

 function login_check($mysqli) {

   // Verifica che tutte le variabili di sessione siano impostate correttamente
   if(isset($_SESSION['user_id'], $_SESSION['login_string'])) {
     $user_id = $_SESSION['user_id'];
     $login_string = $_SESSION['login_string'];
     $ip_adress = $_SERVER['REMOTE_ADDR'];
     $user_browser = $_SERVER['HTTP_USER_AGENT'];

     if ($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) {
        $stmt->bind_param('i', $user_id);
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
